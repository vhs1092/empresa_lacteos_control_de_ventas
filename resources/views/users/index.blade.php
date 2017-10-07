@extends('adminlte::page')



@section('content')

    @if(Auth::user()->isSuperAdmin() || Auth::user()->isAgencyAdmin())
        <a href="{{route('user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Add New User</span></a>
    @endif
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="hpanel">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dtUserList" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th></th>
                                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                     @foreach ($users as $user)   
                                    <tr>

                                        <td>
                                        {{$user->name}}
                                        </td>    
                                        <td>
                                        {{$user->email}}
                                        </td>
                                        <td>
                                        {{$user->getUserRole($user->id)}}
                                        </td>
                                    <td>
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-success btn-flat">Acciones</button>
                                      <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">acciones</span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{route('user.edit', $user->id)}}"><b>Editar</b></a></li>
                                        <li><a href="#"><b>Eliminar</b></a></li>
                                      </ul>
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
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
      var dTable = $('#dtUserList');
        dTable.DataTable();
    });
</script>
@stop