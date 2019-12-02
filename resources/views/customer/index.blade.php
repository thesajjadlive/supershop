@extends('layouts.front.master')

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>My Dashboard</h2>

                <div class="alert alert-success" role="alert">
                    Hello, <strong>Pzx customer!</strong> Thank you for being with us. <br> <br>
                    From your My Dashboard you have the ability to view of your account summary and update your account information.
                </div><!-- End .alert -->

                <div class="mb-4"></div><!-- margin -->

                <h3>Account Information</h3>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Contact Information
                                <a href="{{ route('user.info.edit',$customer->id) }}" class="card-edit">Edit</a>
                            </div><!-- End .card-header -->

                            <div class="card-body">
                                <p>
                                    {{ ucfirst($customer->first_name).' '.ucfirst($customer->last_name) }}<br>
                                    {{ $customer->email }}<br>
                                    {{ $customer->phone }}<br>
                                </p>
                            </div><!-- End .card-body -->
                        </div><!-- End .card -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                newsletters
                                <a href=" " class="card-edit">Edit</a>
                            </div><!-- End .card-header -->

                            <div class="card-body">
                                <p>
                                    You are currently not subscribed to any newsletter.
                                </p>
                            </div><!-- End .card-body -->
                        </div><!-- End .card -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->

                <div class="card">
                    <div class="card-header">
                        Address Book
                        <a href="{{ route('user.info.edit',$customer->id) }}" class="card-edit">Edit</a>
                    </div><!-- End .card-header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="">Default Address</h4>
                                <address>
                                    {{ $customer->street_address }}<br>
                                    {{ $customer->district.'  '.$customer->zip }}<br>
                                </address>
                            </div>
                        </div>
                    </div><!-- End .card-body -->
                </div><!-- End .card -->
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class="active"><a href="{{ route('user.view') }}">Account Dashboard</a></li>
                        <li><a href="{{ route('user.details') }}">Account Information</a></li>
                        <li><a href="{{ route('user.info.edit',$customer->id) }}">Edit Information</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li><a href="#">My Product Reviews</a></li>
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
@endsection




@push('library-css')

@endpush



@push('custom-css')

@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
