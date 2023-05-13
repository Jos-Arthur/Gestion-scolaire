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
                            <a href="#">Localite</a>
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
                                <div class="card-title">Créer une localité</div>
                                <div class="card-category">Ajouter une localité</div>
                            </div>
                            <form method="POST" action="{{route('localites.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Région<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <select id="region" class="form-control dynamic" name="region">
                                                <option>Choisir une région</option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-show-validation row">
                                        <label for="libelle" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Libelle <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle" required>
                                        </div>
                                    </div>                           
                                   <div class="separator-solid"></div>
                                </div>                                
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {{-- <input class="btn btn-success" type="submit" value="Valider"> --}}

                                                <button class="btn btn-success btn-round ml-auto" id="envoie">
					                                <span class="fa fa-save"></span> Enregistrer
					                            </button>
                                                
                                                <a type="button" class="btn btn-danger btn-round ml-auto" href="{{route('regions.index')}}">Retour</a> 
                                                
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
