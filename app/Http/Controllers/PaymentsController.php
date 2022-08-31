<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function indexKasir()
    {
        $data['orders'] = Payment::get();
        // foreach($data['orders'] as $key=>$val){
        //     $data['orders'][$key]['details'] = Payment::find($val->id)->paymentDetails;
        // }

        // dd($data);
        // if(Auth::user()->role == 'Admin'){

        // }else{

        // }
        return view('payments.index',compact('data'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $categoryOrder = session()->get('categoryOrder');
        //dd($request);

        //dd(date('Y-m-d H:i:s'));
        $payment = new Payment();
        $payment['transaction_date'] = date('Y-m-d H:i:s');
        $payment['payment_type'] = $request->payment_type;
        $payment['order_type'] = $request->order_type;
        $payment['cust_name'] = $request->cust_name;
        $payment['table_no'] = $request->table_no;
        $payment['status'] = 'UNPAID';
        $payment['total'] = $request->total;

        $payment->save();

        //dd($payment->id);

        foreach ($request->orders as $key => $value) {
            $payment_details = new PaymentDetail();
            $payment_details['payment_id'] = $payment->id;
            $payment_details['menu_id'] = $value['menu_id'];
            $payment_details['qty'] = $value['qty'];
            $payment_details['price'] = $value['price'];

            $payment_details->save();

            $cart = session()->get('cart');
            if(isset($cart[$value['menu_id']])) {
                unset($cart[$value['menu_id']]);
                session()->put('cart', $cart);
            }
        }

        //dd($payment);
        //dd($payment_details);

        //$payment->save();
        if($request->payment_type == 'KASIR'){
            return redirect()->route('resto', $categoryOrder)
                        ->with('success','Berhasil Order, Silakan Melakukan Pembayaran Ke Kasir Sebesar Rp. '.number_format($request->total));
        }else {
            return redirect()->route('resto', $categoryOrder)
                        ->with('success','Berhasil Order, Anda Telah Melakukan Pembayaran Sebesar Rp. '.number_format($request->total).' Melalui QRIS');
        }
        
        //return redirect()->back()->with('success', 'Order successfully!');
    }

    
    public function show(Payment $payment)
    {
        //
    }

    
    public function edit(Payment $payment)
    {
        //
    }

    
    public function update(Request $request, Payment $payment)
    {
        //
    }

    
    public function destroy(Payment $payment)
    {
        //
    }
}
