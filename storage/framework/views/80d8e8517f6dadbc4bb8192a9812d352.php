
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
                                        class="breadcrumb-link">Employee</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('employees.index')); ?>"
                                        class="breadcrumb-link">Employee List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Show</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section" id="overview">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <h2>Overview</h2>
                                                <p class="lead">Welcome to the user profile page! Here, you can explore detailed information about 
                                                <?php echo e($employee->fname); ?>, including their experience, uploads, and contact details. This profile provides a comprehensive overview, showcasing their professional achievements, personal interests, and any other pertinent information that highlights their unique qualities. Feel free to connect with <?php echo e($employee->fname); ?> directly through the provided contact information or learn more about their journey and experiences. </p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 justify-content-center display-flex">
                                                            <div class="card card-fluid">
                                                                <!-- .card-body -->
                                                                <div class="row">
                                                                    <div class="col mt-3 ml-3">
                                                                        <a href="tel:<?php echo e($employee->number); ?>" class="">
                                                                            <i class="fa fa-phone mr-2"></i><?php echo e($employee->number); ?>

                                                                        </a>
                                                                        <a href="mailto:<?php echo e($employee->email); ?>" class="mt-2 ml-3">
                                                                            <i class="fa fa-envelope mr-2"></i><?php echo e($employee->email); ?>

                                                                        </a>
                                                                    </div>
                                                                    <div class=" float-right mr-5 mt-3">
                                                                    <a data-bs-toggle="tooltip" href="<?php echo e(route('employee.pdfshow', $employee->id)); ?>" class="mr-2" data-bs-placement="top" title="PDF">
                                                                        <img  src="<?php echo e(asset('admin/assets/images/icons/pdf.svg')); ?>" alt="PDF">
                                                                    </a>
                                                                    <a data-bs-toggle="tooltip" href="<?php echo e(route('employee.csvemployee', $employee->id)); ?>" class="mr-2" data-bs-placement="top" title="Excel">
                                                                        <img src="<?php echo e(asset('admin/assets/images/icons/excel.svg')); ?>" alt="Excel">
                                                                    </a>
                                                                    </div>
                                                                </div>
                                                                

                                                                <div class="card-body text-center">
                                                                    <!-- .user-avatar -->
                                                                    <a href="user-profile.html" class="user- my-2avatar">
                                                                <img src="<?php echo e(asset($employee->image)); ?>" alt="Employee Image" class="rounded-circle user-avatar-xl">
                                                                </a>
                                                                    <!-- /.user-avatar -->
                                                                    <h3 class="card-title mb-2 text-truncate">
                                                                    <a href="user-profile.html"><?php echo e($employee->fname); ?> <?php echo e($employee->lname); ?> </a>
                                                                    </h3>
                                                                    <h6 class="card-subtitle text-muted mb-3"> <?php echo e($employee->designation); ?> @ <?php echo e($employee->department); ?> department</h6>
                                                                    <!-- .skills -->
                                                                    <p class="skills">
                                                                        <a href="#" class="btn btn-xs btn-outline-secondary mt-1"><?php echo e($employee->previousrole); ?></a>
                                                                    </p>
                                                                    <!-- /.skills -->
                                                                    <p class="text-muted">As an <?php echo e($employee->nationality); ?> I make stunning and cool responsive web and app design which suitable for any project purpose for your business. </p>
                                                                    <!-- <p>
                                                                        <a href="#" class="btn btn-primary">View Profile
                                                                        <i class="fa fa-arrow-right ml-2"></i>
                                                                        </a>
                                                                    </p> -->
                                                                </div>
                                                               <div class="container mr-5  mb-5">
                                                               <h4 class="lead">Additional Information</h4>
                                                               <div class="table-responsive mt-3">
                                                                    <table class="table table-striped">
                                                                        
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">Employee Gender</th>
                                                                                <td><?php echo e($employee->gender); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Date of Joining</th>
                                                                                <td><?php echo e($employee->dateofjoining); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Employee Status</th>
                                                                                <td><?php echo e($employee->employeestatus); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Employee Address</th>
                                                                                <td><?php echo e($employee->address); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Employee Relationship</th>
                                                                                <td><?php echo e($employee->emergencyrelationship); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Employee Previous Role</th>
                                                                                <td><?php echo e($employee->previousrole); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Employee Nationality</th>
                                                                                <td><?php echo e($employee->nationality); ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                               </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                            <div class="row">
                                                <!-- ============================================================== -->
                                                <!-- basic table -->
                                                <!-- ============================================================== -->
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="card">
                                                        <h5 class="card-header">Document Table</h5>
                                                        <div class="card-body">
                                                        <?php if(count($document)>0): ?>
                                                            <table class="table text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i=1;
                                                                    ?>
                                                                    <?php $__currentLoopData = $document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <th scope="row"><?php echo e($i); ?></th>
                                                                        <td><?php echo e($document->type); ?></td>
                                                                        <td>
                                                                            <?php
                                                                                $randomNumber = mt_rand(1000, 9999); 
                                                                            ?>

                                                                            <a href="<?php echo e(asset($document->document)); ?>" class="btn btn-primary" target="_blank">View</a> 
                                                                            <a href="<?php echo e(asset($document->document)); ?>" class="btn btn-success" download="<?php echo e($document->type . '_' . $randomNumber); ?>">Download</a>
                                                                        </td>
                                                                    </tr> 
                                                                    <?php
                                                                    $i++;
                                                                    ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                          
                                                                </tbody>
                                                            </table>
                                                            <?php else: ?>
                                                            <div>No record found</div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        <!-- Main Section End -->
    </div>

    <script>
        // Image Preview
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
        //Years of experience
        function toggleExperienceDiv(value) {
            var experienceDiv = document.getElementById('experienceDiv');
            if (value === 'Experienced') {
                experienceDiv.style.display = 'block';
            } else {
                experienceDiv.style.display = 'none';
            }
        }
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

                $("#addemployee").validate({
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
        function checkEmail(processedValue) {
            var email = document.getElementById('email').value;
            if (email !== '') {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('employee.checkemail')); ?>",
                    data: { email: email },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        displayEmailMessage(response.message);
                    }
                });
            } else {
                displayEmailMessage('');
            }
        }

        function displayEmailMessage(message) {
            $('#resultMessage').text(message);
            if (message == "Email is already in database.") {
                $('#submitBtn').prop('disabled', true); // Disable submit button
            } else {
                $('#submitBtn').prop('disabled', false); // Enable submit button
            }
        }
    </script>
    <script>
        // Select2
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

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/employee/show.blade.php ENDPATH**/ ?>