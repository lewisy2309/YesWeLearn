<!-- Header Section Begin -->
<header class="header-section">
    <nav class="container-fluid navbar navbar-light bg-light d-flex align-items-center flex-row">
        <a class="navbar-brand  " href="#">
            <img src=" {{asset('img/yeswelearng.png')}} " width="80" height="60" class="d-inline-block align-top" alt="" loading="lazy">

        </a>
        <div class="navbar-nav ml-md-auto ">
            @if (Auth::check())
                @include('incs.auth.header')
            @else
                @include('incs.ano.header')
            @endif
        </div>
        <div id="mobile-menu-wrap"></div>
    </nav>
</header>
<!-- Header End -->
