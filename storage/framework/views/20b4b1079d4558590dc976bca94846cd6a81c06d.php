<?php $__env->startSection("content"); ?>
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
            <a href="<?php echo e(url('admin/routes/viewpost')); ?>" class=" btn btn-success btn-squared ">
                View Posts
            </a>
        </div>
            <br>
        <div class="col-md-5">
            <a href="<?php echo e(url('admin/routes/makepost')); ?>" class=" btn btn-success btn-squared ">
                Make Post
            </a>
        </div> 
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\discountApp\resources\views/admin.blade.php ENDPATH**/ ?>