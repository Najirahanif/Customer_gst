
<?php $__env->startSection('content'); ?>
    <!-- Page Content  -->
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Employee</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"
                                        class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('employees.index')); ?>"
                                        class="breadcrumb-link">Employee List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Document</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card shadow-sm">
                <h4 class="card-header">Add Document</h4>
                    <div class="card-body">
                    <div id="resultMessage" style="font-size:18px;color:red;"></div>
                    <form id="adddocument" method="post" action="<?php echo e(route('document.store')); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="employeeid" id="employeeid" value="<?php echo e($employee->id); ?>" class="form-control">
                            
                            <div class="input-group">
                                <label for="type">Type:<span class="text-danger">*</span></label>
                                <select class="type form-control w-100 <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="type" name="type" >
                                    <option value="">Enter your type</option>
                                    <option value="Id Proof">Id Proof</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Certificate">Certificate</option>
                                </select>
                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <label id="type-error" class="error" for="type"></label>           
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                <div class="form-group">
                                    <label for="document">Document<span class="text-danger">*</span></label>
                                    <input type="file" accept=".pdf, .doc, .docx" name="document" id="document" class="form-control <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div id="documentPreview" class="mt-4">
                                </div>
                                </div> 
                            </div>
                            <div class="row ">
                                <div class=" col form-group">
                                    <label for="expirydate">Expiry Date<span class="text-danger">*</span></label>
                                    <input type="date"  name="expirydate" id="expirydate" class="form-control  <?php $__errorArgs = ['expirydate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your expiry Date">
                                    <?php $__errorArgs = ['expirydate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col form-group">
                                    <label for="notes">Add Note <span class="text-danger">*</span></label>
                                    <textarea class="form-control  <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="notes" id="notes" placeholder="Add note..."></textarea>
                                    <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div> 
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                <button class="btn btn-primary" id="submitbtn" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Main Section End -->
    </div>    
</body>
</html>
<script src="https://view.officeapps.live.com/op/embed.js"></script>
    <script>
        //jquery validation
        $(document).ready(function($) {
                $("#adddocument").validate({
                    rules: {
                        type: {
                            required: true,
                        },
                        document: {
                            required: true,
                        },
                        expirydate: {
                            required: true,
                        },
                        notes: {
                            required: true,
                        },
                    },
                    messages: {
                        type: {
                            required: "Please select a type",
                        },
                        document: {
                            required: "Please upload a document",
                        },
                        expirydate: {
                            required: "Please enter an expiry date",
                        },
                        notes: {
                            required: "Please add a notes",
                        },
                    },
                    errorClass: "error", // Apply the 'error' class to error labels
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        }); 
        //Documnet Preview
           document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('document').addEventListener('change', function(event) {
                var file = event.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview;
                        if (file.type === 'application/pdf') {
                            // If PDF file
                            preview = document.createElement('embed');
                            preview.src = e.target.result;
                            preview.type = 'application/pdf';
                            preview.width = '100%';
                            preview.height = '400px'; // Adjust height as needed
                        } else if (file.type === 'application/msword' || file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                            // If DOC or DOCX file, use Google Docs Viewer
                            preview = document.createElement('iframe');
                            preview.src = 'https://docs.google.com/gview?url=' + encodeURIComponent(e.target.result) + '&embedded=true';
                            preview.style.width = '100%';
                            preview.style.height = '400px'; // Adjust height as needed
                        } else {
                            // Handle other types or show an error message
                            console.log('Unsupported file type: ' + file.type);
                            return;
                        }

                        // Clear previous preview
                        var previewContainer = document.getElementById('documentPreview');
                        previewContainer.innerHTML = '';
                        // Append the new preview
                        previewContainer.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        // Select2 for type
        $(document).ready(function() {
            $('.type').select2();
        });
        //Validation
        $(document).ready(function($) {

            $.validator.addMethod("customName", function(value, element) {
                    return this.optional(element) || /^[^\s][\s\S]{0,24}$/.test(value);;
                },
                "Please enter a valid name. Spaces are allowed only within the name, and it should not exceed 25 characters."
                );

            $("#adddesignation").validate({
                rules: {
                    name: {
                        required: true,
                        customName: true
                    }
                    
                },
                messages: {

                    name: {
                        required: "Please enter a  name",
                        customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                    },
                },
                errorClass: "error", // Apply the 'error' class to error labels
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });    
        function checkname(processedValue) {
                       var name =  document.getElementById('name').value;
                       if (name !== '') {
                              $.ajax({
                               type: 'GET',
                               url: "<?php echo e(route('designation.checkname')); ?>", 
                               data: { name: name },
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
                $('#submitbtn').prop('disabled', true); // Disable submit button
            } else {
                $('#submitbtn').prop('disabled', false); // Enable submit button
            }
        }   
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/employee/adddocument.blade.php ENDPATH**/ ?>