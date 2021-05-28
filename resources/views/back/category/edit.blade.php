@extends('layouts.master')

@section('content')

<form class="categoryForm" action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}

    <h1>Créer une nouvelle catégorie :</h1>

    <label>Nom de la catégorie :
        <input type="text" name="gender" />
    </label>
    @if($errors->has('gender'))
    <span class="error">{{$errors->first('gender')}}</span>
    @endif

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