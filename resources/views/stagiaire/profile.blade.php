
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<body>
    @extends('layouts.body')
    @section('title', 'Profile')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card  mt-5">
                        <div class="card-header text-white" style="background-color: #008080;">Vos informations</div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/stagiaires/' . $stagiaire->photo) }}" alt="Profile-Image"
                                        class="img-fluid rounded-circle">
                                </div>
                                <div class="col-md-8">
                                    <h3>{{ $stagiaire->nom }} {{ $stagiaire->prenom }}</h3>
                                    <p class="lead">{{ $stagiaire->diplome_prepare }}</p>
                                </div>
                            </div>

                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td><strong>CIN :</strong></td>
                                        <td>{{ $stagiaire->cin }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sexe :</strong></td>
                                        <td>{{ $stagiaire->sexe }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Adresse :</strong></td>
                                        <td>{{ $stagiaire->adresse }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Téléphone :</strong></td>
                                        <td>{{ $stagiaire->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email :</strong></td>
                                        <td>{{ $stagiaire->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Etablissement :</strong></td>
                                        <td>{{ $stagiaire->etablissement }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Filière :</strong></td>
                                        <td>{{ $stagiaire->filiere }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Encadrant Académique:</strong></td>
                                        <td>{{ $stagiaire->encadrant }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Niveau d'étude :</strong></td>
                                        <td>{{ $stagiaire->niveau_etude }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Motivation :</strong></td>
                                        <td>{{ $stagiaire->motivation }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="text-center mt-4">
                                <a href="{{ route('stagiaire.edit', $stagiaire->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit mr-2"></i>
                                    Modifier les informations
                                </a>
                                <a href="{{ Route('stagiaire.pdf', $stagiaire) }}" class="btn btn-success">
                                    <i class="fas fa-file-pdf mr-2"></i>
                                    Télécharger la fiche d'inscription
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

</body>

</html>
