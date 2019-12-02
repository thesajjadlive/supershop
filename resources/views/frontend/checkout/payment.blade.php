@extends('layouts.front.master')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payments</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <ul class="checkout-progress-bar">
            <li>
                <span>Confirmation</span>
            </li>
            <li class="active">
                <span>Completed</span>
            </li>
        </ul>
        <div class="row" >
            <div class="col-lg-2"></div>
            <div class="col-lg-8 " id="printcontent">
                <div class="checkout-payment">
                    <h2 class="step-title">Ship To:</h2>

                    <div class="checkout-info-box">

                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>Order Number</th>
                                <td>{{ $order->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ ucfirst($customer->first_name).' '.ucfirst($customer->last_name) }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Address</th>
                                <td>{{ $customer->street_address.', '.$customer->district.'  '.$customer->zip }}</td>
                            </tr>
                            <tr>
                                <th>Payable Amount</th>
                                <td>{{ $order->total_price }}/-</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ ucfirst($order->payment_status) }}</td>
                            </tr>
                            <tr>
                                <th>Payment Type</th>
                                <td>{{ ucfirst($order->payment_type) }}</td>
                            </tr>
                            <tr>
                                <th> </th>
                                <td>
                                    <a class="btn btn-sm btn-outline-secondary" href="JavaScript:window.print();">Print Page</a>

                                    <button class="btn btn-sm btn-outline-secondary">Make Payment</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div><!-- End .checkout-info-box -->

                </div><!-- End .checkout-payment -->

                <div class="checkout-discount">
                    <h4>
                        <a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Apply Discount Code</a>
                    </h4>

                    <div class="collapse" id="checkout-discount-section">
                        <form action="#">
                            <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                            <button class="btn btn-sm btn-outline-secondary" type="submit">Apply Discount</button>
                        </form>
                    </div><!-- End .collapse -->
                </div><!-- End .checkout-discount -->

            </div><!-- End .col-lg-8 -->

        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
@endsection




@push('library-css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endpush



@push('custom-css')
    <style type="text/css">
        @media print
        {
            body * { visibility: hidden; }
            #printcontent * { visibility: visible; }
            #printcontent { position: absolute; top: 50px; left: 30px; }
        }
    </style>
@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
