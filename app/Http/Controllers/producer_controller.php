<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use View;
use DB;

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
    public function view_available() {
        $user = Auth::user();
        $listings = DB::select(DB::raw("SELECT * FROM Product WHERE member_id = $user->producer_id"));
        for($i = 0; $i < sizeof($listings); $i++) {
            $id = $listings[$i]->product_id;
            $reservation = DB::select(DB::raw("SELECT r.quantity, pr.name FROM Reserve r, Producer pr WHERE $id = r.product_id AND r.reciever_id = pr.member_id"));
            $listings[$i]->reservations = $reservation;

        }
        return View::make('listing.available', compact('listings'));
    }

    public function view_reserved() {
        $user = Auth::user();
        $reservations = DB::select(DB::raw("SELECT r.quantity, p.product_type, pr.name FROM Reserve r, Product p, Producer pr WHERE r.reciever_id = $user->producer_id AND r.product_id = p.product_id AND p.member_id = pr.member_id"));
        return View::make('listing.reserved', compact('reservations'));

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
