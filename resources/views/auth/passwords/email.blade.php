<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <title>Réinitialiser le mot de passe</title>
    <style>
        nav {

            display: flex;

            justify-content: space-between;

            align-items: center;

            min-height: 8vh;

            padding: 0 100px;
            background-color: teal;

            font-family: "Montserrat", sans-serif;

        }

        .heading {

            color: white;


            font-size: 20px;

        }

        .card {
            margin-top: 20%;
        }

        .nav-links {

            display: flex;

            justify-content: space-around;



        }

        .nav-links li {

            list-style: none;

        }

        .nav-links a {

            color: white;

            text-decoration: none;

            font-weight: bold;

            font-size: 14px;

            padding: 14px 16px;

        }

        .nav-links a:hover:not(.active) {

            background-color: lightseagreen;

        }

        .nav-links li a.active {

            background-color: #4caf50;

        }

        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a {
            color: white;
        }
    </style>
</head>

<body>
    <nav>

        <div class="heading">

            <h4><a href="http://127.0.0.1:8000/"> Projet GENIE </a></h4>

        </div>


    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color:white;background-color:teal;">
                        {{ __('Réinitialiser le mot de passe') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Adresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Réinitialisation du mot de passe') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
