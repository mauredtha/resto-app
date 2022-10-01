<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function index(Request $request)
    {
        $data['q'] = $request->query('q');
        $data['status'] = $request->query('status');

        //$data['orders'] = Payment::where('payment_type', '=', 'KASIR')->get();
        $query = Payment::select('payments.*')
            ->where(function ($query) use ($data) {
                $query->where('payments.payment_type', '=', 'KASIR');
            })->orderBy('transaction_date','desc');

        if ($data['status'])
            $query->where('payments.status', $data['status']);

        $data['orders'] = $query->paginate(30)->withQueryString();
        // dd($data['menus']);
        return view('payments.index', compact('data'));
        
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

        if($request->payment_type == 'QRIS'){
            $payment['status'] = 'PAID';
        }else{
            $payment['status'] = 'UNPAID';
        }
        
        $payment['total'] = $request->total;

        if($request->order_type == 'DINEIN'){
            $findlastNoTrx = Payment::where('trx_no', 'LIKE', '%DI%')->where('transaction_date', 'LIKE', '%'.date('Y-m').'%')->orderBy('trx_no', 'desc')->limit(1)->get();

            //dd($findlastNoTrx);
            

            if(empty($lastNoTrx)) {
                $trx_no = 'DI'.date('ym').'00001';
            }else {
                $lastNoTrx = $findlastNoTrx[0]->trx_no;
                $order = substr($findlastNoTrx[0]->trx_no,6,5)+1;
                //dd($findlastNoTrx[0]->trx_no);
                //dd(substr($findlastNoTrx[0]->trx_no,6,5));
                //dd($order);
                
                if(strlen($order) == 4) $order = '0'.$order;
			    elseif(strlen($order) == 3) $order = '00'.$order;
			    elseif(strlen($order) == 2) $order = '000'.$order;
                elseif(strlen($order) == 1) $order = '0000'.$order;

			    $trx_no = 'DI'.date('ym').$order;
			    //$lastNoKwt[0][0]['NO_KWT']+1;
                //dd($trx_no);
		    }

            
        } else {

            $findlastNoTrx = Payment::where('trx_no', 'LIKE', '%TA%')->where('transaction_date', 'LIKE', '%'.date('Y-m').'%')->orderBy('trx_no', 'desc')->limit(1)->get();
            

            if(empty($lastNoTrx)) {
                $trx_no = 'TA'.date('ym').'00001';
            }else {
                $lastNoTrx = $findlastNoTrx[0]->trx_no;
                $order = substr($findlastNoTrx[0]->trx_no,6,5)+1;
                //dd($findlastNoTrx[0]->trx_no);
                //dd(substr($findlastNoTrx[0]->trx_no,6,5));
                //dd($order);
                
                if(strlen($order) == 4) $order = '0'.$order;
			    elseif(strlen($order) == 3) $order = '00'.$order;
			    elseif(strlen($order) == 2) $order = '000'.$order;
                elseif(strlen($order) == 1) $order = '0000'.$order;

			    $trx_no = 'TA'.date('ym').$order;
			    //$lastNoKwt[0][0]['NO_KWT']+1;
                //dd($trx_no);
		    }
        }

        $payment['trx_no'] = $trx_no;


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

        unset($categoryOrder);

        //dd($payment);
        //dd($payment_details);

        //$payment->save();
        if($request->payment_type == 'KASIR'){
            // return redirect()->route('resto', $categoryOrder)
            // return redirect()->route('order.category')
            return redirect()->route('order.list', $payment->id)
                        ->with('success','Berhasil Order, Silakan Melakukan Pembayaran Ke Kasir Sebesar Rp. '.number_format($request->total));
        }else {
            //return redirect()->route('resto', $categoryOrder)
            // return redirect()->route('order.category')
            return redirect()->route('order.list', $payment->id)
                        ->with('success','Berhasil Order, Anda Telah Melakukan Pembayaran Sebesar Rp. '.number_format($request->total).' Melalui QRIS');
        }
        
        //return redirect()->back()->with('success', 'Order successfully!');
    }

    
    public function show($payment)
    {
        $data['orders'] = Payment::where('id', '=', $payment)->get();
        $data['order_details'] = Payment::find($payment)->paymentDetails;

        foreach($data['order_details'] as $key=>$val){
            $menu = Menu::where('id', '=', $val->menu_id)->get();
            $data['order_details'][$key]['name'] = $menu[0]->name;
            $data['order_details'][$key]['pict'] = $menu[0]->pict;
        }

        //dd($data);

        return view('payments.show',compact(['payment', 'data']));
    }

    
    public function edit(Payment $payment)
    {

        //dd($payment);
        //$data['order_details'] = Payment::where('id', '=', $payment->id)->get();
        $data['order_details'] = Payment::find($payment->id)->paymentDetails;

        foreach($data['order_details'] as $key=>$val){
            $menu = Menu::where('id', '=', $val->menu_id)->get();
            $data['order_details'][$key]['name'] =  $menu[0]->name;
        }

        //dd($data);
        return view('payments.edit',compact(['payment', 'data']));
    }

    public function print($payment){
        $data['orders'] = Payment::where('id', '=', $payment)->get();
        $data['order_details'] = Payment::find($payment)->paymentDetails;

        foreach($data['order_details'] as $key=>$val){
            $menu = Menu::where('id', '=', $val->menu_id)->get();
            $data['order_details'][$key]['name'] =  $menu[0]->name;
        }

        //dd($data);

        // header("Content-type: text/html");
        // header("Content-Disposition: attachment; filename=invoice.pdf");
        //return $view;
        return view('payments.print',compact(['payment', 'data']));
    }

    
    public function update(Request $request, Payment $payment)
    {
        //dd($request);
        $data['payment_method'] = $request->payment_method;
        $data['status'] = 'PAID';
        $data['bayar'] = $request->jml_bayar;
        $data['kembalian'] = $request->kembalian;
        $data['updated_at'] = date('Y-m-d H:i:s');

        // dd($data);
      
        $payment->update($data); //$request->all()
      
        return redirect()->route('payments.index')
                        ->with('success','Payment updated successfully');
    }

    
    public function destroy(Payment $payment)
    {
        //
    }
}
