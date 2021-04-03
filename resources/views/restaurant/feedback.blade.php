@extends('restaurant')

@section('content')

<div class="row align-items-center">
    <div class="col">
        <h3 class="font-size-18 mb-0">Customer Feed Backs</h3>    
    </div>
</div>

<div class="card" >
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable" id="datatableOrder">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Customer Name</th>
                        <th>Message</th>
                        <th>Rating</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($feedbacks))
                    @foreach($feedbacks as $key => $value)
                    <tr data-entry-id="{{ $value->id ?? '' }}">
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $value->user->name ?? '' }}
                        </td>
                        <td>
                            {{ $value->message ?? ''}}
                        </td>
                        <td>
                        @if(isset($value->rating))
                            @if($value->rating == 1)
                            <span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                            @elseif($value->rating == 2)
                            <span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                            @elseif($value->rating == 3)
                            <span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                            @elseif($value->rating == 4)
                            <span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star"></span>
                            @elseif($value->rating == 5)
                            <span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span><span class="fa fa-star" style="color: orange;"></span>
                            @endif
                        @else
                        <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                        @endif
                        
                        </td>
                        <td>
                            {{date('d-m-Y H:i:s', strtotime($value->created_at)) ?? ""}}   
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