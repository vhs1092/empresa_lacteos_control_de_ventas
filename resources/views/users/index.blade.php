@extends('adminlte::page')



@section('content')

    @if(Auth::user()->isAdmin())
        <a href="{{route('user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-users fa-fw"></i> <span class="bold">Add New User</span></a>
    @endif
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="hpanel">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatableData" class="table table-striped">
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
                                      <a href="{{route('user.edit', $user->id)}}"><button type="button" class="btn btn-info btn-flat">Editar</button></a>
                                      <a href="#"><button type="button" class="btn btn-danger btn-flat">Eliminar</button></a>
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
<script type="text/javascript" src="{{ url(mix('js/main.js').'?v='.date('Ymd'))}}"></script>
@stop