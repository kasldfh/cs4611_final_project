<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use View;
use Input;

class order_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producer_id = Auth::user()->producer_id;
        $orders = DB::select(DB::raw("SELECT pr.name, pr.phone_number, pr.email, pr.street, pr.city, pr.state, p.product_id, p.use_by, p.batch_id, p.price, r.quantity, r.order_date, t.type_name as product_type FROM Product p, Product_type t, Producer pr, Reserve r WHERE p.product_type_id = t.type_id AND p.member_id = $producer_id AND p.product_id = r.product_id AND r.reciever_id = pr.member_id"));
        $header = "";
        return View::make('orders', compact('orders', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producer_id = Auth::user()->producer_id;
        $header = "for product number $id";
        $orders = DB::select(DB::raw("SELECT pr.name, pr.phone_number, pr.email, pr.street, pr.city, pr.state, p.product_id, p.use_by, p.batch_id, p.price, r.order_date, r.quantity, t.type_name as product_type FROM Product p, Product_type t, Producer pr, Reserve r WHERE p.product_type_id = t.type_id AND p.member_id = $producer_id AND p.product_id = r.product_id AND r.reciever_id = pr.member_id AND r.product_id = :product_id"), ['product_id' => $id]);

        return View::make('orders', compact('orders', 'header'));
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
