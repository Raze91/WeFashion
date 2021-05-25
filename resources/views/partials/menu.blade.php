<ul>
    <li>
        <a href="/">WE FASHION</a>
    </li>
    <li><a href="/solde" style="color: white">SOLDE</a></li>
    @if(Route::is('product.*') == false)
    @foreach($categories as $id => $category)
    <li style="margin-left: 20px;"><a href="{{url('category/' . $id)}}" style="color: white;">{{$category}}</a></li>
    @endforeach
    @endif
</ul>

<style>
    li:first-of-type a {
        margin: 0;
        color: #66EB9A;
        margin-right: 20px;
    }

    ul {
        display: flex;
        list-style: none;
        margin: 0;
        width: 100%;
    }

    li {
        color: white;
    }
    
</style>