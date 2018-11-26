<style>
    .circles{
        padding-top:100px;
        
    }
    .circle1 ,.circle2, .circle3, .circle4 ,.circle5, .circle6, .circle7{
        border-radius: 50%;
        vertical-align:middle;

    }
    .circle1{
        height: 300px; 
        width: 350px;
        text-align: center;
        color: white;
        font: 45px "josefin sans", arial; 
        line-height: 180px;       
        margin-left:100px;
        padding-top:-50px -20px;
        border-style: solid;
        border-width: 2px;
        border-color:black;
    }

    .circle2{
        height: 180px; 
        width: 200px;
        text-align: center;
        background:rgb(91, 112, 101);
        color: #fff;
        font: 18px "josefin sans", arial; 
        line-height: 120px;  
        border-style: solid;
        border-width: 2px;
        border-color:black;
    }
    .circle3{
        height:100px;
        width:120px;
        background-color:rgba(47, 49, 49, 0.3);
        display:inline-block;
    }
    .circle4{
        height:80px;
        width:100px;
        background-color:rgba(66, 110, 134, 0.3);
        display:inline-block;
    }
    .circle5{
        height:200px;
        width:220px;
        background-color:rgba(249, 186, 50, 0.3);
        display:inline-block;
        margin-left:200px;
    }

    .circle6{
        height:200px;
        width:220px;
        background-color:rgba(249, 186, 50, 0.3);
        display:inline-block;
        margin-right:350px;
    }
    .circle7{
        height:100px;
        width:120px;
        background-color:rgba(91, 112, 101, 0.3);
        display:inline-block;
    }
    img{
        height:120px;
        
    }

    .form-inline{
        position: absolute;
        right: 6px;
    }
    
   nav{
        transition:.3s;
        height:85px;
    }
    .navbar fixed-top.scrolled{
        background-color: #fff !important;
  transition: background-color 200ms linear;
    }
    nav ul{
        list-style:none;
        float:right;
        margin:0;
        padding:0;
        display:flex;

    }
    nav ul li{
        list-style:none;
    }
    nav ul li a{
        line-height:80px;
        color:#fff;
        padding:12px 30px;
        text-decoration:none;
        text-transform:uppercase;
        transition:.3s;
    }
   nav ul li a:hover{
        color:#8fb7b3;
   }
    nav ul li a:focus{
        outline:none;
    }
    .btn{
        margin:8px;
    }
    .jumbotron{
        display:inline-block;
        float:right;
        width:600px;
       
    }
</style>

<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand"><img src="/logo.png" alt=""></a>
 
  <form class="form-inline">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Overview</a></li>
        <li><a href="#">Statistics</a></li>
        <li><a href="#">Newsletter</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Log out</a>
            </div>
      </li>
    </ul>
    
    <button class="btn btn-light" type="submit">Sign In</button>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>

  </form>
</nav>

<div class="circles">
    <div class="circle3"></div>
    <div class="circle6"></div>
    <div class="circle7"></div>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Current Index State Description</h1>
            <p class="lead">{{ $dailyData[0]->healthHazardLevel->description }}</p>
        </div>
    </div>
    <div class="circle1" style="background-color:{{$dailyData[0]->healthHazardLevel->color}};">
    <div class="status-tag" ><?php echo $dailyData[0]->air_quality_index?> PM2.5</div>
        <div class="circle2">{{ $dailyData[0]->healthHazardLevel->name }}</div>
    </div>
    
    <div class="circle4"></div>
    <div class="circle5"></div>



</div>

