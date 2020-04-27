@extends("layouts.app")
@section("content")
<div class="container">
<div class=”row”>
    <div class="col-md-8 col-md-offset-2">
        <div class=”panel panel-default”>
            <div class=”panel-heading”><h3>welcome to admin</h3></div>
        </div>
    </div>
</div>

<div class="row">
   
       
        <div class="col-md-5">
            <a href="{{ url('admin/routes/viewpost') }}" class=" btn btn-success btn-squared ">
                View Posts
            </a>
        </div>
            <br>
        <div class="col-md-5">
            <a href="{{ url('admin/routes/makepost') }}" class=" btn btn-success btn-squared ">
                Make Post
            </a>
        </div> 
</div>
</div>
@endsection
