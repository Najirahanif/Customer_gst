<?php $__env->startSection('content'); ?>
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Admin Dashboard</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="breadcrumb-link">Dashboard</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->

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
                                    <?php if(count($customerslist) > 0): ?>
                                    <a data-bs-toggle="tooltip" href="<?php echo e(route('customer.csv')); ?>" class="mr-2" data-bs-placement="top" title="Excel">

                                            <img src="<?php echo e(asset('admin/assets/images/icons/excel.svg')); ?>" alt="Excel">
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary">Add</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if(count($customerslist) > 0): ?>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Id</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <!-- <th scope="col" class="text-center">Phone Number</th> -->
                                            <th scope="col" class="text-center">Premium Amount</th>
                                            <th scope="col" class="text-center">GST</th>
                                            <th scope="col" class="text-center">Total Premium Amount</th>
                                            <th scope="col" class="text-center">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php $__currentLoopData = $customerslist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="customer-row-<?php echo e($customers->id); ?>">
                                            <th scope="row" class="text-center"><?php echo e($i); ?></th>
                                            <td class="text-center"><?php echo e($customers->name); ?></td>
                                            <td class="text-center"><?php echo e($customers->email); ?></td>
                                            <!-- <td class="text-center"><?php echo e($customers->phonenumber); ?></td> -->
                                            <td class="text-center"><?php echo e($customers->premiumamount); ?></td>
                                            <td class="text-center"><?php echo e($customers->gstpercent); ?></td>
                                            <td class="text-center"><?php echo e($customers->totalpremiumcollected); ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-primary mt-2" href="<?php echo e(route('customers.edit', $customers->id)); ?>">Edit</a>
                                                <a class="btn btn-danger mt-2" onclick="deletecustomer('<?php echo e($customers->id); ?>')" >Delete</a>   
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
    </div>
    <script>
        function deletecustomer(id) {
                // console.log('id',id);
                Swal.fire({
                    title: "Are you sure you want to delete this item?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    allowOutsideClick: false,
                }).then(function(result) {
                    if (result.isConfirmed) {
                        var url = "<?php echo e(route('customers.destroy', ':id')); ?>";
                        url = url.replace(':id', id);

                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                //  console.log('data',data);
                                
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Customer has been moved to trash.",
                                    icon: "success"
                                }).then(() => {
                                    // Remove the table row
                                    $('#customer-row-' + id).remove();
                                });
                            },
                            error: function (error) {
                                console.error("Error deleting customer:", error);
                                Swal.fire({
                                    title: "Error",
                                    text: "Already selected in another section.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            }
        </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>