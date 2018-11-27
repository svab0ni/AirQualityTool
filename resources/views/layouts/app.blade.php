<!doctype html>
<html lang="en">
    <head>
        @include('includes.head')
    </head>
    <body>
        <header>
            @include('includes.header')
        </header>
        <div class="icon-bar">
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="google"><i class="fa fa-google"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
        </div>
        <div class="container">


            <div id="main">
                @yield('content')
            </div>

            <hr>

            <div class="bqn">
                <div class="bqo">
                    <h2 class="bqp">Overview</h2>
                    <hr>
                </div>
            </div>
            <div id="main1" class="charts">
                @yield('overview')
            </div>
        </div>

        @include('includes.footer')
        <foot>
            @include('includes.foot')
        </foot>

    </body>
</html>