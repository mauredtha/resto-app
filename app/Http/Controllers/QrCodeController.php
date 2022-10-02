<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use App\Models\Status;

class QrCodeController extends Controller
{
    public function indexQr()
    {
        // \QrCode::size(500)
        //         ->format('png')
        //         ->generate('localhost:8000/resto', public_path('images/qrcode.png'));
      
        return view('qrcode');
    }

    public function downloadQRCode(Request $request, $type)
    {
         $headers    = array('Content-Type' => ['png','svg','eps']);
         $type       = $type == 'jpg' ? 'png' : $type;
         $image      = \QrCode::format($type)
                      ->size(200)->errorCorrection('H')
                      ->generate('codingdriver');

         $imageName = 'qr-code';
         if ($type == 'svg') {
             $svgTemplate = new \SimpleXMLElement($image);
             $svgTemplate->registerXPathNamespace('svg', 'http://www.w3.org/2000/svg');
             $svgTemplate->rect->addAttribute('fill-opacity', 0);
             $image = $svgTemplate->asXML();
         }

         \Storage::disk('public')->put($imageName, $image);

         return response()->download('storage/'.$imageName, $imageName.'.'.$type, $headers);
    }

    public function index(Request $request)
    {
        $data['q'] = $request->query('q');
        $data['status'] = $request->query('status');
        $data['start'] = $request->query('start');
        $data['end'] = $request->query('end');
        $data['statuses'] = Status::where('id', 'PAID')->orWhere('id', 'UNPAID')->get();

        $query = Payment::select('payments.*')
            ->where(function ($query) use ($data) {
                $query->where('payments.payment_type', '=', 'QRIS');                
            })
            ->where(function ($query) use ($data) {
                $query->where('payments.cust_name', 'like', '%' . $data['q'] . '%');                
            })
            ->orderBy('transaction_date','desc');

            // dd($data['start']);
        if ($data['start'])
            $query->whereDate('transaction_date', '>=', $data['start']);
        if ($data['end'])
            $query->whereDate('transaction_dates', '<=', $data['end']);
        if ($data['status'])
            $query->where('payments.status', $data['status']);

        $data['orders'] = $query->paginate(30)->withQueryString();
        // dd($data['menus']);
        return view('payments.index-qris', $data);
        
    }

    public function edit($payment)
    {

        //dd($payment);
        //$data['order_details'] = Payment::where('id', '=', $payment->id)->get();
        $data['orders'] = Payment::where('id', '=', $payment)->get();
        $data['order_details'] = Payment::find($payment)->paymentDetails;

        foreach($data['order_details'] as $key=>$val){
            $menu = Menu::where('id', '=', $val->menu_id)->get();
            $data['order_details'][$key]['name'] =  $menu[0]->name;
        }

        //dd($data);
        return view('payments.edit-qris',compact(['payment', 'data']));
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

        return view('payments.detail',compact(['payment', 'data']));
    }

    public function print($payment){
        $data['orders'] = Payment::where('id', '=', $payment)->get();
        $data['order_details'] = Payment::find($payment)->paymentDetails;

        dd($data);

        // header("Content-type: text/html");
        // header("Content-Disposition: attachment; filename=invoice.pdf");
        //return $view;
        return view('payments.print',compact(['payment', 'data']));
    }

    
    public function update(Request $request, $payment)
    {
        //$payments = Payment::where('id', '=', $payment)->get();

        $payments = Payment::where('id',$payment)->first()->update(['status' => 'PAID',
        'updated_at' => date('Y-m-d H:i:s'),]);
        
    
        return redirect()->route('invoice', $payment)
                        ->with('success','Payment updated successfully');
    }
}
