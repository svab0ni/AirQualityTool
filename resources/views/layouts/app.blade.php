<!doctype html>
<html lang="en">
    <head>
        @include('includes.head')
        <link rel="stylesheet" href="/css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" ></script>
        <style>

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <div class="bqn">
            <div class="bqo">
                <h2 class="bqp">Overview</h2>
                <hr>
            </div>
        </div>

        <hr>

        <div id="main1" class="row">
            @yield('overview')
        </div>

        <div class="bqn">
            <div class="bqo">
                <h2 class="bqp">Statistics</h2>
                <hr>
            </div>
        </div>

        <div id="main" class="row">
            @yield('content')
        </div>
    </div>

            @include('includes.footer')
            <foot>
                @include('includes.foot')
            </foot>

        </body>
</html>