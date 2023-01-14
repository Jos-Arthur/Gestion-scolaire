@extends ('backend.layouts.master')

@section('styles')

@stop

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Modification</h4>
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
                            <a href="#">modification</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Mise à jour</div>
                                <div class="card-category">Activer ou Desactiver un utilisateur</div>
                            </div>
                            <form method="POST" action="{{route('users.update',$user->id)}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nom <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" readonly value="{{$user->nom}}">
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Prenom <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" placeholder="Prenom"  id="prenom" name="prenom" readonly value="{{$user->prenom}}">
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="email" class="form-control" id="email" placeholder="Email" readonly value="{{$user->email}}">
                                        </div>
                                    </div>

                                    

                                    <div class="separator-solid"></div>

                                    <div class="form-group form-show-validation row">
                                        <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Statut <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <div class="select2-input">
                                                <select id="statut" name="statut" class="form-control" required>
                                                    @if($user->status == 1)
                                                        <option value="1">Active</option>
                                                        <option value="0">Desactive</option>
                                                    @else
                                                        <option value="0">Desactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                            </div>
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
