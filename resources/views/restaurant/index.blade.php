@extends('restaurant')

@section('content')

<div class="row align-items-center">
    <div class="col">
        <h3 class="font-size-18 mb-0">Your Food List</h3>    
    </div>
</div>

<div class="card" >
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable" id="datatableOrder">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Food Name</th>
                        <th>Food Description</th>
                        <th>Food Image</th>
                        <th>Food Price</th>
                        <th>Food Type</th>
                        <th>Food Add Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($lists))
                    @foreach($lists as $key => $value)
                    <tr data-entry-id="{{ $value->id ?? "" }}">
                        <td>
                            {{ $key+1 }}
                        </td>
                        <td>
                            {{ $value->name ?? '' }}
                        </td>
                        <td>
                        {{substr($value->description, 0, 20) ?? ""}}</br>
                        {{substr($value->description, 21, 20) ?? ""}}
                        </td>

                        @if(isset($value->image))
                        <td>
                           <a href="#">
                                <img src="{{asset(''.$value->image)}}" alt="" height=80 width=80>
                            </a>
                        </td>
                        @else
                        <td>
                            Image Not Available
                        </td>
                        @endif

                        <td>
                            {{ $value->price ?? '' }}
                        </td>
                        @if($value->food_type == 1 ?? "")  
                        <td>
                            Vegeterian
                        </td>
                        @else
                        <td>
                           Non Vegeterian
                        </td>
                        @endif
                        <td>
                            {{date('d-m-Y H:i:s', strtotime($value->updated_at)) ?? ""}}   
                        </td>
                        <td>
                        <a href="{{ route('food.find', $value->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm px-1 py-1" style="color:orange;">Edit</a>
                        <a href="{{ route('food.delete', $value->id) }}" data-toggle="tooltip" title="Delete" class="btn btn-secondary btn-sm px-1 py-1">Delete</a>
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