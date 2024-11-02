<?php $__env->startSection('content'); ?>

<!-- Page Content  -->
<div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Department</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('department.index')); ?>" class="breadcrumb-link">Department List</a></li>
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
                <h4 class="card-header">Edit Department</h4>
                    <div class="card-body">
                        <div id="resultMessage" style="font-size:18px;color:red;"></div>
                        <form id="updatedepartment" method="post" action="<?php echo e(route('department.update', $department->id)); ?>" class="needs-validation" novalidate>
                         <?php echo csrf_field(); ?>      
                         <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <input type="hidden" class="form-control" name="id" id="id"value="<?php echo e($department->id); ?>"  >
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter department Name"  value="<?php echo e($department->name); ?>" onkeyup="checkname(event.target.value)" >
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="designation">Designation<span class="text-danger">*</span></label>
                                <select class="form-control search" name="designation" aria-label="Default select example" >
                                        <option selected>Open this select menu</option>
                                        <?php $__currentLoopData = $alldesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($designation->id); ?>"><?php echo e($designation->name); ?></option>
                                        <option value="<?php echo e($designation->id); ?>" <?php echo e(($designation->id == $department->designation) ? 'selected' : ''); ?>><?php echo e($designation->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Enter department "  value="<?php echo e($department->description); ?>" >
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
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\hrm_app\resources\views/admin/department/edit.blade.php ENDPATH**/ ?>