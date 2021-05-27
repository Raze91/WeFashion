@extends('layouts.master')

@section('content')

<header>
    <h1>Accueil :</h1>
    <h2>{{count($products)}} résultat(s)</h2>
</header>

<div class="products-ctnr">
    @forelse($products as $product)

    <div class="product-card">
        <div class="card-img-ctnr">
            @if($product->image)
            <img src="{{asset('images/'.$product->image->link)}}">
            @endif
        </div>
        <p>{{$product->price}}€</p>
        <h2><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h2>
        <p>{{$product->description}}</p>
    </div>
    @empty
    <h2>Pas de produit</h2>
    @endforelse
</div>
{{$products->links()}}
@endsection