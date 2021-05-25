<div>
    <ul>
        <li>
            <a href="/">WE FASHION</a>
        </li>
        <li><a href="/soldes">Solde</a></li>
        @if(Route::is('product.*') == false)
        @foreach($categories as $id => $category)
        <li style="margin-left: 20px;"><a href="{{url('category/' . $id)}}">{{$category}}</a></li>
        @endforeach
        @endif
    </ul>
</div>

<style>


</style>