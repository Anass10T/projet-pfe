<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification des informations</title>
</head>

<body>
    @extends('layouts.body')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card  mt-5">
                        <div class="card-header text-white" style="background-color: #008080;">Modifier vos informations
                        </div>

                        <div class="card-body">
                            <!-- Formulaire de modification -->
                            <form method="post" action="{{ route('stagiaire.update', $stagiaire->id) }}" novalidate>
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
                                    <label for="encadrant">Encadrant académique</label>
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
                                    <input type="text" name="etablissement" id="etablissement" class="form-control"
                                        value="{{ $stagiaire->etablissement }}">
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
                                            {{ $stagiaire->niveau_etude }}
                                        </option>
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


                                <!-- Bouton de soumission du formulaire -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-2"></i>
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
    @endsection

</body>

</html>
