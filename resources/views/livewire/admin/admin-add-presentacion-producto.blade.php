<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Product Presentation
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.presentacionproducto')}}" class="btn btn-success pull-right">All Product Presentations</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message')) 
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storePresentacionProducto">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name Product Presentation</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Name Product Presentation" class="form-control input-md" wire:model="presentacion" wire:keyup="generateslug">
                                    @error('presentacion') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Presentation Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Presentation Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
