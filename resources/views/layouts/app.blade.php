<!doctype html>
<html lang="en">
    <head>
        @include('includes.head')
    </head>
    <body>
        <header>
            @include('includes.header')
        </header>
        <div class="container">


            <div class="bqn">
                <div class="bqo">
                    <h2 class="bqp">Statistics</h2>
                    <hr>
                </div>
            </div>

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