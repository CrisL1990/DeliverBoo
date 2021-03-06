<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'vat' => ['required', 'numeric','digits:11'],
            'restaurant_name' => ['required', 'string', 'min:3', 'max:255'],
            'restaurant_address' => ['required', 'string', 'max:255', "regex:(via|piazza|vicolo|vico|borgo|corso|viale|riva|rio|Via|Piazza|Vicolo|Vico|Borgo|Corso|Viale|Riva|Rio)", "regex:(0|1|2|3|4|5|6|7|8|9)"],
            'category' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $slug = Str::slug($data['restaurant_name']);

        if (User::where('slug', '=', $slug)->first()) {
            
            $counter = 1;

            while ( User::where('slug', '=', $slug)->first() ) {

                $slug = Str::slug($data['restaurant_name']) . '-' . $counter;
                $counter++;
            } 
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'vat' => $data['vat'],
            'restaurant_name' => $data['restaurant_name'],
            'slug' => $slug,
            'restaurant_address' => $data['restaurant_address'],
            'category' => implode(",", $data['category'])
        ]);

        return $user;

    }

    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    
}
