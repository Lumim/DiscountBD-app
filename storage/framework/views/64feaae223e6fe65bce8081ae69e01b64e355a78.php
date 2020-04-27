<?php $__env->startSection("content"); ?>
<div class=”row”>
    <div class="col-md-8 col-md-offset-2">
        <div class=”panel panel-default”>
            <div class=”panel-heading btn-primary”>welcome to admin</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <form role="form" action="<?php echo e(url('admin/question/answer/store')); ?>" method="post" class="form-horizontal" id="myform">
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
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lamim/Desktop/Discount_app/DiscountApp/resources/views/admin.blade.php ENDPATH**/ ?>