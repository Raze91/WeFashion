@extends('layouts.master')

@section('content')
<div style="display: flex; flex-direction: column; width: fit-content;">
    <button><a href="{{route('product.create')}}">Ajouter un livre</a></button>
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
            <td><a href="{{url('product', $product->id)}}">{{$product->name}}</a></td>
            <td>{{$product->category->gender}}</td>
            <td>{{$product->price}}€</td>
            <td>
                @if($product->status == 'published')
                <span class="published">Publié</span>
                @else
                <span class="unpublished">Pas publié</span>
                @endif
            </td>
            <td><a href="{{route('product.edit', $product->id)}}">Edit</a></td>
            <td>
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
</style>