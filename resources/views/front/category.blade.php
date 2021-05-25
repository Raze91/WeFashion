@extends('layouts.master')

@section('content')

<h1>Categorie {{$category->gender}}</h1>
{{$products->links()}}

<div class="products-ctnr">

    @forelse($products as $product)
    <div class="product-card">
        <h2>{{$product->name}}</h2>
        <p>{{$product->description}}</p>
    </div>
    @empty
    <h2>Pas de produit</h2>
    @endforelse
</div>

@endsection