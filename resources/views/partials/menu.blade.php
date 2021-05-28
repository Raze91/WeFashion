<div>
    <ul>
        <div class="left">

            @if(Route::is('product.*') == false && Route::is('category.*') == false)
            <li>
                <a class="logo" href="/">WE FASHION</a>
            </li>
            <li><a href="/soldes">Solde</a></li>
            @if(count($categories) > 2)
            <li class="dropdown">
                <button onclick="displayDropdown()" class="dropBtn">Catégories <i class="fas fa-angle-down"></i></button>
                <div class="dropdown-content" id="dropdown">
                    @foreach($categories as $id => $category)
                    <a href="{{url('category/' . $id)}}">{{$category}}</a>
                    @endforeach
                </div>
            </li>
            @else
            @foreach($categories as $id => $category)
            <li><a href="{{url('category/' . $id)}}">{{$category}}</a></li>
            @endforeach
            @endif
            @else
            <li>
                <p class="logo">WE FASHION</p>
            </li>
            <li><a href="{{route('product.index')}}">Produits</a></li>
            <li><a href="{{route('category.index')}}">Catégories</a></li>
            @endif
        </div>
        <div class="right">

            @if(Auth::check())
            @if($isAdmin)
            @if(Route::is('product.*') == false && Route::is('category.*') == false)
            <li><a href="{{route('product.index')}}">Dashboard</a></li>
            @else
            <li>
                <a href="/"><i class="fas fa-home fa-lg"></i></a>
            </li>
            @endif
            @endif
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                <form id="logout-form" action="{{route('logout')}}" method="POST">{{csrf_field()}}</form>
            </li>
            @else
            <li><a href="{{route('login')}}">Login</a></li>
            @endif
        </div>
    </ul>
</div>

<script>
    function displayDropdown() {
        document.getElementById("dropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropBtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>