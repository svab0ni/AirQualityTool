<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark" style="height: 80px;">
    <a class="navbar-brand" href="/"><img style="height: 110px;" src="/logo.png" alt=""></a>

    <form class="form-inline">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-link"><a href="#">Home</a></li>
                <li class="nav-link"><a href="#">Overview</a></li>
                <li class="nav-link"><a href="#">Statistics</a></li>
                @if($user = Auth::user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{--<button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalRiskGroup" id="openModalRiskGroup">Settings</button>--}}
                            <a data-toggle="modal" data-target="#modalRiskGroup" id="openModalRiskGroup">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">Log out</a>
                        </div>
                    </li>
                @endif
            </ul>
            <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalNewsletter" id="openNewsletterModal">Newsletter</button>
            @if(!$user)
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalLogin" id="openLoginModal">Login</button>
            @endif
            {{--<button class="btn btn-light" type="submit">Sign In</button>--}}
            {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>--}}

        </div>
    </form>
</nav>

