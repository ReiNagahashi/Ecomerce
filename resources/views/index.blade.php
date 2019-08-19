@extends('layouts.frontend')
@section('page')
​
​
<div class="content-wrapper">
​
        <div class="container">
            <div class="row pt120">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="heading align-center mb60">
                        <h4 class="h1 heading-title">E-commerce tutorial</h4>
                        <p class="heading-text">Buy books, and we ship to you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
​
        <!-- End Books products grid -->
​
        <div class="container">
            <div class="row pt120">
                <div class="books-grid">
​
                <div class="row mb30"> 
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="books-item">
                                <div class="books-item-thumb">
                                    <img src="{{asset($product->image)}}" alt="book">
                                    <div class="new">New</div>
                                    <div class="sale">Sale</div>
                                    <div class="overlay overlay-books"></div>
                                </div>
​
                                <div class="books-item-info">
                                    <h5 class="books-title">
                                        <a href="{{ route('product.single',['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h5>
​
                                    <div class="books-price">${{ $product->price }}</div>
                                </div>
​
                                <a href="{{ route('rapid.cart.add', ['id' => $product->id])}}" class="btn btn-small btn--dark add">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
​
                <div class="row pb120">
​
                    <div class="col-lg-12">
​
                        {{-- <nav class="navigation align-center">
​
                            <a href="#" class="page-numbers bg-border-color current"><span>1</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>2</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>3</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>4</span></a>
                            <a href="#" class="page-numbers bg-border-color"><span>5</span></a>
​
                            <svg class="btn-prev">
                                <use xlink:href="#arrow-left"></use>
                            </svg>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
​
                        </nav> --}}
​
                        {{ $products->links() }}
​
                    </div>
​
                </div>
            </div>
            </div>
        </div>
</div>
​
​
​
@endsection