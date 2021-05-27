@extends('layouts.master')

@section('content')

<form action="{{route('product.index')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <h1>Créer un nouveau produit :</h1>
    <div class="global-ctnr">
        <div class="left-ctnr">

            <input type="hidden" name="ref" value="{{bin2hex(random_bytes(8))}}" />

            <label for="name">Nom :
                <input type="text" name="name" id="name" placeholder="Nom du produit" value="{{old('name')}}" />
                @if($errors->has('name'))
                <span class="error">{{$errors->first('name')}}</span>
                @endif
            </label>

            <label for="description">Description :
                <textarea name="description" id="description">{{old('description')}}</textarea>
                @if($errors->has('description'))
                <span class="error">{{$errors->first('description')}}</span>
                @endif
            </label>

            <label>Prix :
                <input type="number" min="1" max="9999" step="0.01" name="price" id="price" value="{{old('price')}}" />
            </label>

            <!-- <label>Taille :
                <select name="size" id="size">
                    <option {{ old('size') == "XS" ? 'selected' : '' }} value="XS">XS</option>
                    <option {{ old('size') == "S" ? 'selected' : '' }} value="S">S</option>
                    <option {{ old('size') == "M" ? 'selected' : ''}} value="M">M</option>
                    <option {{ old('size') == "L" ? 'selected' : ''}} value="L">L</option>
                    <option {{ old('size') == "XL" ? 'selected' : ''}} value="XL">XL</option>
                </select>
            </label> -->
            <h4>Tailles :</h4>

            <div class="sizes-ctnr">
                @foreach($sizes as $id => $size)
                <label>{{$size}}
                    <input type="checkbox" name="sizes[]" value="{{$id}}" id="sizes{{$id}}" {{ ( !empty(old('sizes')) and in_array($id, old('sizes')) )? 'checked' : '' }} />
                </label>
                @endforeach
            </div>

            <label>Categories :
                <select id="categories" name="category_id">
                    <option value="0" {{ is_null(old( 'category_id' )) ? 'selected' : '' }}>No category</option>
                    @foreach($categories as $id => $gender)
                    <option {{ old('category_id') == $id ? 'selected' : '' }} value="{{$id}}">{{$gender}}</option>
                    @endforeach
                </select>
            </label>

        </div>

        <div class="right-ctnr">

            <div class="global-radio-ctnr">
                <h3>Status :</h3>

                <div class="radio-ctnr">
                    <label>Publié
                        <input type="radio" @if(old('published')==1 ) checked @endif name="published" value="1" checked />
                    </label>

                    <label>Pas Publié
                        <input type="radio" @if(old('published')==0 ) checked @endif name="published" value="0" />
                    </label>
                </div>
            </div>

            <div class="global-radio-ctnr">
                <h3>Soldes :</h3>

                <div class="radio-ctnr">
                    <label>En solde
                        <input type="radio" @if(old('discount')==1 ) checked @endif name="discount" value="1" checked />
                    </label>

                    <label>Pas en solde
                        <input type="radio" @if(old('discount')==0 ) checked @endif name="discount" value="0" />
                    </label>
                </div>
            </div>

            <div class="img-ctnr">
                <h3>Image :</h3>
                <input type="file" name="picture" accept="image/png, image/jpeg" />
                @if($errors->has('picture')) <span class="error">{{$errors->first('picture')}}</span> @endif
            </div>

            <button type="submit">Créer un produit</button>
        </div>
    </div>

</form>
@endsection

<style>
    h1 {
        margin: 0 !important;
    }

    .global-radio-ctnr {
        width: 70%;
    }

    .radio-ctnr {
        display: flex;
    }

    .radio-ctnr label {
        display: flex;
    }

    .img-ctnr {
        margin-bottom: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
        margin: 0;
    }

    form label {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 5px 0;
        width: 50%;
    }

    form label div {
        display: flex;
        width: 100%;
    }

    form label input,
    form label textarea,
    form label select {
        width: 100%;
    }

    .global-ctnr {
        display: flex;
    }

    .left-ctnr,
    .right-ctnr {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 10px;
        justify-content: space-between;
        align-items: center;
    }

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

    .error {
        color: red;
    }
</style>