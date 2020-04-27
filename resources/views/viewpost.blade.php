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

<?php $i=1;?>
     @foreach($post as $key =>$value)
    <div class="col-md-12">   
        <img style="margin:2%" src="{{ asset('public/img/post/'.$value->img) }}">
    </div>
     

        <div style="margin:2%"   class="col-md-12">  
                
            <label for="">{{$value->description}}</label> <br><label for="" class="form-label"> Posted on:{{$value->start_date}}</label>
            <label for="">promo-code: {{$value->details}}</label> 
            <label for="">total likes: {{$value->total_likes}} people |</label> 
            <label for="">total comments: {{$value->total_comments}} people|</label> 

            <label for=""> End Date {{$value->end_date}}</label> 
            <br>  <a href="javascript:void(0)" class="btn btn-primary btn-xs btn-squared edit"
                                                    data-really="approved" data-id="{{$value->id}}">
                                                        Edit Post
                                                    </a>
            <a href="javascript:void(0)" class="btn btn-danger btn-xs btn-squared delete"
                                                    data-really="approved" data-id="{{$value->id}}" data-img="{{$value->img}}">
                                                        Delete Post
                                                    </a>
            <a href="javascript:void(0)" class="btn btn-info btn-xs btn-squared detail"
                                                    data-really="approved" data-id="{{$value->id}}" data-img="{{$value->img}}">
                                                        add details
                                                    </a>
            @if($value->isPublished == "0")
                <a href="javascript:void(0)" class="btn btn-success btn-xs btn-squared publish"
                                                    data-really="approved" data-id="{{$value->id}}">
                                                        publish?
                                                    </a>
            @else
            <a href="javascript:void(0)" class="btn btn-secondary btn-xs btn-squared unpublish"
                                                    data-really="approved" data-id="{{$value->id}}">
                                                        UNpublish?
                                                    </a>
            @endif
                                                    <br>
                                                <p>  </p>
                                            
                                                
                                                        
        </div> 
     <br>
    @endforeach
 {{isset($post_pagination) ? $post_pagination:""}}




@endsection
@section('JScript')
    <script>
        $(function () {
            $('.publish').on('click',function(){
                var pid= $(this).data('id');
                if(pid !== '') {
                    bootbox.dialog({
                        message: "Are you sure you want to publish this Post",
                        title: "<span class='glyphicon glyphicon-file'></span> Publishing",
                        buttons: {
                            success: {
                                label: "No",
                                className: "btn-danger btn-squared",
                                callback: function() {
                                    $('.bootbox').modal('hide');
                                }
                            },
                            danger: {
                                label: "Yes!",
                                className: "btn-success btn-squared",
                                callback: function() {
                                    $.ajax({
                                        type: 'GET',
                                        url: 'publishpost/'+pid,
                                    }).done(function(response){
                                        bootbox.alert(response);
                                        location.reload(true);
                                    }).fail(function(response){
                                        bootbox.alert(response);
                                    })
                                    console.log('url');
                                }
                            }
                        }
                    });
                } else {
                    alert('post not found.');
                }

                });


                $('.unpublish').on('click',function(){
                var pid= $(this).data('id');
                if(pid !== '') {
                    bootbox.dialog({
                        message: "Are you sure you want to publish this Post",
                        title: "<span class='glyphicon glyphicon-file'></span> Publishing Post",
                        buttons: {
                            success: {
                                label: "No",
                                className: "btn-danger btn-squared",
                                callback: function() {
                                    $('.bootbox').modal('hide');
                                }
                            },
                            danger: {
                                label: "Yes!",
                                className: "btn-success btn-squared",
                                callback: function() {
                                    $.ajax({
                                        type: 'GET',
                                        url: 'unpublishpost/'+pid,
                                    }).done(function(response){
                                        bootbox.alert(response);
                                        location.reload(true);
                                    }).fail(function(response){
                                        bootbox.alert(response);
                                    })
                                    console.log('url');
                                }
                            }
                        }
                    });
                } else {
                    alert('post not found.');
                }

                });

                $('.detail').on('click',function(){
                    var pid = $(this).data('id');
                    if(pid!==null){
                        bootbox.prompt({
                            title:"Enter Promocode or details",
                            inputType:"text",
                            callback:function(result){
                                if(result!=null){
                                        $.ajax({
                                        type: 'GET',
                                        url: 'add_details/'+pid+'/'+result,
                                    }).done(function(response){
                                        bootbox.alert(response);
                                        location.reload(true);

                                    }).fail(function(response){
                                        bootbox.alert(response);
                                    })
                                    console.log('url');
                                    }
                                    else   {   
                                    console.log(result);
                                    alert('empty input');
                                    }
                            }
                         });
                     } else {
                    alert('post not found.');
                }
            });


                $('.delete').on('click',function(){
                var pid= $(this).data('id');
                var img=$(this).data('img');
                if(pid !== '') {
                    bootbox.dialog({
                        message: "Are you sure you want to Delete this Post",
                        title: "<span class='glyphicon glyphicon-file'></span> Delete Post",
                        buttons: {
                            success: {
                                label: "No",
                                className: "btn-danger btn-squared",
                                callback: function() {
                                    $('.bootbox').modal('hide');
                                }
                            },
                            danger: {
                                label: "Yes!",
                                className: "btn-success btn-squared",
                                callback: function() {
                                    $.ajax({
                                        type: 'GET',
                                        url: 'deletepost/'+pid+'/'+img,
                                    }).done(function(response){
                                        bootbox.alert(response);
                                        location.reload(true);

                                    }).fail(function(response){
                                        bootbox.alert(response);
                                    })
                                    console.log('url');

                                }
                            }
                        }
                    });
                } else {
                    alert('post not found.');
                }

                });
                $('.edit').on('click',function(){
                var pid= $(this).data('id');
              
                if(pid !== '') {
                    bootbox.prompt({
                                title: "Edit Description!",
                                inputType: 'textarea',
                                callback: function (result) {
                                    if(result!=null){
                                        $.ajax({
                                        type: 'GET',
                                        url: 'editpost/'+pid+'/'+result,
                                    }).done(function(response){
                                        bootbox.alert(response);
                                        location.reload(true);

                                    }).fail(function(response){
                                        bootbox.alert(response);
                                    })
                                    console.log('url');

                                    }
                                    else{  console.log(result);
                                                        alert(result);
                                                        }      
                                        }
                                    });
                } else {
                    alert('post not found.');
                }
                });
            });
    </script>
@endsection