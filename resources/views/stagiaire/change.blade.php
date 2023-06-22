<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier les informations du stagiaire</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<body>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="/admin-dashboard">Gestion des Stagiaires</a>
            <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                aria-label="Hide Sidebar"></a>
            <ul class="app-nav">
                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                        aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>

                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li><a class="dropdown-item" href="/admin/settings"><i class="fa fa-cog fa-lg"></i>
                                Paramètre</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out fa-lg"></i> Déconnexion</a></li>

                    </ul>
                </li>
            </ul>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar_user"><img class="app-sidebar_user-avatar mx-2" src="{{ asset('images/user.png') }}"
                    alt="User Image">
                <div>
                    <p class="app-sidebar__user-name mt-2 mb-2 mx-2 px-2" style="color:white">{{ old('nom', auth()->user()->nom) }}</p>
                    <p class="app-sidebar__user-designation"></p>
                </div>
            </div>
            <ul class="app-menu">
                <li><a class="app-menu__item" href="/admin-dashboard"><i
                            class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tableau de
                            bord</span></a></li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                            class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Stagiaires</span><i
                            class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ route('stagiaire.index') }}"><i
                                    class="icon fa fa-circle-o"></i> Les stagiaires en cours</a></li>
                                    <li><a class="treeview-item" href="{{ route('stagiaire.archives') }}"><i class="icon fa fa-circle-o"></i> Les stagiaires
                                        Archivés</a></li>
                                </ul>
                </li>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                            class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Stages</span><i
                            class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ route('stage.index') }}"><i
                                    class="icon fa fa-circle-o"></i>Afficher les stages</a></li>
                        <li><a class="treeview-item" href="{{ route('stage.create') }}"><i
                                    class="icon fa fa-circle-o"></i>Ajouter un stage</a></li>
                    </ul>

                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                            class="app-menu__icon fa fa-user-times"></i><span class="app-menu__label">Absences</span><i
                            class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ route('absence.index') }}"><i
                                    class="icon fa fa-circle-o"></i>Afficher les Absences</a></li>
                        <li><a class="treeview-item" href="{{ route('absence.create') }}"><i
                                    class="icon fa fa-circle-o"></i>Ajouter une absence</a></li>
                    </ul>
                </li>
                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                            class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Tâches</span><i
                            class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="{{ route('tache.index') }}"><i
                                    class="icon fa fa-circle-o"></i>Afficher les tâches</a></li>
                        <li><a class="treeview-item" href="{{ route('tache.create') }}"><i
                                    class="icon fa fa-circle-o"></i> Ajouter une tâche</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <main class="app-content">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-th-list"></i> Modifier les informations
                        du stagiaire</h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Stagiaire</li>
                    <li class="breadcrumb-item active"><a href="/stagiaires">Modifier les informations
                            du stagiaire </a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Modifier les informations</div>

                            <div class="card-body">
                                <!-- Formulaire de modification -->
                                <form method="post" action="{{ route('stagiaire.modify', $stagiaire->id) }}"
                                    novalidate>
                                    @csrf
                                    @method('PUT')

                                    <!-- Champ de saisie pour le nom -->
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" id="nom" class="form-control"
                                            value="{{ $stagiaire->nom }}">
                                    </div>

                                    <!-- Champ de saisie pour le prénom -->
                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" name="prenom" id="prenom" class="form-control"
                                            value="{{ $stagiaire->prenom }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="cin">CIN</label>
                                        <input type="text" name="cin" id="cin" class="form-control"
                                            value="{{ $stagiaire->cin }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $stagiaire->email }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="sexe">Sexe</label>
                                        <select id="sexe" class="form-control" name="sexe">
                                            <option value="">-- {{ __('Sélectionnez un sexe') }} --</option>
                                            <option value="F" {{ $stagiaire->sexe == 'F' ? 'selected' : '' }}>
                                                {{ __('Femme') }}
                                            </option>
                                            <option value="H" {{ $stagiaire->sexe == 'H' ? 'selected' : '' }}>
                                                {{ __('Homme') }}
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <textarea id="adresse" class="form-control" name="adresse">{{ $stagiaire->adresse }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="encadrant">Encadrant</label>
                                        <input type="text" name="encadrant" id="encadrant" class="form-control"
                                            value="{{ $stagiaire->encadrant }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" class="form-control"
                                            value="{{ $stagiaire->telephone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="etablissement">Etablissement</label>
                                        <input type="text" name="etablissement" id="etablissement"
                                            class="form-control" value="{{ $stagiaire->etablissement }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="filiere">Filière</label>
                                        <input type="text" name="filiere" id="filiere" class="form-control"
                                            value="{{ $stagiaire->filiere }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="niveau_etude">Niveau d'étude</label>
                                        <select id="niveau_etude" class="form-control" name="niveau_etude">
                                            <option value="{{ $stagiaire->niveau_etude }}" selected>
                                                {{ $stagiaire->niveau_etude }}</option>
                                            <option value="Bac">{{ __('Bac') }}</option>
                                            <option value="Bac+1">{{ __('Bac+1') }}</option>
                                            <option value="Bac+2">{{ __('Bac+2') }}</option>
                                            <option value="Bac+3">{{ __('Bac+3') }}</option>
                                            <option value="Bac+4">{{ __('Bac+4') }}</option>
                                            <option value="Bac+5">{{ __('Bac+5') }}</option>
                                            <option value="Bac+6 et plus">{{ __('Bac+6 et plus') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="diplome_prepare">Diplôme préparé</label>
                                        <input type="text" name="diplome_prepare" id="diplome_prepare"
                                            class="form-control" value="{{ $stagiaire->diplome_prepare }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="motivation">Motivation</label>
                                        <input type="text" name="motivation" id="motivation" class="form-control"
                                            value="{{ $stagiaire->motivation }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="statut">Statut</label>
                                        <select id="statut" class="form-control" name="statut">
                                            <option value="{{ $stagiaire->statut }}" selected>
                                                {{ $stagiaire->statut }}</option>
                                            <option value="Accepter">{{ __('Accepter') }}</option>
                                            <option value="Refuser">{{ __('Refuser') }}</option>
                                        </select>
                                    </div>
                                    <!-- Bouton de soumission du formulaire -->
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            Enregistrer les modifications
                                        </button>
                                    </div>
                                </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

    </body>

</html>
