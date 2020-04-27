@extends("layouts.app")
@section("content")
<div class="container">
    @if(\Session::has("error"))
    <div class =
    "alert alert-danger">
        {{\Session::get("error")}}
    </div>
    @endif
    <div class="row">
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

            @if(auth()->user()->isAdmin==1)
                        <div class="col-md-8 col-md-offset-2">
                            <div class=
                            "panel">
                                <div class="panel-heading">Dashboard</div>
                                <div class="panel-body"><a href="{{url('admin/routes')}}">Admin</a></div>
                                
                                </div>
                            </div>
                          
                        </div>
            @endif
@if(auth()->user()->isAdmin==0)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
              <div class="panel-heading btn-primary">
                This is for NORMAL USERS
              </div>
            </div>
        </div>
            <div class="col-md-4 col-sm-4">
                <ul>
                    <li>
                        <p>catagory</p>
                    </li>
                    <li><p>favorites</p></li>
                    <li>
                        <p>
                            my location
                        </p>
                    </li>
                </ul>
               
            </div>
            <div class="col-md-8 col-sm-8">
                @foreach($post as $key =>$value)
                    <?php
                    $arraystr=$value->created_by;
                    $json = json_decode($arraystr,true);
                    $name=$json['name'];
                
                    ?>
                
                    <img style="margin:2%" src="{{ asset('public/img/post/'.$value->img) }}">
                    <label for="">{{$value->description}}</label> <br><label for="" class="form-label"> Posted on:{{$value->start_date}}</label>
                    <label for="">{{ $name}}</label>
                    <label for="">{{$value->category}}</label>
                    <br>
                    <label><span class='glyphicon glyphicon-hand-up'></span>{{ $value->total_likes }} likes this</label>
                    
                    <a href="javascript:void(0)" class="btn btn-info like" data-uid="{{ auth()->user()->id }}" data-id="{{$value->id}}">
                    
                    <label>
                        <span class='glyphicon glyphicon-heart-empty'></span>
                         Like
                    </label>
                    </a>


                    <a href="javascript:void(0)" class="btn btn-danger unlike ">
                        <label><span class='glyphicon glyphicon-heart' data-id="{{$value->id}}" data-uid="{{ auth()->user()->id }}"></span> Liked</label>
                    </a>
               
                    
                    @endforeach
                {{isset($post_pagination) ? $post_pagination:""}}

               
            </div>
        </div>
          @endif 
    </div>
    @endsection
    @section('JScript')
        <script>
            $(function () {
            //var site_url = $('.site_url').val();
            $('.like').on('click',function(){
                var pid= $(this).data('id');
                var uid=$(this).data('uid');
                if(pid !== '') {
                  
                                    $.ajax({
                                        type: 'GET',
                                        url: 'like/'+pid+'/'+uid,
                                    }).done(function(response){
                                        alert(response);
                                        location.reload(true);
                                    }).fail(function(response){
                                       alert(response);
                                    })
                                    console.log('url');
                                }
                            
                else {
                    alert('post not found.');
                }

                });
            });
</script>
@endsection