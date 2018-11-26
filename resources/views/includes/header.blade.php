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
        margin-left:100px;
       
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
        line-height: 120px;       
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
                    <a href="https://laravel-news.com">Newsletter</a>
                    <a href="https://laravel-news.com">About</a>
                    
                </div>
            </div>
            <div class="circle1">
            <div class="status-tag" >
<?php echo $dailyData[0]->air_quality_index?></div>
                <div class="circle2">{{ $dailyData[0]->healthHazardLevel->name }}</div>
            </div>
        </div>

<script>
$(function() {
    $('.circle1>.status-tag').each(function(){
    	console.log($(this).text());
      var text = $(this);
    	switch (text) {
     	case 1 ... 50:
        color = '#ff0000';
        break;
     	case 51 ... 100:
        color = '#6dc8bf';
        break;
        case 101 ... 150:
        color = '#761289';
        break;
        case 151 ... 200;
        color = '#726390':
        break;
        case 201 ... 300:
        color = '#097062';
        break;
        case 301 ... 500:
        color = '#86012';
        break;
        case 500 ... 700:
     	default:
        color = '#39d52d';
    	}
    	$(this).css('background', color);
    });
});
</script>