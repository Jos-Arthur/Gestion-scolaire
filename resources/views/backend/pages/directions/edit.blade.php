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
                            <a href="#">Directions</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Modification</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Mise à jour</div>
                                <div class="card-category">Modifier d'une direction</div>
                            </div>
                            <form method="POST" action="{{route('profils.update',$directions->id)}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="libelle" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Libelle <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle" value="{{$directions->libelle}}">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group form-show-validation row">
                                        <label for="commentaire" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Commentaire <span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                             <textarea type="text" class="form-control" id="commentaire" placeholder="Commentaire" rows="5"  name="commentaire">{{$directions->commentaire}}</textarea>

                                        </div>
                                    </div>

                                    

                                    <div class="separator-solid"></div>

                                  
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-success btn-round ml-auto" id="envoie">
					                                <span class="fa fa-save"></span> Modifier
					                            </button>
                                                
                                                <a type="button" class="btn btn-danger btn-round ml-auto" href="{{route('profils.index')}}">Retour</a> 
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
