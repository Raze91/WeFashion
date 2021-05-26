@extends('layouts.master')

@section('content')

<form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
    
    <h1>Modifier la catégorie :</h1>

    <input type="text" name="gender" value={{$category->gender}} />

    <button type="submit">Modifier la catégorie</button>
</form>
@endsection

<style>
    button {
        background-color: cornflowerblue;
        border: none;
        border-radius: 4px;
        padding: 10px;
        color: white !important;
    }

    button a {
        color: white;
    }
</style>