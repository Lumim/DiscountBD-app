<?php $__env->startSection("content"); ?>
<div class="container">
    <?php if(\Session::has("error")): ?>
    <div class =
    "alert alert-danger">
        <?php echo e(\Session::get("error")); ?>

    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
  
            <?php if($errors->count() > 0 ): ?>

                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h6>The following errors have occurred:</h6>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(Session::has('message')): ?>
                <div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>
            <?php if(Session::has('errormessage')): ?>
                <div class="alert alert-danger" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo e(Session::get('errormessage')); ?>


                </div>
            <?php endif; ?>
</div>

            <?php if(auth()->user()->isAdmin==1): ?>
                        <div class="col-md-8 col-md-offset-2">
                            <div class=
                            "panel">
                                <div class="panel-heading">Dashboard</div>
                                <div class="panel-body"><a href="<?php echo e(url('admin/routes')); ?>">Admin</a></div>
                                
                                </div>
                            </div>
                          
                        </div>
            <?php endif; ?>
<?php if(auth()->user()->isAdmin==0): ?>
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
                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $arraystr=$value->created_by;
                    $json = json_decode($arraystr,true);
                    $name=$json['name'];
                
                    ?>
                
                    <img style="margin:2%" src="<?php echo e(asset('public/img/post/'.$value->img)); ?>">
                    <label for=""><?php echo e($value->description); ?></label> <br><label for="" class="form-label"> Posted on:<?php echo e($value->start_date); ?></label>
                    <label for=""><?php echo e($name); ?></label>
                    <label for=""><?php echo e($value->category); ?></label>
                    <br>
                    <label><span class='glyphicon glyphicon-hand-up'></span><?php echo e($value->total_likes); ?> likes this</label>
                    
                    <a href="javascript:void(0)" class="btn btn-info like" data-uid="<?php echo e(auth()->user()->id); ?>" data-id="<?php echo e($value->id); ?>">
                    
                    <label>
                        <span class='glyphicon glyphicon-heart-empty'></span>
                         Like
                    </label>
                    </a>


                    <a href="javascript:void(0)" class="btn btn-danger unlike ">
                        <label><span class='glyphicon glyphicon-heart' data-id="<?php echo e($value->id); ?>" data-uid="<?php echo e(auth()->user()->id); ?>"></span> Liked</label>
                    </a>
               
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(isset($post_pagination) ? $post_pagination:""); ?>


               
            </div>
        </div>
          <?php endif; ?> 
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('JScript'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\discountApp\resources\views/home.blade.php ENDPATH**/ ?>