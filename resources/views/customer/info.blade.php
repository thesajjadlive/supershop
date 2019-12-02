@extends('layouts.front.master')

@section('content')
    <div class="container">
        <div class="row" style="height: 30px"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Account Information <span class="float-right"><a href="{{ route('user.info.edit',$customer->id) }}" class="card-edit">Edit</a></span></div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>First Name</th>
                                <td>{{ ucfirst($customer->first_name) }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ ucfirst($customer->last_name) }}</td>
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
                                <th>Company</th>
                                <td>{{ $customer->company }}</td>
                            </tr>
                            <tr>
                                <th>Street Address</th>
                                <td>{{ $customer->street_address }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $customer->district }}</td>
                            </tr>
                            <tr>
                                <th>Zip Code</th>
                                <td>{{ $customer->zip }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




@push('library-css')

@endpush



@push('custom-css')

@endpush



@push('library-js')

@endpush



@push('custom-js')

@endpush
