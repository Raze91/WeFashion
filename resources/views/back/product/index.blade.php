@extends('layouts.master')

@section('content')
<div style="display: flex; flex-direction: column; width: fit-content;">
    <button><a href="{{route('product.create')}}">Ajouter un produit</a></button>
    {{$products->links()}}
    @include('back.partials.flash')
</div>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Etat</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr>
            <td data-label="Nom"><a href="{{url('product', $product->id)}}">{{$product->name}}</a></td>
            <td data-label="Categorie">{{$product->category ? $product->category->gender : "Pas de catégorie"}}</td>
            <td data-label="Prix">{{$product->discount ? $product->price."€". " => " .(50/100) * $product->price : $product->price}}€</td>
            <td data-label="Etat">
                @if($product->published == true)
                <span class="published">Publié</span>
                @else
                <span class="unpublished">Pas publié</span>
                @endif
            </td>
            <td data-label="Edit"><a href="{{route('product.edit', $product->id)}}">Edit</a></td>
            <td data-label="Delete">
                <form class="deleteForm" action="{{ route('product.destroy', $product->id)}}" method="POST" style='margin: 0'>
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="delete" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
@parent
<script src="{{asset('js/confirm.js')}}"></script>
@endsection

<style>
    table {
        width: 100%;
    }

    tr>th,
    tr>td {
        padding: 10px;
    }

    thead,
    tr>td {
        border-bottom: solid 1px gray;
    }

    button {
        background-color: dodgerblue;
        border: none;
        border-radius: 4px;
        padding: 8px;
    }

    button:hover {
        background-color: cornflowerblue;
    }

    button a {
        color: white;
    }

    button a:hover {
        color: white;
        text-decoration: none;
    }

    .delete {
        background-color: crimson;
        display: block;
        color: white;
    }

    .delete:hover {
        background-color: brown;
    }

    .published {
        background-color: forestgreen;
        padding: 8px;
        color: white;
    }

    .unpublished {
        background-color: darkgoldenrod;
        padding: 8px;
        color: white;
    }

    @media screen and (max-width: 674px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
        }

        table td::before {
            /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
            content: attr(data-label);
            float: left;
            font-weight: bold;
        }

        table td:last-child {
            border-bottom: 0;
        }

        .delete {
            display: initial !important;
        }
    }
</style>