@extends('layouts.app')

@section('content') 
<div class="card">
    <div class="card card-default">
        <div class="card-header">{{ isset($post) ? 'Edit Post' : 'Create Post'}}</div>
        <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
             {{ implode('', $errors->all(':message')) }}

        </div>

        @endif
    <div class="card-body">
        <form enctype="multipart/form-data" 
            action="{{isset($product)?route('products.update',$product->id):route('products.store')}}"
             method="POST">
        @csrf
        @if(isset($product))
        @method('put')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{isset($product)?$product->name:''}}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{isset($product)?$product->price:''}}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="discription">Discription</label>
            <textarea name="discription"
                     id="discription"
                      cols="30" rows="10"
                       class="form-control"
                       >{{isset($product)?$product->name:''}}</textarea>
        </div>
        <input type="submit" class="btn btn-success">

        </form>
    </div>

</div>


@endsection