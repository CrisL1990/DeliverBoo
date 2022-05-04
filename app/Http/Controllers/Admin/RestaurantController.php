<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $dishes = Dish::all();

        return view('admin.restaurant.index', compact('data', 'dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.restaurant.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:5',
                'price' => 'required|numeric|between:1,999.99',
                'description' => 'nullable|min:20',
                'ingredients' => 'required|min:5',
                'available' => 'required',
                'food_type' => 'required',
                'category' => 'required'
            ]
        );

        $data = $request->all();

        $slug = Str::slug($data['name']);

        $counter = 1;

        while (Dish::where('slug', '=', $slug)->first()) {

            $slug = Str::slug($data['name']) . '-' . $counter;
            $counter++;
        }

        $data['slug'] = $slug;

        $dish = new Dish();
        $dish->fill($data);
        $dish->save();

        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $restaurant)
    {
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $restaurant)
    {

        $types = ['Vegetariano', "Vegano", 'Carne', "Pesce"];

        $categories = ['Antipasto', 'Primo', 'Secondo', 'Contorno', 'Dolce'];

        return view('admin.restaurant.edit', compact('restaurant', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $restaurant)
    {
        $request->validate(
            [
                'name' => 'required|min:5',
                'price' => 'required|numeric|between:1,999.99',
                'description' => 'nullable|min:20',
                'ingredients' => 'required|min:5',
                'available' => 'required',
                'food_type' => 'required',
                'category' => 'required'
            ]
        );

        $data = $request->all();

        $slug = Str::slug($data['name']);

        if ($restaurant->slug != $slug) {
            $counter = 1;
            while ( Dish::where('slug', '=', $slug)->first() ) {
                $slug = Str::slug($data['name']) . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }

        $restaurant->update($data);
        $restaurant->save();

        return redirect()->route('admin.restaurants.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $restaurant)
    {

        $restaurant->delete();

        return redirect()->route('admin.restaurants.index');
    }
}
