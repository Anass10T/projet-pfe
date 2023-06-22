<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation de stage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            border-style: solid;
            border-width: 3px;
            border-color: black;
            /* background-image: url('images/CanvaNew.jpg'); */

        }

        p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body class="rounded">

    <center><img src="{{ public_path('images/logoministre.jpg') }}" width="150px" height="150px"></center>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center my-4">Attestation de stage</h1>
                <hr class="mb-4">
                <p class="mt-8"> Je soussignée,Madame <i>Ilham LAAZIZ</i>, agissant en qualité de Directrice du
                    programme GENIE, au Ministère de l'Education Nationale, du Préscolaire
                    et du Sport, <br> certifie que : <strong>{{ $stage->stagiaire->nom }}
                        {{ $stage->stagiaire->prenom }}</strong> a effectué un stage technique au sein de notre
                    direction
                    <strong> DU {{ \Carbon\Carbon::parse($stage->date_debut)->format('d/m/Y') }}
                        AU {{ \Carbon\Carbon::parse($stage->date_fin)->format('d/m/Y') }}</strong> en qualité de
                    <strong>{{ $stage->stagiaire->filiere }}</strong> .
                    <br><br>

                    Fait à Rabat, <br>
                    Pour servir et valoir ce que de droit
                </p>

                <?php
                $current_date = \Carbon\Carbon::now()->toDateString();
                $newDate = date('d-m-Y', strtotime($current_date));
                echo 'Le : ' . $newDate;
                
                ?>
            </div>
            <div>
                <br>
                <img src="{{ public_path('images/logo.jpg') }}" style="float: right">

                <?php
                $year = date('Y');
                echo "<div style='font-size: 10px;margin-top:120px;' class='text-center'> STG{$year}/{$stage->stagiaire->etablissement}/{$stage->stagiaire->filiere}/{$stage->stagiaire->id} </div>";
                ?>

</body>

</html>
