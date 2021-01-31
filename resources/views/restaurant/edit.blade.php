@extends('restaurant')

@section('content')
<div class="row align-items-center">
    <div class="col">
        <h3 class="font-size-18 mb-0">Edit Food</h3>    
    </div>
    <div class="col-auto">
        <a class="btn btn-primary btn-sm px-2 py-1 mb-3" href="{{ route("restaurant") }}">Home</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{route('food.edit',$food->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Food Name<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$food->name ?? ""}}" required>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="description">Food Description (Max:100)<sup class="text-danger">*</sup></label>
                        <textarea type="text" class="form-control" id="description" name="description" required rows="2">{{$food->description ?? ""}}</textarea>
                    </div>
                </div>
                <div class="col-lg-12 form-group ml-3">
                    <div class="form-group">
                        <label for="image">Food Image</label>
                        <img class="ml-5" src="{{asset(''.$food->image)}}" style="height:100px;width:100px" name="oldimage">
                    </div>    
                        <input type="file" name="image" id="image" class="opacity-0 stretched-link" accept="image/*">
                    </div>
                <div class="row">
                    <div class="col-lg-3 form-group ml-3">
                        <label for="price">Food Price (₹)<sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$food->price ?? ""}}" required placeholder="220">
                    </div>
                    <div class="col-lg-3 form-group">   
                        <label for="foodtype">Select Food Type<sup class="text-danger">*</sup></label>
                        <select class="form-control" id="foodtype" name="food_type">
                            <option value="1" @if($food->food_type == 1) selected @endif>Vegetarian</option>
                            <option value="2" @if($food->food_type == 2) selected @endif>Non-Vegetarian</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="mt-3 ml-3 btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection