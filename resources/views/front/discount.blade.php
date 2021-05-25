@extends('layouts.master')

@section('content')

<header>
    <h1>Produits en soldes :</h1>
    <h2>{{count($products)}} résultat(s)</h2>
</header>
{{$products->links()}}
<div class="products-ctnr">
    @forelse($products as $product)

    <div class="product-card">
        <img src="https://content.asos-media.com/-/media/images/articles/men/2019/02/22-fri/how-asos-does-new-season-denim/mw-asos-style-feed-staff-style-denim-01.jpg?h=1100&w=870&la=fr-FR&hash=7B8220F6CF8523ADAC864F06AF84411B" />
        <div class="prices">
            <p class="old">{{$product->price}}€</p>
            <p>{{(50/100) * $product->price}}€</p>
        </div>
        <h2><a href="{{url('product', $product->id)}}">{{$product->name}}</a></h2>
        <p>{{$product->description}}</p>
    </div>
    @empty
    <h2>Pas de produit</h2>
    @endforelse
</div>

@endsection