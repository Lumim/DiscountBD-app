@extends("layouts.app")
@section("content")
<div class="col-md-12">
            @if ($errors->count() > 0 )
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h6>The following errors have occurred:</h6>
                    <ul>
                        @foreach( $errors->all() as $message )
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif
            @if (Session::has('errormessage'))
                <div class="alert alert-danger" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('errormessage') }}
                </div>
            @endif
</div>


<div class="col-12 ">
                    <form action="{{url('admin/routes/savepost')}}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                                            <div class="col-md-6">
                                            <textarea class="form-control" rows="10" id="description" name="description"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="content_image" class="col-md-4 col-form-label text-md-right">Content Image</label>
                                            <div class="col-md-6">
                                                <input id="content_image" type="file" class="form-control" accept = 'image/jpeg , image/jpg, image/gif, image/png' name="content_image">
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="category" class="col-md-4 col-form-label text-md-right">Select Category</label>
                                            <select class="col-md-4 col-form-label text-md-right" name="category" id="sel1">
                                                <option>cat 1</option>
                                                <option>cat 2</option>
                                                <option>cat 3</option>
                                                <option>cat 4</option>
                                            </select>
                                        </div>
                                        

                                        <div class="form-group row">
                                        <br>
                                            <label for="date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                                            <div class="col-md-6">
                                            <input type="date" name="start_date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date" class="col-md-4 col-form-label text-md-right">Date Till</label>
                                            <div class="col-md-6">
                                            <input type="date" name="end_date">
                                            </div>
                                        </div>
                                    

                                        
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Save Post</button>
                                            </div>
                                            <br>
                                            <div class="col-md-12 offset-md-4">
                                                <br>
                                                <a href="viewpost" class="btn btn-info">View post?</a>
                                            </div>
                                        </div>
                                



                                    </form>
</div>
@endsection
