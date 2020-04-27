<?php $__env->startSection("content"); ?>
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
<form action="<?php echo e(url('admin/routes/savepost')); ?>" method="POST" role="form" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                                            <div class="col-md-6">
                                            <textarea class="form-control" rows="10" id="description" name="description"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="content_image" class="col-md-4 col-form-label text-md-right">Content Image</label>
                                            <div class="col-md-6">
                                                <input id="content_image" type="file" class="form-control" name="content_image">
                                               
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
                
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lamim/Desktop/Discount_app/DiscountApp/resources/views/makepost.blade.php ENDPATH**/ ?>