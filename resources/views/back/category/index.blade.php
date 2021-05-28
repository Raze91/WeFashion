@extends('layouts.master')

@section('content')
<div style="display: flex; flex-direction: column; width: fit-content;">
    <button><a href="{{route('category.create')}}">Nouveau</a></button>
    {{$categories->links()}}
    @include('back.partials.flash')
</div>
<table>
    <thead>
        <tr>
            <th>Categorie</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->gender}}</td>
            
            <td><a href="{{route('category.edit', $category->id)}}">Edit</a></td>
            <td>
                <form class="deleteForm" action="{{ route('category.destroy', $category->id)}}" method="POST" style='margin: 0'>
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