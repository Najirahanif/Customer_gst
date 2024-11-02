
<?php $__env->startSection('content'); ?>
<style>
        input[type=radio] {
            box-sizing: content-box;
            padding: 0;
            display:inline-block;
        }
        .img-div {
            position: relative;
            width: 15%;
            height:8%;
            float:left;
            margin-right:5px;
            margin-left:5px;
            margin-bottom:10px;
            margin-top:10px;
        }

        .image {
            width:200px;
            height:100px;
            opacity: 1;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .img-div:hover .image {
            opacity: 0.3;
        }

        .img-div:hover .middle {
            opacity: 1;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            padding: 0 53px;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card shadow-sm">
                <h4 class="card-header">Add Employee</h4>
                <div class="card-body">
                    <div id="resultMessage" style="font-size:18px;color:red;"></div>
                        <form id="updateemployee" method="post"
                            action="<?php echo e(route('employees.update', $employee->id)); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="col">
                                    <label for="employee_id">Employee ID</label>
                                    <input type="text" id="employee_id" name="employee_id" value="<?php echo e($employee->employee_id); ?>" class="form-control mb-3" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="fname">Firstname <span class="text-danger">*</span></label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your Firstname" value="<?php echo e($employee->fname); ?>">
                                </div>
                                <div class="col">
                                    <label for="lname">Lastname</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your Lastname" value="<?php echo e($employee->lname); ?>">
                                </div>
                                <div class="col">
                                <label for="dob">Date of Birth (MM/DD/YYYY)<span class="text-danger">*</span></label>
                                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Enter your DOB" value="<?php echo e($employee->dob); ?>">
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" value="<?php echo e($employee->email); ?>">
                                </div>
                                <div class="col">
                                <label for="number">Number<span class="text-danger">*</span></label>
                                    <input type="text" name="number" id="number" class="form-control" placeholder="Enter your Number" value="<?php echo e($employee->number); ?>" >
                                </div>
                                <div class="col">
                                <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <input type="nationality" name="nationality" id="nationality" class="form-control" placeholder="Enter your Nationality" value="<?php echo e($employee->nationality); ?>" >
                                </div>
                            </div>
                            <div class="form-group mt-3">
                            <label for="dateofjoining">Date of Joining(MM/DD/YYYY)<span class="text-danger">*</span></label>
                                <input type="text" name="dateofjoining" id="dateofjoining" class="form-control" placeholder="Enter Date of Joining" value="<?php echo e($employee->dateofjoining); ?>">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mt-3">                                    
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <?php
                                            $genderdata = $employee->gender;
                                            $gender = explode(',',$genderdata);
                                        ?>
                                        <select class="gender w-100 " name="gender" id="gender" >
                                            <option value="">Enter Your Gender</option>
                                            <option value="Male" <?php echo e(in_array('Male', $gender) ? 'selected' : ''); ?>>Male</option>
                                            <option value="Female" <?php echo e(in_array('Female', $gender) ? 'selected' : ''); ?>>Female</option>
                                            <option value="Prefer Not To Say" <?php echo e(in_array('Prefer Not To Say', $gender) ? 'selected' : ''); ?>>Prefer Not To Say</option>
                                        </select>
                                        <label id="gender-error" class="error" for="gender"></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mt-3">
                                        <label for="designation">Designation <span class="text-danger">*</span></label>
                                        <?php
                                            $designationdata = $employee->designation;
                                            $designation = explode(',',$designationdata);
                                        ?>
                                        <select class="designation w-100" name="designation" id="designation">
                                            <option value="">Enter your Designation</option>
                                            <option  value="President" <?php echo e(in_array('President', $designation) ? 'selected' : ''); ?> >President</option>
                                            <option value="Director" <?php echo e(in_array('Director', $designation) ? 'selected' : ''); ?>>Director</option>
                                        </select>
                                        <label id="designation-error" class="error" for="designation"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="input-group  ">
                                        <label for="department">Depatment:<span class="text-danger">*</span></label>
                                        <?php
                                            $departmentdata = $employee->department;
                                            $department = explode(',',$departmentdata);
                                        ?>
                                        <select class="department w-100" name="department" id="department" >
                                            <option value="">Enter your Department</option>
                                            <option value="Testing" <?php echo e(in_array('Testing', $department) ? 'selected' : ''); ?>>Testing</option>
                                            <option value="Logistics" <?php echo e(in_array('Logistics', $department) ? 'selected' : ''); ?>>Logistics</option>
                                            <option value="Software Development" <?php echo e(in_array('Software Development', $department) ? 'selected' : ''); ?>>Software Development</option>
                                        </select>
                                        <label id="department-error" class="error" for="department"></label>
                                    </div>         
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <label for="employeestatus">Employee Status:<span class="text-danger">*</span></label>
                                        <?php
                                        $employeestatusdata = $employee->employeestatus;
                                        $employeestatus = explode(',',$employeestatusdata);
                                    ?>
                                        <select class="employeestatus w-100" name="employeestatus" id="employeestatus" >
                                            <option value="">Enter Employee Status</option>
                                            <option value="Fulltime" <?php echo e(in_array('Fulltime', $employeestatus) ? 'selected' : ''); ?>>Fulltime</option>
                                            <option value="Partime" <?php echo e(in_array('Partime', $employeestatus) ? 'selected' : ''); ?>>Partime</option>
                                            <option value="Contract" <?php echo e(in_array('Contract', $employeestatus) ? 'selected' : ''); ?>>Contract</option>
                                        </select>
                                        <label id="employeestatus-error" class="error" for="employeestatus"></label>
                                    </div>
                                </div>
                            </div>
                            <!-- Previous Roles starts -->
                            <div class="input-group mt-3">
                                <label for="previousrole">Previous Roles:<span class="text-danger">*</span></label>
                                <?php
                                $previousroledata = $employee->previousrole;
                                $previousrole = explode(',',$previousroledata);
                            ?>
                                <select class="previousrole w-100" onchange="toggleExperienceDiv(this.value)" name="previousrole" id="previousrole">
                                    <option value="">Enter your Previous Role</option>
                                    <option value="Fresher" <?php echo e(in_array('Fresher', $previousrole) ? 'selected' : ''); ?>>Fresher</option>
                                    <option value="Experienced" <?php echo e(in_array('Experienced', $previousrole) ? 'selected' : ''); ?>>Experienced</option>
                                </select>
                                <label id="previousrole-error" class="error" for="previousrole"></label>
                            </div>
                            <!-- Previous Roles Ends -->
                            <div class="row">
                                <div id="experienceDiv" style="display: <?php echo e(in_array('Experienced', $previousrole) ? 'block' : 'none'); ?>;" class="col form-group mt-3">
                                <!-- Div content for years of experience -->
                                <label for="yearsofexperience">Years of Experience<span class="text-danger">*</span></label>
                                    <input type="number" name="yearsofexperience" id="yearsofexperience" class="form-control" value="<?php echo e($employee->yearsofexperience); ?>" placeholder="Enter your Years of Experience" >
                                </div>
                            </div>       
                            <div class="form-group mt-3">
                            <label for="address">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" id="address" ><?php echo e($employee->address); ?></textarea>
                            </div> 
                            <!-- Image -->
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input type="file" name="img" id="photo" accept="image/*" onchange="loadFile(event)" class="form-control">
                                    <?php if($employee->image): ?>
                                        <img id="output" style="width:100px;height:80px;" src="<?php echo e(asset($employee->image)); ?>" />
                                    <?php else: ?>
                                        <img id="output" style="width:0px;height:0px;" />
                                    <?php endif; ?>
                                </div>
                                </div>
                            </div>
                            <!-- Image Ends -->
                            <label for="name" ><span class="text-danger">Emergency details </span></label>
                            <div class="row">
                                <div class="col ">
                                <label for="emergencyname">Name <span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo e($employee->emergencyname); ?>" name="emergencyname" id="emergencyname" class="form-control" placeholder="Enter your Name" >
                                </div>
                                <div class="col">
                                <label for="emergencyrelationship">Relationship<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo e($employee->emergencyrelationship); ?>" name="emergencyrelationship" id="emergencyrelationship" class="form-control" placeholder="Enter your relationship" >
                                </div>
                                <div class="col">
                                <label for="emergencycontact">Contact<span class="text-danger">*</span></label>
                                    <input type="text" value="<?php echo e($employee->emergencycontact); ?>" name="emergencycontact" id="emergencycontact" class="form-control" placeholder="Enter your contact">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                <button class="btn btn-primary" id="submitbtn" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Main Section End -->
    </div>

    <script>
        //jquery validation
        $(document).ready(function($) {
                // Firstname
                 $.validator.addMethod("customName", function(value, element) {
                    return this.optional(element) || /^[^\s][\s\S]{0,24}$/.test(value);;
                },
                "Please enter a valid name. Spaces are allowed only within the name, and it should not exceed 25 characters."
                );
                //Date of Birth
                $.validator.addMethod("customDOB", function(value, element) {
                    // Regular expression for MM/DD/YYYY format
                    var dateRegex = /^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/(19|20)\d{2}$/;
                    // Checking if the entered value matches the pattern
                    if (!dateRegex.test(value)) return false;

                    // Extracting the components of the date
                    var parts = value.split("/");
                    var month = parseInt(parts[0], 10);
                    var day = parseInt(parts[1], 10);
                    var year = parseInt(parts[2], 10);

                    // Calculating the minimum allowed birth year (18 years ago)
                    var minAgeYear = (new Date()).getFullYear() - 18;

                    // Checking if the birth year is at least 18 years ago
                    if (year > minAgeYear) return false;
                    // If the birth year is the same as 18 years ago, check month and day
                    if (year === minAgeYear) {
                        var minAgeMonth = (new Date()).getMonth() + 1;
                        if (month > minAgeMonth) return false;
                        if (month === minAgeMonth) {
                            var minAgeDay = (new Date()).getDate();
                            if (day > minAgeDay) return false;
                        }
                    }
                    // If all checks passed, return true
                    return true;
                },
                 "You must be at least 18 years old."
                );
                // Email
                $.validator.addMethod("customEmail", function(value, element) {
                    // Regular expression pattern for email validation
                    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    // Checking if the entered value matches the pattern
                    return this.optional(element) || emailRegex.test(value);
                }, "Please enter a valid email address.");
                // Number
                $.validator.addMethod("customPhone", function(value, element) {
                    // Regular expression pattern for phone number validation
                    var phoneRegex = /^[0-9]{10}$/;
                    // Checking if the entered value matches the pattern
                    return this.optional(element) || phoneRegex.test(value);
                }, "Please enter a valid phone number.");
                //Nationality
                $.validator.addMethod("customNationality", function(value, element) {
                    // Regular expression pattern to validate nationality
                    return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
                }, 
                "Please enter a valid nationality. Only letters and spaces are allowed.");

                $("#updateemployee").validate({
                    rules: {
                        fname: {
                            required: true,
                            customName: true
                        },
                        dob: {
                            required: true,
                            customDOB: true
                        },
                        email: {
                            required: true,
                            customEmail: true
                        },
                        number: {
                            required: true,
                            customPhone: true
                        },
                        nationality: {
                            required: true,
                            customNationality: true
                        },
                        dateofjoining:{
                            required:true,
                        },
                        gender:{
                            required:true,
                        },
                        designation:{
                            required:true,
                        },
                        department:{
                            required:true,
                        },
                        employeestatus:{
                            required:true,
                        },
                        previousrole:{
                            required:true,
                        },
                        address:{
                            required:true,
                        },
                        img:{
                            required:true,
                        },
                        emergencyname:{
                            required:true,
                        },
                        emergencyrelationship:{
                            required:true,
                        },
                        emergencycontact:{
                            required:true,
                        }
                    },
                    messages: {
                        fname: {
                            required: "Please enter a name",
                            customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                        },
                        dob: {
                            required: "Please enter your Date of Birth",
                            customDOB: "You must be at least 18 years old."
                        },
                        email: {
                            required: "Please enter an email address",
                            customEmail: "Please enter a valid email address."
                        },
                        number: {
                            required: "Please enter a phone number",
                            customPhone: "Please enter a valid phone number."
                        },
                        nationality: {
                            required: "Please enter your nationality",
                            customNationality: "Please enter a valid nationality (only letters and spaces)."
                        },
                        dateofjoining: {
                            required: "Please enter your Date of joining",
                        },
                        gender: {
                            required: "Please enter your gender",
                        },
                        designation: {
                            required: "Please enter your designation",
                        },
                        department: {
                            required: "Please enter your department",
                        },
                        employeestatus: {
                            required: "Please enter your employee status",
                        },
                        previousrole: {
                            required: "Please enter your previousrole",
                        },
                        address: {
                            required: "Please enter your address",
                        },
                        img: {
                            required: "Please upload image",
                        },
                        emergencyname: {
                            required: "Please enter your name",
                        },
                        emergencyrelationship: {
                            required: "Please enter your relationship",
                        },
                        emergencycontact: {
                            required: "Please enter your number",
                        },
                    },
                    errorClass: "error", // Apply the 'error' class to error labels
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        });  

        //image Preview
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
        //Years of experience
        function toggleExperienceDiv() {
            var previousRoleSelect = document.getElementById('previousrole');
            var experienceDiv = document.getElementById('experienceDiv');
            var yearsOfExperienceInput = document.getElementById('yearsofexperience');
            
            if (previousRoleSelect.value === 'Experienced') {
                experienceDiv.style.display = 'block';
            } else {
                experienceDiv.style.display = 'none';
                yearsOfExperienceInput.value = ''; // Clear the value
            }
        }
        // Call the function initially to set the initial display state
        toggleExperienceDiv();
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
        //Select2 option
        $(document).ready(function() {
            $('.designation').select2();
        });
        $(document).ready(function() {
            $('.department').select2();
        });
        $(document).ready(function() {
            $('.gender').select2();
        });
        $(document).ready(function() {
            $('.employeestatus').select2();
        });
        $(document).ready(function() {
            $('.previousrole').select2();
        });  
    </script>
    


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/employee/edit.blade.php ENDPATH**/ ?>