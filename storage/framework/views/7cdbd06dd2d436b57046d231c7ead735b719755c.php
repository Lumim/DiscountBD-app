<?php $__env->startSection("content"); ?>
<div class=”container”>
    <?php if(\Session::has("error")): ?>
    <div class =”alert alert-danger”>
        <?php echo e(\Session::get("error")); ?>

    </div>
    <?php endif; ?>
    <div class=”row”>
        <div class="col-md-8 col-md-offset-2">
            <div class=”panel panel-default”>
                <div class=”panel-heading”>Dashboard</div>
                <?php if(auth()->user()->isAdmin == 1){?>
                    <div class=”panel-body”><a href="<?php echo e(url('admin/routes')); ?>">Admin</a></div>
                    <?php } 
                    else echo '<div class=”panel-heading btn-primary”>This is for NORMAL USERS</div> '?>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lamim/Desktop/Discount_app/DiscountApp/resources/views/home.blade.php ENDPATH**/ ?>