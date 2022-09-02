<html>
    <head>
        <title>2 Fat Guys</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
    </head>
    <body onload="window.print();">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Invoice
                <strong>{{$data['orders'][0]->trx_no}}</strong> 
                <span class="float-right"> <strong>Status:</strong> {{$data['orders'][0]->status}}</span>
        </div>

        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">Cust Name:</h6>
                    <div><strong>{{$data['orders'][0]->cust_name}}</strong></div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">Transaction Date:</h6>
                    <div>
                    <strong>{{$data['orders'][0]->transaction_date}}</strong>
                    </div>
                </div>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th class="right">Item Cost</th>
                            <th class="center">Qty</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = 1 @endphp
                    @php $total = 0 @endphp
                        @foreach($data['order_details'] as $id => $details)
                            @php $total += $details['price'] * $details['qty'] @endphp
                        <tr>
                            <td class="center">{{$no}}</td>
                            <td class="left strong">{{$details->name}}</td>
                            <td class="left">{{$details->price}}</td>
                            <td class="center">{{$details->qty}}</td>
                            <td class="right">{{$total}}</td>
                        </tr>
                        @php $no++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

            </div>

            <div class="col-lg-4 col-sm-5 ml-auto">
                <table class="table table-clear">
                    <tbody>
                        <tr>
                            <td class="left" colspan="4">
                                <strong>Grand Total</strong>
                            </td>
                            <td class="right">{{$data['orders'][0]->total}}</td>
                        </tr>
                        @if ($data['orders'][0]->payment_type == 'KASIR')
                        <tr>
                            <td class="left" colspan="4">
                                <strong>Bayar</strong>
                            </td>
                            <td class="right">{{$data['orders'][0]->bayar}}</td>
                        </tr>
                        
                        <tr>
                            <td class="left" colspan="4">
                                <strong>Kembalian</strong>
                            </td>
                            <td class="right">
                                <strong>{{$data['orders'][0]->kembalian}}</strong>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    </div>
</div>
</body>
</html>