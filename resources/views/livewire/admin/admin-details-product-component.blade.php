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
                                All Products
                            </div>
                            <div class="col-md-6">
                            
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert"> {{Session::get('message')}} </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Coffee Customization</th>
                                    <th>Product Presentation</th>
                                    <th>Barcode</th>
                                    <th>Country</th>
                                    <th>Land</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->personalizacionCafe->sabor}}</td>
                                        <td>{{$product->presentacionProducto->presentacion}}</td>
                                        <td>{!! DNS1D::getBarcodeHTML($product->SKU, 'C39') !!}</td>
                                        <td>{{$product->pais}}</td>
                                        <td>{{$product->finca}}</td>
                                        <td>{{$product->tamanio}}</td>
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
