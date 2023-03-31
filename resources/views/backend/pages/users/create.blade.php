@extends ('backend.layouts.master')

@section('styles')

@stop


@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Création</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Utilisateur</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">création</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Créer un utilisateur</div>
                                <div class="card-category">Ajouter un nouvel utilisateur</div>
                            </div>
                            <form method="POST" action="{{route('users.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="nom" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nom <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="prenom" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Prenom <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" placeholder="Prenom"  id="prenom" name="prenom" required>
                                        </div>
                                    </div>
                                      <div class="form-group form-show-validation row">
                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Username <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" placeholder="username"  id="username" name="username" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>

                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Profil <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <select id="profil" class="form-control dynamic" name="profil">
                                                <option>Profils</option>
                                                @foreach($profils as $prof)
                                                    <option value="{{ $prof->id }}">{{ $prof->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                  

                                    <div class="separator-solid"></div>

                                    <div class="form-group form-show-validation row">
                                        <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mot de passe <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                                        </div>
                                    </div>

                                    <div class="form-group form-show-validation row">
                                        <label for="confirm-password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Confirmer <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirmer" required>
                                        </div>
                                    </div>


                                </div>                                
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-success" type="submit" value="Valider">
                                                <a type="button" class="btn btn-danger" href="{{route('users.get')}}">Retour</a>
                                            </div>
                                        </div>
                                    </div>                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('scripts')

@stop
