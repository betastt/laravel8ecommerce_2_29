<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add New Slide</a>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <th>{{$slider->id}}</th>
                                    <th><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120"></th>
                                    <th>{{$slider->title}}</th>
                                    <th>{{$slider->subtitle}}</th>
                                    <th>{{$slider->price}}</th>
                                    <th>{{$slider->link}}</th>
                                    <th>{{$slider->status == 1 ? 'Active':'Inactive'}}</th>
                                    <th>{{$slider->created_at}}</th>
                                    <th>
                                        <a href="{{route('admin.edithomeslider', ['slide_id' => $slider->id])}}"> <i class="fa fa-edit fa-2x text-info"></i> </a>
                                        <a href="#" wire:click.prevent="deleteSlide({{$slider->id}})"> <i class="fa fa-times fa-2x text-danger"></i> </a>
                                    </th>
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
