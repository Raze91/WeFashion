@extends('layouts.master')

@section('content')
<div class="admin-header">
    <a class="button" href="{{route('category.create')}}">Nouveau</a>
    {{$categories->links()}}
    @include('back.partials.flash')
</div>
<table>
    <thead>
        <tr>
            <th>Categorie</th>
            <th>Edition</th>
            <th>Suppression</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->gender}}</td>

            <td><a href="{{route('category.edit', $category->id)}}">Editer</a></td>
            <td>
                <form class="deleteForm" action="{{ route('category.destroy', $category->id)}}" method="POST" style='margin: 0'>
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="delete" type="submit">Supprimer</button>
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