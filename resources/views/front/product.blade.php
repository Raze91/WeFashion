@extends("layouts.master")

@section('content')

<section class="selected-product-ctnr">
    @if($product->image)
    <img src="{{asset('images/'.$product->image->link)}}">
    @endif
    <div>
        <h1>{{$product->name}}</h1>
        <p>{{$product->description}}</p>

        @if(count($product->sizes) > 0)
        <label>Taille :

            <select>
                @foreach($product->sizes as $size)
                <option>{{$size->value}}</option>
                @endforeach
            </select>
        </label>
        @else
        <p><span>Taille :</span>Aucune tailles disponibles</p>
        @endif



        <p class="discount">{{$product->discount == 1 ? "Produit actuellement en solde" : "Produit non soldé"}}</p>

        <p><span>Prix :</span> {{$product->discount ? (50/100) * $product->price . "€ au lieu de " . $product->price : $product->price}} €</p>

        <p><span>Catégorie : </span> {{$product->category ? $product->category->gender : "Pas de catégorie"}}</p>
    </div>
</section>

@endsection