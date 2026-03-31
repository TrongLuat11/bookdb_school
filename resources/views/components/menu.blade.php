<nav class="navbar navbar-light">
    <div class="menu-wrap">
        <ul class="navbar-nav">
            {{$item}}
        </ul>
        @isset($cart)
            {{ $cart }}
        @endisset
    </div>
</nav>  
