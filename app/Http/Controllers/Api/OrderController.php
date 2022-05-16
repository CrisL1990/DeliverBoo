<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        

        return response()->json(
            [
                'results' => $order,
                'success' => true
            ]
        );
        // $dishes =  Dish::where('slug', $slug)->first();
        // // $orders =  Order::where('dish_id', $dishes['id'])-with(['dish'])->get();

    

        // return response()->json(
        //     [
        //         'results' => $orders,
        //         'success' => true
        //     ]
        // );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $data = $request->all();
        $order = new Order();
        $order->fill($data);
        $order->save();
        return response()->json([
            'order' => 'New order created'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator=Validator::make($data,[
            'customer_name'=>'required',
            'customer_email'=>'required|email',
            'customer_address'=>'required',
            'customer_telephone'=>'required',
            
        ]);
        
        if($validator->fails()){
            return response()->json(
                [
                'success'=>false,
                'errors'=>$validator->errors()
                ]
            );
        }else{
            $order = new Order();
            $order->fill($data);
            $order->save();
            return response()->json(
                [
                'success'=>true
                ]
            );
        }



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}