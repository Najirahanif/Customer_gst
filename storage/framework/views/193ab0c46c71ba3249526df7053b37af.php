<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>"><i class="fas fa-shield-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php echo e(request()->routeIs([
                    'designation.*'])  ? 'active' : ''); ?>" href="<?php echo e(route('designation.index')); ?>"><i class="fas fa-fw fa-chart-pie"></i>Designation <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?php echo e(request()->routeIs([
                    'client.*'])  ? 'active' : ''); ?>" href="<?php echo e(route('client.index')); ?>"><i class="fas fa-fw fa-chart-pie"></i>Client <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-divider" style="visibility: hidden">
                        End
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\hrm_app\resources\views/includes/admin/sidebar.blade.php ENDPATH**/ ?>