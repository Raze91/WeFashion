@extends("layouts.master")

@section('content')

<section class="selected-product-ctnr">
    @if($product->image)
    <img src="{{asset('images/'.$product->image->link)}}">
    @endif
    <div>
        <h1>{{$product->name}}</h1>
        <p>{{$product->description}}</p>

        <label>Taille :
            <select>
                @forelse($product->sizes as $size)
                <option>{{$size->value}}</option>
                @empty
                Pas de tailles disponibles
                @endforelse
            </select>

        </label>

        <p class="discount">{{$product->discount == 1 ? "Produit actuellement en solde" : "Produit non soldé"}}</p>

        <p><span>Prix :</span> {{$product->discount ? (50/100) * $product->price . "€ au lieu de " . $product->price : $product->price}} €</p>

        <p><span>Catégorie : </span> {{$product->category->gender}}</p>
    </div>
</section>

@endsection