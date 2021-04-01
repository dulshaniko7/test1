<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = DB::select('select * from EMPLOYEES');
        $cus = DB::select('select * from CUSTOMERS');
        $orders = DB::select("select * from orders order by case
when status = 'hold' then '1'
when status = 'process' then '2'
when status = 'shipped' then '3'
else status end asc,
orderDate desc
");
        return view('orders.index', compact('emps', 'cus', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emps = DB::select('select * from EMPLOYEES');

        $cus = DB::select('select * from CUSTOMERS');

        return view('orders.create', compact('emps', 'cus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
       DB::insert('insert into orders
(orderDate,status,comments,customerNumber,employeeNumber)
 values (?,?,?,?,?)',[$request->orderDate,$request->status,$request->comments,$request->customerNumber,$request->employeeNumber]);
*/
        
        $data = $this->validate($request,[
            'orderDate'=>'required',
            'status'=> 'required',
        ]);
       $order = new Order();
       $order->status = $request->status;

        $order->comments = $request->comments;
        $order->orderDate = $request->orderDate;

        $order->customerNumber = $request->customerNumber;
        $order->employeeNumber = $request->employeeNumber;
$order->save();
        return redirect()->route('orders.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //  $order = Order::find($id);
        //$order->delete();
        //redirect()->route('orders.create');
    }
    public function del($id)
    {
        // DB::delete(DB::raw("DELETE FROM orders WHERE orderNumber = $id"));
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('orders.index');
    }

}
