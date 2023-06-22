<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un compte</title>
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
                <h4 class="mb-4"><i class="fa fa-lg fa-fw fa-user"></i>Créer un compte</h4>
                <hr>
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <div class="row mb-3">
                        <div class="form-group">
                            <label class="mb-2">Nom :</label>
                            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Prénom :</label>
                            <input id="prenom" type="text"
                                class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Adresse mail :</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Mot de passe :</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Confirmer mot de passe :</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                    </div>

                    <button type="submit" class="btn btn-block btn-success mt-3 mb-3"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>Inscription</button>
                    <br>

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
