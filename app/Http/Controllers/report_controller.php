<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
use Auth;
use DB;

class report_controller extends Controller
{


    /**
     * Obtain the lists of all of users products that are for sale.
     *
     * @return query result
     */
    public function fetch_products($dates = false, $lowDate = false, $highDate = false) {
        $user = Auth::user();
        $result;
        if (!$dates) {
            $result = DB::select( DB::raw("SELECT p.day_produced, p.use_by, p.batch_id, p.price, p.quantity, t.type_name as product_type FROM Product p, Product_type t WHERE p.product_type_id = t.type_id AND p.member_id = :user"), ['user'=>$user->producer_id]);
         } else {
            $result = DB::select( DB::raw("SELECT p.day_produced, p.use_by, p.batch_id, p.price, p.quantity, t.type_name as product_type FROM Product p, Product_type t WHERE p.product_type_id = t.type_id AND p.member_id = :user AND p.post_date BETWEEN :lowDate AND :highDate"), ['user'=>$user->producer_id, 'lowDate'=>$lowDate, 'highDate'=>$highDate]);
         }
         return $result;
    }
    /**
     * Obtain a buying report's content.
     *
     * @return query result
     */
    public function fetch_buyers($dates = false, $lowDate = false, $highDate = false) {
        $user = Auth::user();
        $result;
        if (!$dates) {
            $result = DB::select( DB::raw("SELECT pr.name, p.day_produced, p.use_by, p.batch_id, p.price, r.quantity, t.type_name as product_type FROM Product p, Product_type t, Reserve r, Producer pr WHERE p.product_type_id = t.type_id AND r.product_id = p.product_id AND p.member_id = pr.member_id AND r.reciever_id = :user"), ['user'=>$user->producer_id]);  
        } else {
            $result = DB::select( DB::raw("SELECT pr.name, p.day_produced, p.use_by, p.batch_id, p.price, r.quantity, t.type_name as product_type FROM Product p, Product_type t, Reserve r, Producer pr WHERE p.product_type_id = t.type_id AND r.product_id = p.product_id AND p.member_id = pr.member_id AND r.reciever_id = :user AND r.order_date BETWEEN :lowDate AND :highDate"), ['user'=>$user->producer_id, 'lowDate'=>$lowDate, 'highDate'=>$highDate]);
        }
        return $result;
    }

    /**
     * Obtain the list of reservations made by user.
     *
     * @return query result
     */
    public function fetch_reservations($dates = false, $lowDate = false, $highDate = false) {
        $user = Auth::user();
        $result;
        if (!$dates) {
            $result = DB::select( DB::raw("SELECT pr.name, p.day_produced, p.use_by, p.batch_id, p.price, r.quantity, t.type_name as product_type FROM Product p, Product_type t, Producer pr, Reserve r WHERE p.product_type_id = t.type_id AND p.member_id = :user AND p.product_id = r.product_id AND r.reciever_id = pr.member_id"), ['user'=>$user->producer_id]);
        } else {
            $result = DB::select( DB::raw("SELECT pr.name, p.day_produced, p.use_by, p.batch_id, p.price, r.quantity, t.type_name as product_type FROM Product p, Product_type t, Producer pr, Reserve r WHERE p.product_type_id = t.type_id AND p.member_id = :user AND p.product_id = r.product_id AND r.reciever_id = pr.member_id AND p.post_date BETWEEN :lowDate AND :highDate"), ['user'=>$user->producer_id, 'lowDate'=>$lowDate, 'highDate'=>$highDate]);   		
        }
        return $result;
    }



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

        $report_title = 'Product';


        
        $data;
        if (Input::has('title')) {
            $report_title = Input::get('title');
        }
        if (Input::has('end_date') && Input::has('start_date')) {
            $bDate = Input::get('start_date');
            $eDate = Input::get('end_date');

            if (strtolower($report_title) == 'selling') {
                $data = $this->fetch_buyers(true, $bDate, $eDate);
            } else if (strtolower($report_title) == 'buying') {
                $data = $this->fetch_reservations(true, $bDate, $eDate);
            } else {
                $data = $this->fetch_products(true, $bDate, $eDate);
            }
        } else {
            if (strtolower($report_title) == 'selling') {
                $data = $this->fetch_buyers();
            } else if (strtolower($report_title) == 'buying') {
                $data = $this->fetch_reservations();
            } else {
                $data = $this->fetch_products();
            }
        }

        echo "<html>" . "<head>" . "<title>Product Report</title>"
            . "<link rel=\"stylesheet\" href=\"/report.css\">" . "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">" . "</head>"
            . "<body>" . "<div><img src=\"/upload/posnic.png\" alt=\"cooperative\" style=\"width:152px;height:152;\" align=\"middle\"><h1>" . $report_title . " Report</h1></div>" . "<div>" . "<table border='4' class='stats center' cellspacing='0'>";
            if ($report_title != "Product") {
            	echo "<th>Producer Name</th>";
            }
            echo "<th>Day Produced</th>
            <th>Use By</th>
            <th>Batch ID</th>
            <th>Price</th>
            <th>Total Quantity</th>
            <th>Product Type</th>
            </tr>";
            foreach ($data as $value) {
            	echo "<tr>";
            	if ($report_title != "Product") {
            		echo "<td>" . $value->name . "</td>";
            	}
              	echo "<td>" . $value->day_produced . "</td>"
              	. "<td>" . $value->use_by . "</td>"
              	. "<td>" . $value->batch_id . "</td>"
              	. "<td>" . $value->price . "</td>"
              	. "<td>" . $value->quantity . "</td>"
              	. "<td>" . $value->product_type . "</td>"
              	. "</tr>";
            }
    	echo "</table>" . "<br>
	<button onclick=\"myFunction()\" id = \"print\">Print Report</button>

	<script>
		function myFunction() {
			document.getElementById(\"print\").style.visibility = \"hidden\";
   			window.print();
   			document.getElementById(\"print\").style.visibility = \"visible\";
		}
	</script>" . "</div>"
		. "</body>"
		. "</html>";
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
