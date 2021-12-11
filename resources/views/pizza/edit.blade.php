@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors)>0)
            <div class="card mt-5">
                <div class="card-body">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>
                <form action="{{route('pizza.update', $pizza->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                <div class="card-body">
                   <div class="form-group">
                       <label for="name">Name of pizza</label>
                       <input type="text" class="form-control" name="name" placeholder="pizza name" value="{{$pizza->name}}">
                   </div>
                   <div class="form-group">
                       <label for="description">Description of Pizza</label>
                       <textarea class="form-control" name="description">{{$pizza->description}}</textarea>
                   </div>
                   <div class="form-group">
                        <label>Pizza price ($)</label>
                        <div class="form-inline justify-content-between">
                                <input type="number" name="small_price" class="form-control" placeholder="small pizza" value="{{$pizza->small_price}}">
                                <input type="number" name="medium_price" class="form-control" placeholder="medium pizza" value="{{$pizza->medium_price}}">
                                <input type="number" name="large_price" class="form-control" placeholder="large pizza" value="{{$pizza->large_price}}">
                        </div>
                    </div>
                   <div class="form-group">
                       <label for="category">Category</label>
                       <select class="form-control" name="category">
                            <option value="vegetarian" {{ $pizza->category == 'vegetarian' ? 'selected' : '' }}>Vegetarian pizza</option>
                            <option value="nonvegetarian" {{ $pizza->category == 'nonvegetarian' ? 'selected' : '' }}>Non vegetarian pizza</option>
                            <option value="traditional" {{ $pizza->category == 'traditional' ? 'selected' : '' }}>Traditional pizza</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Image</label>
                       <input type="file" name="image" class="form-control">
                       <img src="{{Storage::url($pizza->image)}}" width="80">
                   </div>
                   <div class="form-group text-center">
                       <button class="btn btn-primary" type="submit">Save</button>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
