@extends('layouts.master')

@section('content')

<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

    <h1>Créer une nouvelle catégorie :</h1>

    <input type="text" name="gender" />
    @if($errors->has('gender'))
    <span class="error">{{$errors->first('gender')}}</span>
    @endif

    <button type="submit">Ajouter la catégorie</button>
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