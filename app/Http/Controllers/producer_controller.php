<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use View;
use DB;
use Input;

class producer_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function manage() {
        $producers = DB::select(DB::raw("SELECT * from Producer"));
        return View::make('producer.manage', compact('producers'));
    }

    public function view_available() {
        $user = Auth::user();
        $listings = DB::select(DB::raw("SELECT Product.product_id, Product.quantity, Product.price, Product.day_produced, Product.use_by, Product.batch_id, Product_type.type_name as product_type FROM Product, Product_type WHERE member_id = :producer_id AND Product.product_type_id = Product_type.type_id"), ['producer_id' => $user->producer_id]);
        for($i = 0; $i < sizeof($listings); $i++) {
            $id = $listings[$i]->product_id;
            $reservation = DB::select(DB::raw("SELECT r.product_id, r.quantity, pr.name FROM Reserve r, Producer pr WHERE :id = r.product_id AND r.reciever_id = pr.member_id"), ['id' => $id,]);
            $listings[$i]->reservations = $reservation;
        }

        return View::make('listing.available', compact('listings'));
    }

    public function view_reserved() {
        $user = Auth::user();
        $reservations = DB::select(DB::raw("SELECT r.reserve_id, r.quantity, r.order_date, p.price, p.batch_id, p.day_produced, p.use_by, t.type_name as product_type, pr.name as producer_name, pr.city, pr.state FROM Reserve r, Product p, Producer pr, Product_type t WHERE t.type_id = p.product_type_id AND r.reciever_id = :producer_id AND r.product_id = p.product_id AND p.member_id = pr.member_id"), ['producer_id' => $user->producer_id]);
        return View::make('listing.reserved', compact('reservations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('producer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::statement("INSERT INTO Producer (member_id, name, phone_number, street, city, state, email) VALUES (:id, :name, :phone, :street,:city, :state, :email)", ['id'=>Input::get('member_id'), 'name'=> Input::get('name'), 'phone'=> Input::get('phone_number'), 'street'=>Input::get('street'),'city'=>Input::get('city'), 'state'=>Input::get('state'), 'email'=>Input::get('email')]);
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
        $producer = DB::select(DB::raw("select * from Producer where member_id = :id"), ['id' => $id])[0];
        return View::make('producer.update', compact('producer'));
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
        DB::statement("UPDATE Producer SET name = :name, phone_number = :phone, street = :street, city = :city, state = :state, email = :email WHERE member_id = :id", ['id'=>Input::get('member_id'), 'name'=> Input::get('name'), 'phone'=> Input::get('phone_number'), 'street'=>Input::get('street'),'city'=>Input::get('city'), 'state'=>Input::get('state'), 'email'=>Input::get('email')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement("DELETE FROM Producer WHERE member_id = :remove_id", ['remove_id' => $id]);
        return redirect('/producer/manage');
    }
}
