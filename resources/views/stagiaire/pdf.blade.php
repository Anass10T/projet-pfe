<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vos informations
    </title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <style>
        h4,
        span {
            font-family: 'Secular One', sans-serif;
        }

        h4 {
            background-color: teal;
            color: white;
            padding: 5px 10px;
            margin-bottom: 15px;


        }

        .header {
            display: flex;
            align-items: center;
            position: relative;
        }

        .header .title {
            position: absolute;
            right: 20px;
            font-family: 'Secular One', sans-serif;

        }

        span {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('images/logo.jpg') }}" width="200px" height="100px">
        <div class="title">Fiche de Pré-inscription</div>
    </div>
    <div>
        <div>
            <div>
                <div>
                    <center><img src="{{ public_path('uploads/stagiaires/' . $stagiaire->photo) }}" width="100px"
                            height="100px" style="border-radius: 30%;"></center>
                </div>
                <h4>Coordonnées du stagiaire:</h4>
                <p><span>Nom :</span> {{ $stagiaire->nom }}</p>
                <p><span>Prénom :</span> {{ $stagiaire->prenom }}</p>
                <p><span>CIN :</span> {{ $stagiaire->cin }}</p>
                <p><span>Sexe :</span> {{ $stagiaire->sexe }}</p>
                <p><span>Adresse :</span> {{ $stagiaire->adresse }}</p>
                <p><span>Téléphone :</span> {{ $stagiaire->telephone }}</p>
                <p><span>Email :</span> {{ $stagiaire->email }}</p>
                <p><span>Etablissement :</span> {{ $stagiaire->etablissement }}</p>
                <p><span>Filière :</span> {{ $stagiaire->filiere }}</p>
                <p><span>Encadrant académique :</span> {{ $stagiaire->encadrant }}</p>
                <p><span>Niveau d'étude :</span> {{ $stagiaire->niveau_etude }}</p>
                <p><span>Diplôme préparé :</span> {{ $stagiaire->diplome_prepare }}</p>
                <p><span>Motivation :</span> {{ $stagiaire->motivation }}</p>
                <br><br>
                <center>
                    <?php
                    $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
                    echo "<div style='font-size: 10px;'> Date : " . $current_date_time . '</div>';
                    ?>
                </center>
            </div>
        </div>
    </div>
</body>

</html>
