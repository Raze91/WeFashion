@extends('layouts.master')

@section('content')

<header>
    <h1>Produits en soldes :</h1>
    <h2>{{count($products)}} résultat(s)</h2>
</header>
<div class="products-ctnr">
    @forelse($products as $product)

    <a class="product-card" href="{{url('product', $product->id)}}">
        <div class="card-img-ctnr">
            @if($product->image)
            <img src="{{asset('images/'.$product->image->link)}}">
            @else
            <img src="{{asset('images/noImage.jpg')}}" />
            @endif
        </div>
        <div class="prices">
            <p class="old">{{$product->price}}€</p>
            <p>{{(50/100) * $product->price}}€</p>
        </div>
        <h3>{{$product->name}}</h3>
    </a>
    @empty
    <h2>Pas de produit</h2>
    @endforelse
</div>
{{$products->links()}}

@endsection