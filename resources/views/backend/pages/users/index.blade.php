@extends ('backend.layouts.master')

@section('styles')

@stop

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Nos utilisateurs</h4>
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
                            <a href="#">Liste</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Utilisateurs</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Liste des utilisateurs</h4>                           
                                        <a class="btn btn-primary btn-round ml-auto" href="{{route('users.create')}}"><i class="fa fa-plus"></i> Ajouter</a>                                  
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Etat</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{URL::asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>
    <script>
         $(document).ready(function() {
            $('#basic-datatables').DataTable({
                processing:true,
                serverSide:true,
                ajax: {
                    url:"{{ route('users.get')}}",
                },
                columns:[                  
                    {data: 'nom', name:'nom'},
                    {data: 'prenom', name:'prenom'},
                    {data: 'username', name:'username'},
                    {data: 'email', name: 'email'}, 
                    {data: 'deleted', name: 'deleted'},                   
                    {data: 'action', name:'action', orderable:false, searchable: false}
                ]
            });
        });
    </script>
@stop
