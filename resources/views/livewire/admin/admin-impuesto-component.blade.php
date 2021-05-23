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
                                All Taxes
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addimpuesto')}}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Tax Rate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($impuestos as $impuesto)
                                    <tr>
                                        <td>{{$impuesto->id}}</td>
                                        <td>{{$impuesto->nombre}}</td> 
                                        <td>{{$impuesto->tasa}}</td>
                                        <td>
                                            <a href="{{route('admin.editimpuesto', ['impuesto_slug' => $impuesto->slug])}}" > <i class="fa fa-edit fa-2x"></i> </a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete this Tax?') || event.stopImmediatePropagation()" wire:click.prevent="deleteImpuesto({{$impuesto->id}})" style="margin-left:10px;"> <i class="fa fa-times fa-2x text-danger"></i> </a>
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$impuestos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
