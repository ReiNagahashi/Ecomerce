@extends('layouts.app')
@section('content')
　
<div class="text-center">
    <div class="card">
        <div class="card-header">{{isset($product)? 'Edit Page' : 'Create Page'}}</div>
        <div class="card-body">
            <form action={{isset($product)? route('products.update',['product' => $product->id]):route('products.store')}} method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{isset($product)? $product->name : ""}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="article-ckeditor" cols="30" rows="10" class="form-control">
                        {{isset($product)? $product->description : ""}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image"　class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{isset($product)? $product->price : ""}}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="{{isset($product)? 'Edit' : 'Create'}}" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection