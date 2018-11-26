<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Air Quality Tool</title>

<link rel="stylesheet" href="/css/app.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

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
    .container > .charts{
        width:100%
    }

    .circles{
         padding-top:0px;
    }
        .circle1 ,.circle2, .circle3, .circle4 ,.circle5, .circle6, .circle7, .circle8{
        border-radius: 50%;
        vertical-align:middle;
        animation-name: fadeIn;
        animation-duration: 4s;
    }
    @keyframes fadeIn {
        from {opacity:0;}
        to {opacity:1;}
    }
    @keyframes growIn {
        from {width:0;height:0;}
        to {
        }
    }
    .circle1{
        animation-name: fadeIn;
        animation-duration: 5s;
        height: 300px;
        width: 350px;
        text-align: center;
        color: white;
        font: 45px "josefin sans", arial;
        line-height: 180px;
        margin-left:100px;
        padding-top:-50px -20px;
        border-style: solid;
        border-width: 1px;
        border-color:black;
    }

    .circle2{
        animation-name: fadeIn;
        animation-duration: 5s;
        height: 180px;
        width: 200px;
        text-align: center;
        background:rgb(91, 112, 101);
        color: #fff;
        font: 18px "josefin sans", arial;
        line-height: 120px;
        border-style: solid;
        border-width: 1px;
        border-color:black;
    }
    .circle3{
        height:100px;
        width:120px;
        background-color:rgba(47, 49, 49, 0.3);
        display:inline-block;
        animation-name: growIn;
        animation-duration: 3s;

    }
    .circle4{
        height:80px;
        width:100px;
        background-color:rgba(66, 110, 134, 0.3);
        display:inline-block;
        animation-name: growIn;
        animation-duration: 1s;

    }
    .circle5{
        height:170px;
        width:190px;
        background-color:rgba(249, 186, 50, 0.3);
        display:inline-block;
        margin-left:200px;
        animation-name: growIn;
        animation-duration:6s;

    }

    .circle6{
        animation-name: growIn;
        animation-duration: 1s;
        height:200px;
        width:220px;
        background-color:rgba(249, 186, 50, 0.3);
        display:inline-block;
        margin-right:350px;


    }
    .circle7{
        animation-name: growIn;
        animation-duration: 3s;
        height:100px;
        width:120px;
        background-color:rgba(91, 112, 101, 0.3);
        display:inline-block;
    }
    .circle8{
        animation-name: growIn;
        animation-duration: 3s;
        height:100px;
        width:120px;
        background-color:rgba(141, 12, 101, 0.3);
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
    /* Fixed/sticky icon bar (vertically aligned 50% from the top of the screen) */
    .icon-bar {
        position: fixed;
        top: 50%;
        -webkit-transform: translateY(50%);
        -ms-transform: translateY(50%);
        transform: translateY(-50%);
    }

    /* Style the icon bar links */
    .icon-bar a {
        display: block;
        text-align: center;
        padding: 16px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
    }

    /* Style the social media icons with color, if you want */
    .icon-bar a:hover {
        background-color: #000;
    }

    .facebook {
        background: #3B5998;
        color: white;
    }

    .twitter {
        background: #55ACEE;
        color: white;
    }

    .google {
        background: #dd4b39;
        color: white;
    }

    .linkedin {
        background: #007bb5;
        color: white;
    }

    .youtube {
        background: #bb0000;
        color: white;
    }
</style>
