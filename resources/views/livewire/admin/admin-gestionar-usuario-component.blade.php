<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important; 
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                        <div class="row">
                            <div class="col-md-6">
                                All Users
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        @if(Session::has('user_message'))
                            <div class="alert alert-success" role="alert">{{Session::get('user_message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                                <span class="caret"></span> </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="" wire:click.prevent="updateUserStatus({{$user->id}}, 'activate')">Activate</a></li>
                                                    <li><a href="" wire:click.prevent="updateUserStatus({{$user->id}}, 'inactivate')">Inactivate</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
