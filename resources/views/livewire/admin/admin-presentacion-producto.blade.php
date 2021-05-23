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
                                All Product Presentation
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addpresentacionproducto')}}" class="btn btn-success pull-right">Add New</a>
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
                                    <th>Name Product Presentation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($presentacion_producto as $cafe)
                                    <tr>
                                        <td>{{$cafe->id}}</td>
                                        <td>{{$cafe->presentacion}}</td>
                                        <td>
                                            <a href="{{route('admin.editpresentacionproducto', ['presentacionproducto_slug' => $cafe->slug])}}" > <i class="fa fa-edit fa-2x"></i> </a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete this product presentation?') || event.stopImmediatePropagation()" wire:click.prevent="deletePresentacionProducto({{$cafe->id}})" style="margin-left:10px;"> <i class="fa fa-times fa-2x text-danger"></i> </a>
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$presentacion_producto->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
