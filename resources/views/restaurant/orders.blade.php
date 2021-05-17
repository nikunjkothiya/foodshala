@extends('restaurant')

@section('content')

<div class="row align-items-center">
    <div class="col">
        <h3 class="font-size-18 mb-0">Order Foods List</h3>    
    </div>
    <div class="col-auto">
        <a class="btn btn-primary btn-sm px-2 py-1 mb-3" href="{{ route('restaurant') }}">Home</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable" id="datatableOrder">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Customer Mobile</th>
                        <th>Customer Address</th>
                        <th>Food Name</th>
                        <th>Food Price / Qty</th>
                        <th>Order Qty</th>
                        <th>Order Time</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($customers))
                    @foreach($customers as $key => $value)
                    <tr data-entry-id="{{ $value->foodid ?? "" }}">
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $value->customername ?? '' }}
                        </td>
                        <td>
                            {{ $value->customerphone ?? '' }}
                        </td>
                        <td>
                        {{substr($value->address, 0, 20) ?? ""}}</br>
                        {{substr($value->address, 21, 20) ?? ""}}
                        </td>
                        <td>
                            {{ $value->foodname ?? '' }}
                        </td>
                       
                        <td>
                            {{ $value->foodprice ?? '' }}
                        </td>
                        <td>
                            {{ $value->qty ?? '' }}
                        </td>
                        <td>
                            {{date('d-m-Y H:i:s', strtotime($value->time)) ?? ""}}   
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection