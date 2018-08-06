<!DOCTYPE html>


<html lang="en">

<meta charset="UTF-8">

<head>
    <title>Liberation Church</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/med.css')}}">
    <link rel="stylesheet" href="{{asset('fontello/css/fontello.css')}}">
</head>
<body>
<div id="app">

    <Myheader></Myheader>


    <router-view></router-view>

    <Myfooter></Myfooter>


    <script type="text/javascript" src="{{asset('js/app.js ')}}"></script>
</div>


</body>





</html>