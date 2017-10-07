


<div class="panel panel-default">
    <div class="panel-heading">&nbsp;&nbsp;
    </div>
    <!-- START table-responsive-->
    <div class="table-responsive">
        <table id="datatable2" class="table table-bordered table-hover">
            <thead>
            <tr>

                <th>Picture</th>
                <th>Name</th>
                <th>Email</th>
                <th>Rol</th>

                <th>Active</th>
                <th>Actions</th>
                <th>Last Login</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $u)
            <?php

            $uId = $u->id;
            ?>
                <tr>

                    <td>
                        <div class="media">
                            <img src="assets/img/user/default.png" alt="Image" class="img-responsive img-circle" />
                        </div>
                    </td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{$u->roles[0]->name}}

                    <td class="text-center">
                        <label class="switch">
                            <input
                                    type="checkbox"
                                    id="{{$uId}}"
                                    {{($u->active==1)?'checked':''}}
                                    onclick="actionEventObj(this)"
                                    data-url="{{ route('user.action.enable',[$u->id,'1']) }}"

                            />
                            <span></span>
                        </label>
                    </td>
                    <td class="text-center">
                        <div class="btn-group"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-cog fa-2x"></i>  </a>
                            <ul class="dropdown-menu pull-right text-left">
                                <li>
                                    <a href=""
                                       data-toggle="modal"
                                       onclick="loadModal(this)"
                                       data-url="{{ route('user.edit',$u->id) }}"
                                       data-method="GET">Edit</a>
                                </li>
                                <li><a href="{{ route('user.resetPassword',$u->id) }}">Reset Password</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td>{{$u->last_login}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br/>
        <br/>
        <br/>
        <br/>
    </div>


</div>

