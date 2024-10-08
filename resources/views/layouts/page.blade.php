<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Bootsrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}" />
        </head>
    <body class="antialiased">
        <!-------NavBar------------>
        @include("layouts/navbar")
        <!-------Body------------>
        <div class='container'>
            @yield('content')
        </div>
        <!-------Footer------------>
        @include("layouts/footer")
    </body>
<script>
    // show the dropdow menu
    document.querySelector(".dropdown").addEventListener('click',()=>{
        document.getElementsByClassName("dropdown-menu")[0].style.display =
        document.getElementsByClassName("dropdown-menu")[0].style.display ===
        "block"
        ? "none"
        : "block";
    });
</script>
@yield('script')
</html>
