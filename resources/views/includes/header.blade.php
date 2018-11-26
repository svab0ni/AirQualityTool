<style>
    .circle1{
        display: table-cell;
        height: 300px; 
        width: 350px;
        text-align: center;
        vertical-align: middle;
        border-radius: 50%;
        background: #000;
        color: #fff;
        font: 45px "josefin sans", arial; 
        line-height: 180px;       
        margin-left:220px;
       
    }

    .circle2{
        display: table-cell;
        height: 180px; 
        width: 200px;
        text-align: center;
        vertical-align: middle;
        border-radius: 50%;
        background:rgb(91, 112, 101);
        color: #fff;
        font: 18px "josefin sans", arial; 
        line-height: 180px;       
    }
</style>
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content"> 
                <div class="title m-b-md">
                    <?php
                        
                        if (date("H") > 0 && date("H") < 17){
                            echo 'Hello';
                        }
                        else if (date("H") > 17 && date("H") < 23) {
                            echo 'Good Evening';
                        }
                        else {
                            echo 'Good Night';
                        }
                    ?>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Home</a>
                    <a href="https://laracasts.com">Statistics</a>
                    <a href="https://laravel-news.com">About</a>
                    
                </div>
            </div>
            <div class="circle1"><?php echo $data8[0]->air_quality_index?>
                <div class="circle2">Hazard Name<?php //echo $d[0]->name?></div>
            </div>
        </div>