

<!DOCTYPE html>
<html lang="en">

    <?php echo $__env->make('includes.admin.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <body>

    <div class="dashboard-main-wrapper">
        <div class="wrapper">
            <!-- Left Sidebar Menu Start  -->
            <?php echo $__env->make('includes.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Left Sidebar Menu End  -->
            <?php echo $__env->make('includes.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Page Content  -->
            <div class="dashboard-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
               
            </div>
        </div>
    </div>
    <?php echo $__env->make('includes.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->make('includes.admin.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>

</html><?php /**PATH D:\xampp\htdocs\hrm_app\resources\views/layouts/adminlayout.blade.php ENDPATH**/ ?>