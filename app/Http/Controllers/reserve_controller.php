<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Carbon\Carbon;
use DB;
use Auth;
use View;
use Mail;

class reserve_controller extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $product_id = Input::get('product_id');
      $reserved_by = Auth::user()->producer_id;
      $quantity = Input::get('quantity');
      //TODO: rename sent, get current date
      $order_date = Carbon::now();
      $available = DB::statement("SELECT SUM(x.quantity) as available FROM Reserve x WHERE x.product_id = :pid", ['pid'=>$product_id])[0]->available;

      if (0 <= ($available - $quantity)) {
      	DB::statement( "INSERT INTO Reserve (product_id, reciever_id, quantity, order_date) VALUES(:p_id, :r_id, :quantity, :date)", ['p_id' => $product_id, 'r_id' => $reserved_by, 'quantity' => $quantity, 'date' => $order_date]);
      
      	//now we send the email 
      Mail::send('email.product_reserved', [], function($m) {
        $m->from("tribessyrup@gmail.com");
      	$producer = DB::select(DB::raw("select Producer.email from Reserve, Product, Producer where Reserve.product_id = Product.product_id and Product.member_id = Producer.member_id and Reserve.reserve_id = LAST_INSERT_ID()"))[0]->email;

        $m->to($producer);
        $m->subject("A product was reserved!");
      });

      //now we send the email 
      Mail::send('email.reservation_created', [], function($m) {
        $m->from("tribessyrup@gmail.com");
        $receiver = DB::select(DB::raw("select email from Producer where member_id = :id"), ['id'=>Auth::user()->producer_id])[0]->email;

        $m->to($receiver);
        $m->subject("Reservation success!");
      });

      return redirect('/listing');

      } else {
      	return "<h1>Error: Cannot reserve over the available quantity!</h1>";
      }

      
      
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
        DB::statement("DELETE FROM Reserve WHERE reserve_id = :id", ['id' => $id]);
        return redirect('/reserved');
    }
}
