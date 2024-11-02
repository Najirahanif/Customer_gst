 <!-- scripts -->
    

    <script src="<?php echo e(asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/slimscroll/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/multi-select/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/libs/js/main-js.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/datatables/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/datatables/js/data-table.js')); ?>"></script>

    <!-- validation -->

    <!-- charts script -->
    <?php if(request()->route()->getName() === 'dashboard'): ?>
    <!-- chart chartist js -->
    <script src="<?php echo e(asset('admin/assets/vendor/charts/chartist-bundle/chartist.min.js')); ?>"></script>
    <!-- sparkline js -->
    <script src="<?php echo e(asset('admin/assets/vendor/charts/sparkline/jquery.sparkline.js')); ?>"></script>
    <!-- morris js -->
    <script src="<?php echo e(asset('admin/assets/vendor/charts/morris-bundle/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/charts/morris-bundle/morris.js')); ?>"></script>
    <!-- chart c3 js -->
    <script src="<?php echo e(asset('admin/assets/vendor/charts/c3charts/c3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/charts/c3charts/C3chartjs.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/libs/js/dashboard-ecommerce.js')); ?>"></script>
    <?php endif; ?><?php /**PATH D:\xampp\htdocs\hrm_app\resources\views/includes/admin/scripts.blade.php ENDPATH**/ ?>