@extends('layouts.shop')

@section('page')
    <div class="container">
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                                <div class="books-item-thumb">
                                    <img src="{{ asset($product->image) }}" alt="book">
                                    <div class="new">New</div>
                                    <div class="sale">Sale</div>
                                    <div class="overlay overlay-books"></div>
                                </div>

                                <div class="books-item-info">
                                    <a href="product/{{$product->id}}">
                                        <h5 class="books-title">{{ $product->name }}</h5>
                                    </a>

                                    <div class="books-price">${{ $product->price }}</div>
                                </div>
                            <form action="{{route('cart.add')}}" method="post">
                            @csrf
                                <div class="quantity">
                                    <a href="#" class="quantity-minus quantity-minus-d">-</a>
                                    <input title="Qty" class="email input-text qty text" name="qty" type="text" value="1">
                                    <a href="#" class="quantity-plus quantity-plus-d">+</a>
                                </div>

                                <input type="hidden" name="pdt_id" value="{{ $product->id }}">

                                <button class="btn btn-medium btn--primary" type="submit">
                                            <span class="text">Add to Cart</span>
                                            <i class="seoicon-commerce"></i>
                                            <span class="semicircle"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>{{ $products->links()  }}

            <div class="row pb120">

                <div class="col-lg-12"></div>

            </div>
        </div>
        </div>
    </div>
@endsection