@extends('layouts.app')

@section('content') 
<div class="card">
    <div class="card-header">
    Add new Product
    </div>
    <div class="card-body">
        
            <table class="table">
                @foreach($products as $product)
                <thead>
                    <td>
                    Product name
                    </td>
                    <td></td>
                    <td></td>
                </thead>
                <tbody>
                    <td>
                        <a href="">
                            {{$product->name}}
                        </a>
                    </td>
                    <td>
                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-info">Edit</a>
                    </td>
                </tbody>
                </table>
                
            @endforeach
    </div>

</div>


@endsection