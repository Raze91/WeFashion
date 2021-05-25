@extends('layouts.master')

@section('content')

<header>
    <h1>Catégorie {{$category->gender}} :</h1>
    <h2>{{count($products)}} résultat(s)</h2>
</header>
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