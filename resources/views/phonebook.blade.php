<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}"></link>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        
        <title>Phonebook</title>

    </head>
    <body>
        <div id="app">

            <Myheader></Myheader>
            <div class="container">
                <router-view></router-view>
            </div>
            
            <Myfooter></Myfooter>

        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</body>
</html>
