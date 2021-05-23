<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Coffee Customization
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.personalizacioncafe')}}" class="btn btn-success pull-right">All Coffee Customization</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message')) 
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storePersonalizacionCafe">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name Coffee Customization</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Name Coffee Customization" class="form-control input-md" wire:model="sabor" wire:keyup="generateslug">
                                    @error('sabor') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Coffee Customization Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Coffee Customization Slug" class="form-control input-md" wire:model="slug">
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
