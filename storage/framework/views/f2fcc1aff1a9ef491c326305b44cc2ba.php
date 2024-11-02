
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
                        <form id="addemployee" method="post"
                            action="<?php echo e(route('employees.store')); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col">
                                    <label for="employee_id">Employee ID</label>
                                    <input type="text" id="employee_id" name="employee_id" value="EM_<?php echo e(rand(10000, 99999)); ?>" class="form-control mb-3" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="fname">Firstname <span class="text-danger">*</span></label>
                                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your Firstname" >
                                </div>
                                <div class="col">
                                <label for="lname">Lastname</label>
                                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your Lastname" >
                                </div>
                                <div class="col">
                                <label for="dob">Date of Birth (MM/DD/YYYY)<span class="text-danger">*</span></label>
                                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Enter your DOB" onkeyup="checkdob(event.target.value)" >
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" onkeyup="checkEmail(event.target.value)" placeholder="Enter your Email">
                                </div>
                                <div class="col">
                                    <label for="number">Number<span class="text-danger">*</span></label>
                                    <input type="text" name="number" id="number" class="form-control" placeholder="Enter your Number"  onkeyup="checknumber(event.target.value)">
                                </div>
                                <div class="col">
                                    <label for="nationality">Nationality<span class="text-danger">*</span></label>
                                    <input type="nationality" name="nationality" id="nationality" class="form-control" placeholder="Enter your Nationality">
                                </div>
                            </div>
                            <div class="row mt-4 ">
                                <div class=" col form-group">
                                    <label for="dateofjoining">Date of Joining<span class="text-danger">*</span></label>
                                        <input type="date" name="dateofjoining" id="dateofjoining" class="form-control" placeholder="Enter Date of Joining">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <div class="input-group ">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <select class="gender w-100 " name="gender" id="gender">
                                            <option value="">Enter Your Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Prefer Not To Say">Prefer Not To Say</option>
                                        </select>
                                        <label id="gender-error" class="error" for="gender"></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group ">
                                        <label for="designation">Designation <span class="text-danger">*</span></label>
                                        <select class="designation w-100" name="designation" onchange="departmentAccess(this.value)">
                                        <option selected>Select your designation</option>
                                        <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($designation->id); ?>" onchange="departmentAccess('<?php echo e($designation->userid); ?>')"><?php echo e($designation->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label id="designation-error" class="error" for="designation"></label>
                                    </div>
                                </div>
                            </div> 
                            <div class="row mt-3">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="input-group">
                                        <label for="department">Depatment:<span class="text-danger">*</span></label>
                                        <select class="department w-100" name="department">
                                            <option value="">Enter your Department</option>
                                            <!-- <option value="Testing">Testing</option>
                                            <option value="Logistics">Logistics</option>
                                            <option value="Software Development">Software Development</option> -->
                                        </select>
                                        <label id="department-error" class="error" for="department"></label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="input-group">
                                        <label for="employeestatus">Employee Status:<span class="text-danger">*</span></label>
                                        <select class="employeestatus w-100" name="employeestatus">
                                            <option value="">Enter Employee Status</option>
                                            <option value="Fulltime">Fulltime</option>
                                            <option value="Partime">Partime</option>
                                            <option value="Contract">Contract</option>
                                        </select>
                                        <label id="employeestatus-error" class="error" for="employeestatus"></label>
                                    </div>
                                </div>      
                            </div> 
                            <div class="row mt-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="input-group">
                                        <label for="previousrole">Previous Roles:<span class="text-danger">*</span></label>
                                        <select class="previousrole w-100" name="previousrole" onchange="toggleExperienceDiv(this.value)">
                                            <option value="">Enter your Previous Role</option>
                                            <option value="Fresher">Fresher</option>
                                            <option value="Experienced">Experienced</option>
                                        </select>
                                        <label id="previousrole-error" class="error" for="previousrole"></label>
                                    </div>
                                </div>   
                            </div>
                            <div class="row">
                                <div class="col form-group mt-3" id="experienceDiv" style="display: none;" >
                                <!-- Div content for years of experience -->
                                <label for="yearsofexperience">Years of Experience<span class="text-danger">*</span></label>
                                    <input type="number" name="yearsofexperience" id="yearsofexperience" class="form-control" placeholder="Enter your Years of Experience" >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col form-group mt-3">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="address" id="address" placeholder="Enter your Address"></textarea>
                                </div> 
                            </div>
                            <!-- Image -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group ">
                                        <label for="photo">Photo</label>
                                        <input type="file" name="img" id="images" accept="image/*" onchange="loadFile(event)" class="form-control">
                                    </div>
                                    <img id="output" style="width:100px;height:80px;"/>
                                </div>  
                            </div>
                            <!-- Image Ends -->
                            <label for="name" class="mt-3"><span class="text-danger">Emergency details </span></label>
                            <div class="row">
                                <div class="col ">
                                <label for="emergencyname">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="emergencyname" id="emergencyname" class="form-control" placeholder="Enter your Name" >
                                </div>
                                <div class="col">
                                <label for="emergencyrelationship">Relationship<span class="text-danger">*</span></label>
                                    <input type="text" name="emergencyrelationship" id="emergencyrelationship" class="form-control" placeholder="Enter your relationship" >
                                </div>
                                <div class="col">
                                <label for="emergencycontact">Contact<span class="text-danger">*</span></label>
                                    <input type="text" name="emergencycontact" id="emergencycontact" class="form-control" placeholder="Enter your contact">
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 mb-4">
                                <button class="btn btn-primary" id="submitBtn" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Main Section End -->
    </div>

    <script>
        //department include from other table
        function departmentAccess(id) {
            console.log(id); // Log the id for debugging
            
            // Perform Ajax request
            $.ajax({
                url: '<?php echo e(route("department.access")); ?>', // Using named route for department access
                type: 'GET', // Using GET method to fetch data
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>', // Add CSRF token for Laravel protection
                    'designation': id
                },
                success: function(response) {
                    // Handle successful response
                    console.log(response); // For debugging purposes
                    
                    // Clear existing options
                    $('.department').empty();
                    
                    // Add default option
                    $('.department').append('<option value="">Select your Department</option>');
                    
                    // Iterate over departments received and add options
                    $.each(response, function(index, department) {
                        $('.department').append('<option value="' + department.id + '">' + department.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        }

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
        function checknumber(processedValue) {
            var number = document.getElementById('number').value;
            if (number !== '') {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo e(route('employee.checknumber')); ?>",
                    data: { number: number },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        displaynumberMessage(response.message);
                    }
                });
            } else {
                displaynumberMessage('');
            }
        }

        function displaynumberMessage(message) {
            $('#resultMessage').text(message);
            if (message == "Number already exists.") {
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

<?php echo $__env->make('layouts.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/employee/create.blade.php ENDPATH**/ ?>