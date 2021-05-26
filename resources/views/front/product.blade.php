@extends("layouts.master")

@section('content')

<section class="selected-product-ctnr">
    <img src="https://content.asos-media.com/-/media/images/articles/men/2019/02/22-fri/how-asos-does-new-season-denim/mw-asos-style-feed-staff-style-denim-01.jpg?h=1100&w=870&la=fr-FR&hash=7B8220F6CF8523ADAC864F06AF84411B">
    <div>
        <h1>{{$product->name}}</h1>
        <p>{{$product->description}}</p>

        <label>Taille :
            <select>
                <option>{{$product->size}}</option>
            </select>
        </label>

        <p class="discount">{{$product->discount == 1 ? "Produit actuellement en solde" : "Produit non soldé"}}</p>

        <p><span>Prix :</span> {{$product->discount ? (50/100) * $product->price . "€ au lieu de " . $product->price : $product->price}} €</p>

        <p><span>Catégorie : </span> {{$product->category->gender}}</p>
    </div>
</section>

@endsection