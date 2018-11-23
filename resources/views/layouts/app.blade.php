<!doctype html>
<html lang="en">
    <head>
        @include('includes.head')
    </head>
    <body>
            @include('includes.header')

            <div class="container">
                @yield('content')
            </div>

            @include('includes.footer')
            <foot>
                @include('includes.foot')
            </foot>
    </body>
</html>