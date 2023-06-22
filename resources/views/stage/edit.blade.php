<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une affectation</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

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
                    <li><a class="dropdown-item" href="/admin/settings"><i class="fa fa-cog fa-lg"></i> Paramètre</a>
                    </li>
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
            <li><a class="app-menu__item" href="/admin-dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span
                        class="app-menu__label">Tableau de bord</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Stagiaires</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{ route('stagiaire.index') }}"><i
                                class="icon fa fa-circle-o"></i> les stagiaires en cours</a></li>
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
                                class="icon fa fa-circle-o"></i>Affecter un stage</a></li>
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
                <h1><i class="fa fa-dashboard"></i> Modifier l'affectation </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="/admin-dashboard">Modifier l'affectation
                    </a></li>
            </ul>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Modifier l'affectation</h3>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('stage.index') }}"> Retour</a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="tile-body">
                        <form action="{{ route('stage.update', $stage->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="control-label">Nom stagiaire</label>
                                <select name="stagiaire_id">

                                    @foreach ($stagiaires as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $stage->stagiaire_id == $item->id ? 'selected' : '' }}>

                                            {{ $item->nom }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date de début:</label>
                                <input type="date" name="date_debut" value='{{ $stage->date_debut }}'
                                    class="form-control" placeholder="date_debut">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Date de fin:</label>
                                <input type="date" name="date_fin" value='{{ $stage->date_fin }}'
                                    class="form-control" placeholder="date_fin">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Note stage:</label>
                                <input type="text" name="note_stage" value='{{ $stage->note_stage }}'
                                    class="form-control" placeholder="note_stage">
                            </div>



                            <div class="form-group">
                                <label class="control-label">Appreciation:</label>
                                <textarea class="form-control" style="height:150px" name="appreciation" placeholder="appreciation">{{ $stage->appreciation }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Rapport de stage:</label>
                                <input type="file" name="rapport_de_stage" class="form-control"
                                    placeholder="rapport_de_stage">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Rapport de stage déposé:</label><br>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="rapport_de_stage_deposer" value="1"
                                            {{ $stage->rapport_de_stage_deposer ? 'checked' : '' }}>
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="rapport_de_stage_deposer" value="0"
                                            {{ !$stage->rapport_de_stage_deposer ? 'checked' : '' }}>
                                        Non
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label">Attestation obtenu:</label><br>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="attestation_obtenu" value="1"
                                            {{ $stage->attestation_obtenu ? 'checked' : '' }}>
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="attestation_obtenu" value="0"
                                            {{ !$stage->attestation_obtenu ? 'checked' : '' }}>
                                        Non
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Projet déposé:</label><br>
                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="projet_deposer" value="1"
                                            {{ $stage->projet_deposer ? 'checked' : '' }}>
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="projet_deposer" value="0"
                                            {{ !$stage->projet_deposer ? 'checked' : '' }}>
                                        Non
                                    </label>
                                </div>
                            </div>





                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</html>
