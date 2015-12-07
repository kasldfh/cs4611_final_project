<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use DB;
use Carbon\Carbon;
use Auth;

class listing_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listings;
      if(Input::has('sort')) {
        $listings = DB::select( DB::raw("SELECT p.name, p.city, p.state, s.product_id, s.day_produced, s.quantity, s.quantity - (SELECT SUM(x.quantity) FROM Reserve x WHERE x.product_id = s.product_id) as quantity_available, s.use_by, s.product_type FROM Producer p, Product s WHERE p.member_id = s.member_id AND lower(s.product_type) = lower(:type_value)"), ['type_value' => Input::get('sort'), ]);
      }
      else {
        $listings = DB::select( DB::raw( "SELECT p.name, p.city, p.state, s.product_id, s.day_produced, s.quantity, s.quantity - (SELECT SUM(x.quantity) FROM Reserve x WHERE x.product_id = s.product_id) as quantity_available, s.use_by, s.product_type FROM Producer p, Product s WHERE p.member_id = s.member_id"
        ));
      }
        return View::make('listing.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return View::make('listing.create');
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
      $type = Input::get('type');
      $useby = Input::get('useby');
      $quantity = Input::get('quantity');
      $date = Carbon::now()->format('Y-m-d');
      $producer = Auth::user()->producer_id;
      DB::statement("INSERT INTO Product (day_produced, member_id, quantity, use_by, product_type) VALUES (\"$date\", $producer, $quantity, \"$useby\", lower(\"$type\"))");
      return redirect('/');


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
      $listing = DB::select( DB::raw("SELECT p.name, p.city, p.state, s.product_id, s.day_produced, s.quantity, s.quantity - (SELECT SUM(x.quantity) FROM Reserve x WHERE x.product_id = s.product_id) as quantity_available, s.use_by, s.product_type FROM Producer p, Product s WHERE p.member_id = s.member_id AND s.product_id = :selection"), ['selection' => $id, ])[0];
      return View::make('listing.show', compact('listing'));
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
      $listing = DB::select( DB::raw("SELECT s.product_id, s.day_produced, s.quantity, s.use_by, s.product_type FROM Product s WHERE s.product_id = :selection"), ['selection' => $id, ])[0];
      return View::make('listing.edit', compact('listing'));
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
        $quantity = $request->quantity;
        $use_by = $request->useby;
        $type = $request->product_type;
        $producer_id = Auth::user()->producer_id;
        DB::statement("UPDATE Product SET use_by = \"$use_by\", quantity = $quantity , product_type = lower(\"$type\") WHERE member_id = $producer_id AND product_id = $id");
        return redirect('/listings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer_id = Auth::user()->producer_id;
        DB::statement("DELETE FROM Product WHERE product_id = $id AND 
            member_id = $producer_id");
        return redirect('/listings');
    }
}
