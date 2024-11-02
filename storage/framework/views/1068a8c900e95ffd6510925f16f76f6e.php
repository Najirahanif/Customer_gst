
<?php $__env->startSection('content'); ?>

<!-- Page Content  -->
<div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Leave</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('leave.index')); ?>" class="breadcrumb-link">Leave Edit</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                <h4 class="card-header">Edit Leave</h4>
                    <div class="card-body">
                        <div id="resultMessage" style="font-size:18px;color:red;"></div>
                        <form id="editleave" method="post" action="<?php echo e(route('leave.update', $employee->id)); ?>" class="needs-validation" novalidate>
                         <?php echo csrf_field(); ?>      
                         <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <input type="hidden" class="form-control" name="id" id="id"value="<?php echo e($employee->id); ?>"  >
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="event">Event <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="event" id="event" placeholder="Enter Event Name"  value="<?php echo e($employee->event); ?>" >
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="noofdays">Number of Days <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="noofdays" id="noofdays" placeholder="Enter Number of Days"  value="<?php echo e($employee->noofdays); ?>" >
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                            <button class="btn btn-primary" id="submitbtn" type="submit">Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    <!-- Main Section End -->
</div>

        <script>



            $(document).ready(function ($) {
        
              $.validator.addMethod("customName", function(value, element) {
                return this.optional(element) || /^[^\s][\s\S]{0,24}$/.test(value);;
              }, "Please enter a valid name. Spaces are allowed only within the name, and it should not exceed 25 characters.");
        
              $("#updatedepartment").validate({
                  rules: {

                    name: {
                          required: true,
                          customName: true  
                      },
                      description: {
                          required: true,
                          customName: true  
                      }
                  },
                  messages: {
                    name: {
                          required: "Please enter a  name",
                          customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                    },
                    description: {
                          required: "Please enter a  name",
                          customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                    }
                  },
                  errorClass: "error", // Apply the 'error' class to error labels
                  submitHandler: function (form) {
                      form.submit();
                  }
              });
           })
           function checkname(processedValue) {
                    var name =  document.getElementById('name').value;
                    var id = document.getElementById('id').value;
                    if (name !== '') {
                            $.ajax({
                            type: 'GET',
                            url: "<?php echo e(route('department.checkname')); ?>", 
                            data: { name:name,id:id },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                displayMessage(response.message);
                            }
                        });
                    } else {
                    
                        displayMessage('');
                    }
                }
                   function displayMessage(message) {
                        $('#resultMessage').text(message);
                       if(message=="Name is already in the database.") {
                          $('#submitbtn').prop('disabled', true); 
                       } else {
                          $('#submitbtn').prop('disabled', false); 
                       }
                   }
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/leave/index.blade.php ENDPATH**/ ?>