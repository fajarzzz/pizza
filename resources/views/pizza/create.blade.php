@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="" class="list-group-item list-group-item-action">View</a>
                        <a href="" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}</div>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{route('pizza.store')}}" method="post">@csrf
                <div class="card-body">
                   <div class="form-group">
                       <label for="name">Name of pizza</label>
                       <input type="text" class="form-control" name="name" placeholder="pizza name">
                   </div>
                   <div class="form-group">
                       <label for="description">Description of Pizza</label>
                       <textarea class="form-control" name="description"></textarea>
                   </div>
                   <div class="form-group">
                        <label>Pizza price ($)</label>
                        <div class="form-inline justify-content-between">
                                <input type="number" name="small_price" class="form-control" placeholder="small pizza">
                                <input type="number" name="medium_price" class="form-control" placeholder="medium pizza">
                                <input type="number" name="large_price" class="form-control" placeholder="large pizza">
                        </div>
                    </div>
                   <div class="form-group">
                       <label for="category">Category</label>
                       <select class="form-control" name="category">
                            <option value="vegetarian">Vegetarian pizza</option>
                            <option value="nonvegetarian">Non vegetarian pizza</option>
                            <option value="traditional">Traditional pizza</option>
                       </select>
                   </div>
                   <div class="form-group">
                       <label>Image</label>
                       <input type="file" name="image" class="form-control">
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
