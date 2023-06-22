<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liste des stages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
        .edit-link {
            text-decoration: none;
        }

        .edit-icon {
            width: 30px;
            height: 30px;
            margin-right: 9px;

        }

        .destroy-link {
            text-decoration: none;
        }

        .destroy-icon {
            width: 30px;
            height: 30px;
            margin-right: 9px;
        }

        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
    </style>
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
        <div class="app-sidebar_user"><img class="app-sidebar_user-avatar" src="{{ asset('images/user.png') }}"
                alt="User Image">
            <div>
                <p class="app-sidebar__user-name mt-2 mb-2 mx-2 px-2" style="color:white">{{ old('nom', auth()->user()->nom) }}</p>
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
                <h1><i class="fa fa-dashboard"></i> Liste des stages</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="/admin-dashboard"> Liste des stages</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn btn-primary mb-3" href="{{ route('stage.create') }}"> Ajouter un nouveau stage </a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>Date de début</th>
                                    <th>Date de fin</th>
                                    <th>Nom de stagiaire </th>
                                    <th>Prenom de stagiaire</th>
                                    <th>Note de stage</th>
                                    <th>Appreciation</th>
                                    <th>Rapport de stage déposé</th>
                                    <th>Attestation obtenu</th>
                                    <th>Projet déposé</th>
                                    <th>Rapport de stage</th>
                                    <th>Attestation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stages as $stage)
                                    <tr>
                                        <td>{{ $stage->date_debut }}</td>
                                        <td>{{ $stage->date_fin }}</td>
                                        <td>{{ $stage->stagiaire->nom }}</td>
                                        <td>{{ $stage->stagiaire->prenom }}</td>

                                        <td>{{ $stage->note_stage }}</td>
                                        <td>{{ $stage->appreciation }}</td>


                                        <td>{{ $stage->rapport_de_stage_deposer ? 'oui' : 'non' }}</td>
                                        <td>{{ $stage->attestation_obtenu ? 'oui' : 'non' }}</td>
                                        <td>{{ $stage->projet_deposer ? 'oui' : 'non' }}</td>
                                        <td><button class="btn btn-info"> <a target="_blank"
                                                    href="{{ asset('uploads/rapport_de_stage/' . $stage->rapport_de_stage) }}"
                                                    style="color: rgb(255, 255, 255); text-decoration:none;"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                        <path fill-rule="evenodd"
                                                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                    </svg>&nbsp; Rapport de stage</a></button></td>
                                        <td> <a href="{{ Route('stage.pdf', $stage->id) }}" class="btn btn-success">
                                                <i class="fas fa-file-pdf mr-2"></i>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark-pdf-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                    <path fill-rule="evenodd"
                                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                </svg>&nbsp; L'attestation de stage
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('stage.edit', $stage->id) }}"
                                                    class="d-inline edit-link">
                                                    <img src="/images/edit.png" alt="Modifier" class="edit-icon">
                                                </a>


                                                <a href="{{ route('stage.destroy', $stage->id) }}"
                                                    onclick="return confirm('Voulez-vous vraiment supprimer l\'affication?')"
                                                    class="d-inline destroy-link">
                                                    <img src="/images/delete.png" alt="delete"
                                                        class="destroy-icon">
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                },
                scrollX: true,
            scrollX: '400px',

            });
        });
    </script>
</body>



<html>
