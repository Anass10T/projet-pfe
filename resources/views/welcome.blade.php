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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        * {

            margin: 0px;

            padding: 0px;

            box-sizing: border-box;

        }

        body {
            overflow: hidden;
        }

        nav {

            display: flex;

            justify-content: space-between;

            align-items: center;

            min-height: 6vh;

            padding: 0 100px;
            background-color: #008080;

            font-family: "Montserrat", sans-serif;

        }

        .heading {

            color: white;


            font-size: 20px;

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


        .hero-section {
            background-image: url("images/img2.jpg");
            background-color: #cccccc;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;

        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: rgb(0, 0, 0);
            background-color: rgba(255, 255, 255, 0.8);
        }

        .map {
            text-align: center;
            position: absolute;
            top: 52%;
            left: 61%;
            transform: translate(-50%, -50%);
            color: rgb(0, 0, 0);
            background-color: rgba(255, 255, 255, 0.8);
        }

        .hero-text+button a {
            text-decoration: none
        }

        @media screen and (max-width: 768px) {
            body {
                overflow: scroll;
            }

            nav {
                padding: 0 1rem;
            }

            .heading {
                font-size: 1.2rem;
            }

            .nav-links {
                top: 8vh;
                left: 0;
                background-color: teal;
                text-align: center;
                transition: all 0.5s ease;
            }

            .nav-links li {
                margin-top: 1rem;
            }

            .nav-links a {
                padding: 1px 1;
                display: block;
            }

            .nav-links.show {
                display: flex;
            }

            .hero-text {
                top: 40%;
            }

            .map {
                top: 65%;
                left: 85%;

            }

            @media screen and (max-width: 700px) {
                iframe {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 380px;
                height: 160px;
            }}

        


            @media screen and (max-width: 1300px) {
                .map {
                display: flex;
                justify-content: center;
                align-items: center;
               
            }}

        }
    </style>
</head>

<body>
    <nav>

        <div class="heading">

            <h4>Projet GENIE</h4>

        </div>

        <ul class="nav-links">



            <li><a href="{{ route('login') }}" class="active" style="border-radius: 6px"><span class="glyphicon glyphicon-log-in mt-3"></span>
                    Connexion</a>
            </li>


        </ul>

    </nav>
    <div class="hero-section">
        <div class="hero-text">
            <h1>Vous cherchez un stage ?</h1>
            <h3> Nous acceptons des stagiaires sérieux et voulant intégrer nos projets durant leur période de stage.
            </h3>

            <a href="{{ route('register') }}" style="color:white" class="btn btn-success btn-lg mb-5 mt-3"> Postuler
                maintenant !</a>

        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13227.894570893497!2d-6.826694!3d34.0188875!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda76b857a1a2d1f%3A0x8b258479a6a25031!2sLaboratoire%20National%20des%20Ressources%20Num%C3%A9riques!5e0!3m2!1sen!2sma!4v1681207005433!5m2!1sen!2sma"
                width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="position-absolute bottom-10 end-0"></iframe>

        </div>
    </div>


</body>

</html>
