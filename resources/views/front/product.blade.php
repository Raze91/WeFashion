@extends("layouts.master")

@section('content')

<section class="selected-product-ctnr">
    @if($product->image)
    <img src="{{asset('images/'.$product->image->link)}}">
    @else
    <img src="{{asset('images/noImage.jpg')}}" />
    @endif
    <div>
        <h1>{{$product->name}}</h1>
        <p>{{$product->description}}</p>
        <p><span>Prix :</span> {{$product->discount ? (50/100) * $product->price . "€ au lieu de " . $product->price : $product->price}} €</p>
        <p class="discount">{{$product->discount == 1 ? "Produit actuellement en solde" : "Produit non soldé"}}</p>
        <p><span>Catégorie : </span> {{$product->category ? $product->category->gender : "Pas de catégorie"}}</p>

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

        <button>Acheter</button>
    </div>
</section>

@endsection

<style>
    button {
        background-color: dodgerblue;
        color: white !important;
        border: none;
        border-radius: 4px;
        padding: 6px 20px;
        margin: 10px 0 !important;
    }

    button:hover {
        background-color: cornflowerblue;
    }
</style>