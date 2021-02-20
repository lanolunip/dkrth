<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DKRTH</title>


        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}">
        <!-- Styles -->
        <style>
            html, body {

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
                position: fixed;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }
            .header{
                background-color :  #96c93d;
                /* background-image : linear-gradient(to right, #00b09b, #96c93d); */
            }

            .title {
                font-size: 84px;
            }

            .sub-title {
                font-size: 64px;
            }

            .links > a {
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

            #sub-judul > .notasi{
                color: white;
                font-weight: bold;
            }
            #sub-judul {
                font-size: 36px;
            }

            #fungsi{
                background-color: #00b09b;
            }

            #SOP{
                background-color: lightgray;
            }

            .row > p {
                font-size: 28px;
                font-weight: bold;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height header">
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
                
                <div class="title">
                    <b>DKRTH</b>
                </div>

                <div id="sub-judul">
                    <span class="notasi">D</span>INAS <span class="notasi">K</span>EBERSIHAN DAN <span class="notasi">R</span>UANG <span class="notasi">T</span>ERBUKA <span class="notasi">H</span>IJAU
                </div>
                <h2>DEPARTEMEN POHON DAN TANAMAN</h2>
            </div>
        </div>
        <div id="fungsi" class="position-ref full-height flex-center">
            <div class= "content">
                <div class="container">
                    
                    <div class="sub-title m-b-md">
                        <b>FUNGSI</b>
                    </div>
                    
                    <div class="row">
                        <p>Melakukan Pemeliharan, Serta Mengurus Segala Hal Yang Berhubungan Dengan Pohon dan Tanaman Di Kota Surabaya</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="SOP" class="flex-container py-5 flex-center">
            <div class= "content">
                
                <div class="sub-title">
                    <b>SOP PELAPORAN</b>
                </div>

                <div class="container">

                    <div class="card-deck">  

                        <div class="card">
                            <h2 class="card-img-top">1</h2>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    
                        <div class="card">
                            <h2 class="card-img-top">2</h2>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    
                        <div class="card">
                            <h2 class="card-img-top">3</h2>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    
                        <div class="card">
                            <h2 class="card-img-top">4</h2>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                
                        <div class="card">
                            <h2 class="card-img-top">5</h2>
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>
