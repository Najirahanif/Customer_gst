
<?php $__env->startSection('content'); ?>

<!-- Page Content  -->
<div class="container-fluid  dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Client</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('client.index')); ?>" class="breadcrumb-link">Client List</a></li>
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
                <h4 class="card-header">Edit Client</h4>
                <div class="card-body">
                    <div id="resultMessage" style="font-size:18px;color:red;"></div>
                    <form id="updateclient" method="post" action="<?php echo e(route('client.update', $client->id)); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo e($client->id); ?>">
                            <!-- Personal Information -->
                            <div class="col-md-6">
                                <h5>Personal Information</h5>
                                <div class="form-group">
                                    <label for="firstName">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->firstName); ?>" name="firstName" id="firstName" placeholder="Enter First Name" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->lastName); ?>" name="lastName" id="lastName" placeholder="Enter Last Name" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="dateOfBirth">Date Of Birth <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->dateOfBirth); ?>" name="dateOfBirth" id="dateOfBirth" placeholder="Enter Date Of Birth" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender <span class="text-danger">*</span></label>
                                    <div>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="gender" id="male" value="male" class="custom-control-input" <?php echo e($client->gender == 'male' ? 'checked' : ''); ?>>
                                            <span class="custom-control-label">Male</span>
                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="gender" id="female" value="female" class="custom-control-input" <?php echo e($client->gender == 'female' ? 'checked' : ''); ?>>
                                            <span class="custom-control-label">Female</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->nationality); ?>" name="nationality" id="nationality" placeholder="Enter Nationality" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->email); ?>" name="email" id="email" placeholder="Enter Email" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="number">Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" value="<?php echo e($client->number); ?>" name="number" id="number" placeholder="Enter Number" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="textarea" class="form-control" value="<?php echo e($client->address); ?>" name="address" id="address" placeholder="Enter Address" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="image">Profile Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Choose A Image" onkeyup="checkname(event.target.value)">
                                    <div id="existingProfileImageContainer" style="margin-top: 10px;">
                                        <?php if($client->image): ?>
                                        <?php $__currentLoopData = explode(',', $client->image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="position: relative; display: inline-block; margin-right: 10px; margin-bottom: 10px;">
                                            <img src="<?php echo e(asset('storage/' . $image)); ?>" alt="Profile Image" style="max-width: 200px; height: 100px;">
                                            <button type="button" class="remove-image" data-image="<?php echo e($image); ?>" style="position: absolute; top: 0; right: 0; background-color: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">&times;</button>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>










                            </div>
                            <!-- Company Details -->
                            <div class="col-md-6">
                                <h5>Company Details</h5>
                                <div class="form-group">
                                    <label for="compayName">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->companyName); ?>" name="companyName" id="companyName" placeholder="Enter company name" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="companyAddress">Company Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->companyAddress); ?>" name="companyAddress" id="companyAddress" placeholder="Enter company address" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="companyWebsite">Company Website <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->companyWebsite); ?>" name="companyWebsite" id="companyWebsite" placeholder="Enter company Website" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="companyImage">Company Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="companyImage" id="companyImage" placeholder="Choose A Company Image" onkeyup="checkname(event.target.value)">
                                    <div id="existingCompanyImageContainer" style="margin-top: 10px;">
                                        <?php if($client->companyImage): ?>
                                        <?php $__currentLoopData = explode(',', $client->companyImage); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div style="position: relative; display: inline-block; margin-right: 10px; margin-bottom: 10px;">
                                            <img src="<?php echo e(asset('storage/' . $companyImage)); ?>" alt="Company Image" style="max-width: 200px; height: 100px;">
                                            <button type="button" class="remove-image" data-image="<?php echo e($companyImage); ?>" style="position: absolute; top: 0; right: 0; background-color: red; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">&times;</button>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>




                                <!-- Emergency Contact Details -->

                                <h5>Emergency Contact Details</h5>
                                <div class="form-group">
                                    <label for="emergencyContactName">Contact Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->emergencyContactName); ?>" name="emergencyContactName" id="emergencyContactName" placeholder="Enter emergency contact name" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="contactRelationship">Relationship <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->contactRelationship); ?>" name="contactRelationship" id="contactRelationship" placeholder="Enter a relationship" onkeyup="checkname(event.target.value)">
                                </div>
                                <div class="form-group">
                                    <label for="contactNumber">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo e($client->contactNumber); ?>" name="contactNumber" id="contactNumber" placeholder="Enter contact number" onkeyup="checkname(event.target.value)">
                                </div>

                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                <button class="btn btn-primary" id="submitbtn" type="submit">Update</button>
                            </div>
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
    $(document).ready(function($) {

        // Custom validator for name fields
        $.validator.addMethod("customName", function(value, element) {
            return this.optional(element) || /^[^\s][\s\S]{0,24}$/.test(value);
        }, "Please enter a valid name. Spaces are allowed only within the name, and it should not exceed 25 characters.");

        // Custom validator for date of birth (assuming YYYY-MM-DD format)
        $.validator.addMethod("dateFormat", function(value, element) {
            return this.optional(element) || /^\d{4}-\d{2}-\d{2}$/.test(value);
        }, "Please enter a valid date in the format YYYY-MM-DD.");

        // Custom validator for email
        $.validator.addMethod("customEmail", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(value);
        }, "Please enter a valid email address.");

        // Custom validator for phone number (assuming a general format)
        $.validator.addMethod("phoneNumber", function(value, element) {
            return this.optional(element) || /^\+?[0-9]{7,15}$/.test(value);
        }, "Please enter a valid phone number.");

        $("#updateclient").validate({
            rules: {
                firstName: {
                    required: true,
                    customName: true
                },
                lastName: {
                    required: true,
                    customName: true
                },
                dateOfBirth: {
                    required: true,
                    dateFormat: true
                },
                gender: {
                    required: true
                },
                nationality: {
                    required: true
                },
                email: {
                    required: true,
                    customEmail: true
                },
                number: {
                    required: true,
                    phoneNumber: true
                },
                address: {
                    required: true
                },
                image: {
                    required: true
                },
                companyName: {
                    required: true,
                    customName: true
                },
                companyAddress: {
                    required: true
                },
                companyWebsite: {
                    required: true,
                    url: true
                },
                companyImage: {
                    required: true
                },
                emergencyContactName: {
                    required: true,
                    customName: true
                },
                contactRelationship: {
                    required: true
                },
                contactNumber: {
                    required: true,
                    phoneNumber: true
                }
            },
            messages: {
                firstName: {
                    required: "Please enter a first name",
                    customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                },
                lastName: {
                    required: "Please enter a last name",
                    customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                },
                dateOfBirth: {
                    required: "Please enter a date of birth",
                    dateFormat: "Please enter a valid date in the format YYYY-MM-DD."
                },
                gender: {
                    required: "Please select a gender"
                },
                nationality: {
                    required: "Please enter a nationality"
                },
                email: {
                    required: "Please enter an email address",
                    customEmail: "Please enter a valid email address."
                },
                number: {
                    required: "Please enter a phone number",
                    phoneNumber: "Please enter a valid phone number."
                },
                address: {
                    required: "Please enter an address"
                },
                image: {
                    required: "Please upload an image"
                },
                companyName: {
                    required: "Please enter a company name",
                    customName: "Please enter a valid company name. No leading spaces are allowed, and the name must not exceed 25 characters."
                },
                companyAddress: {
                    required: "Please enter a company address"
                },
                companyWebsite: {
                    required: "Please enter a company website",
                    url: "Please enter a valid URL."
                },
                companyImage: {
                    required: "Please upload a company image"
                },
                emergencyContactName: {
                    required: "Please enter an emergency contact name",
                    customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                },
                contactRelationship: {
                    required: "Please enter the relationship with the emergency contact"
                },
                contactNumber: {
                    required: "Please enter an emergency contact number",
                    phoneNumber: "Please enter a valid phone number."
                }
            },
            errorClass: "error", // Apply the 'error' class to error labels
            submitHandler: function(form) {
                form.submit();
            }
        });
    });


    function checkname(processedValue) {
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var dateOfBirth = document.getElementById('dateOfBirth').value;
        var gender = document.getElementById('gender').value;
        var nationality = document.getElementById('nationality').value;
        var email = document.getElementById('email').value;
        var number = document.getElementById('number').value;
        var address = document.getElementById('address').value;
        var image = document.getElementById('image').value;
        var companyName = document.getElementById('companyName').value;
        var companyAddress = document.getElementById('companyAddress').value;
        var companyWebsite = document.getElementById('companyWebsite').value;
        var companyImage = document.getElementById('companyImage').value;
        var companyNumber = document.getElementById('companyNumber').value;
        var emergencyContactName = document.getElementById('emergencyContactName').value;
        var contactRelationship = document.getElementById('contactRelationship').value;
        var contactNumber = document.getElementById('contactNumber').value;


        if (name !== '') {
            $.ajax({
                type: 'GET',
                url: "<?php echo e(route('client.checkname')); ?>",
                data: {
                    firstName: firstName
                },
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
        if (message == "Name is already in the database.") {
            $('#submitbtn').prop('disabled', true); // Disable submit button
        } else {
            $('#submitbtn').prop('disabled', false); // Enable submit button
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hrm_app\resources\views/admin/client/edit.blade.php ENDPATH**/ ?>