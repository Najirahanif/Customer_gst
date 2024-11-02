
<?php $__env->startSection('content'); ?>
<div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Employee List</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employee</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="container-fluid hover-none">
            <?php if(Session::has('messageType') && Session::has('message')): ?>
                <?php if(Session::get('messageType') === 'success'): ?>
                    <div class="alert alert-success" id="success-alert">
                        <?php echo e(Session::get('message')); ?>

                    </div>
                <?php elseif(Session::get('messageType') === 'error'): ?>
                    <div class="alert alert-danger" id="error-alert">
                        <?php echo e(Session::get('message')); ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="d-flex justify-content-end align-items-center">
                                    <?php if(count($employeelist) > 0): ?>
                                        <a data-bs-toggle="tooltip" href="<?php echo e(route('employee.pdf')); ?>" class="mr-2" data-bs-placement="top" title="PDF">
                                            <img  src="<?php echo e(asset('admin/assets/images/icons/pdf.svg')); ?>" alt="PDF">
                                        </a>
                                        <a data-bs-toggle="tooltip" href="<?php echo e(route('employee.csv')); ?>" class="mr-2" data-bs-placement="top" title="Excel">
                                            <img src="<?php echo e(asset('admin/assets/images/icons/excel.svg')); ?>" alt="Excel">
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(count($employeelist) > 0): ?>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Id</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php $__currentLoopData = $employeelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="employee-row-<?php echo e($employees->id); ?>">
                                            <th scope="row" class="text-center"><?php echo e($i); ?></th>
                                            <td class="text-center"><?php echo e($employees->fname); ?></td>
                                            <td class="text-center"><?php echo e($employees->email); ?></td>
                                            <td scope="col" class="text-center">
                                                <?php if($employees->status == "active"): ?>
                                                    <button class="btn btn-success" style="width: 85px;" id="statusid<?php echo e($employees->id); ?>"  onclick="statusChange('<?php echo e($employees->id); ?>','<?php echo e($employees->status); ?>')">
                                                        Active
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-warning"  style="width: 85px;"  id="statusid<?php echo e($employees->id); ?>"  onclick="statusChange('<?php echo e($employees->id); ?>','<?php echo e($employees->status); ?>')">
                                                        Inactive
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="detailsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Details
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="detailsDropdown">
                                                        <a class="dropdown-item" href="<?php echo e(route('employee.adddocument', $employees->id)); ?>">Add Document</a>
                                                        <a class="dropdown-item" href="<?php echo e(route('employees.show', $employees->id)); ?>">View</a>
                                                        <a class="dropdown-item" href="<?php echo e(route('employees.edit', $employees->id)); ?>">Edit</a>
                                                        <a class="dropdown-item" onclick="deleteemployee('<?php echo e($employees->id); ?>')" >Delete</a>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                            <?php else: ?>
                                <div>No Record Found</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main Section End -->
    </div>
    <script>

            // Automatically close the success message after 1 second
            setTimeout(function() {
                $("#success-alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 1000);
        
            // Automatically close the error message after 1 second
            setTimeout(function() {
                $("#error-alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 3000);
        
            function statusChange(id, status) {
                console.log(id,status);
                Swal.fire({
                    title: "Are you sure to change the status?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    allowOutsideClick: false,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "PUT",
                            url: "<?php echo e(route('employee.change-status')); ?>",
                            data: { id: id, oldstatus: status },
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            success: function (data) {
                                if (data.status === 1) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Employee status changed successfully.",
                                        icon: "success"
                                    });
                                    $("#statusid" + id)
                                        .removeClass('btn-warning')
                                        .addClass('btn-success')
                                        .text('Active')
                                        .attr('onclick', "statusChange('" + id + "', 'active')");
                                } else if (data.status === 2) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Employee status changed successfully.",
                                        icon: "success"
                                    });
                                    $("#statusid" + id)
                                        .removeClass('btn-success')
                                        .addClass('btn-warning')
                                        .text('Inactive')
                                        .attr('onclick', "statusChange('" + id + "', 'inactive')");
                                } else {
                                    Swal.fire({
                                        title: "Error",
                                        text: data.message,
                                        icon: "error"
                                    });
                                }
                            },
                            error: function (error) {
                                console.error("Error updating employee status:", error);
                                Swal.fire({
                                    title: "Error",
                                    text: "Failed to update employee status.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            }
        
        
            function deleteemployee(id) {
                Swal.fire({
                    title: "Are you sure you want to delete this item?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    allowOutsideClick: false,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        var url = "<?php echo e(route('employees.destroy', ':id')); ?>";
                        url = url.replace(':id', id);

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Employee has been deleted.",
                                    icon: "success"
                                }).then(() => {
                                    // Remove the table row
                                    $('#employee-row-' + id).remove();
                                });
                            },
                            error: function (error) {
                                console.error("Error deleting employee:", error);
                                Swal.fire({
                                    title: "Error",
                                    text: "Failed to delete employee.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/employee/index.blade.php ENDPATH**/ ?>