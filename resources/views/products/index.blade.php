@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
    Dashboard <a href="{{route('products.create')}}">New Products</a>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>description</th>
                <th>Price</th>
                <th></th>

            </thead>
                <tbody>
                    @foreach($products as $product)
                     <tr>
                        <td>
                        <img src="{{asset($product->image)}}" alt="{{$product->name}}" style="border-radius:20%; height:100px; width:100px">
                        </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>¥{{$product->price}}</td>
                            <td><a href="{{route('products.edit',['id' => $product->id])}}" class="btn btn-info">Edit this Product</a></td>
                            <td>
                            <form method="POST" action="{{route('products.destroy',['id'=> $product->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-alt"></i>
                                </button>
                            </form>
                         </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
  </div>
</div>

</div>
</div>
</div>
</div>

@endsection