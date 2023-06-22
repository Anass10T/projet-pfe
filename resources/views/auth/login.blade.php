<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pateforme de gestion des stagiaires</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #009688;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container bg-white p-3 rounded shadow">
        <div class="row justify-content-center" style="margin-top:45px">
            <div class="col-md-4">
                <h4 class="mb-4"><i class="fa fa-lg fa-fw fa-user"></i>Authentication </h4>
                <hr>
                <form action="{{ route('login') }}" method="POST">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label class="mb-2">Adresse mail</label>
                        <input type="text" class="form-control" name="email" placeholder="Exemple@mail.com"
                            value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="*************">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-block btn-success mt-3 mb-3"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>Se connecter</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <br>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
