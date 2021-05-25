@extends('layouts.master')

@section('content')

<header>
    <h1>Accueil :</h1>
    <h2>{{count($products)}} résultat(s)</h2>
</header>

<div class="products-ctnr">
    @forelse($products as $product)

    <div class="product-card">
        <img src="asset('images/femmes/wxl-_New_Coleen-006.jpg')"/>
        <h2><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h2>
        <p>{{$product->description}}</p>
    </div>
    @empty
    <h2>Pas de produit</h2>
    @endforelse
</div>

@endsection
