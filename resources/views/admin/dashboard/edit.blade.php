@extends('layouts.adminlayout')
@section('content')
    <!-- Page Content  -->
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Customer</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('customers.index') }}"class="breadcrumb-link">Customer List</a></li>
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
                <h4 class="card-header">Add Customer</h4>
                <div class="card-body">
                    <div id="resultMessage" style="font-size:18px;color:red;"></div>
                        <form id="addcustomer" method="post"
                            action="{{ route('customers.update', $customers->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col">
                                    <label for="fname">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{$customers->name}}" class="form-control" placeholder="Enter your name" >
                                </div>
                                <div class="col">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" value="{{$customers->email}}" class="form-control" onkeyup="checkEmail(event.target.value)" placeholder="Enter your Email">
                                </div>
                                <div class="col">
                                    <label for="number">Number<span class="text-danger">*</span></label>
                                    <input type="text" name="number" id="number" value="{{$customers->phonenumber}}" class="form-control" placeholder="Enter your Number"  onkeyup="checknumber(event.target.value)">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="premiumamount">Premium Amount<span class="text-danger">*</span></label>
                                    <input type="text" name="premiumamount" id="premiumamount" value="{{$customers->premiumamount}}" class="form-control" onkeyup="checkEmail(event.target.value)" placeholder="Enter your Premium Amount">
                                </div>
                                <div class="col">
                                    <label for="gstpercent">GST Percent<span class="text-danger">*</span></label>
                                    <input type="text" name="gstpercent" id="gstpercent"  class="form-control" placeholder="Enter your GST in %" value="18" oninput="checkgstpercent(this.value)" readonly>
                                </div>
                                <div class="col">
                                    <label for="gstamount">GST Amount<span class="text-danger">*</span></label>
                                    <input type="text" name="gstamount" id="gstamount" value="{{$customers->gstamount}}" class="form-control" placeholder="Enter your GST Amount" readonly>
                                </div>
                            </div>
                            <div class="row mt-4 ">
                                <div class=" col form-group">
                                    <label for="totalpremiumamount">Total Premium Amount<span class="text-danger">*</span></label>
                                    <input type="text" name="totalpremiumamount" id="totalpremiumamount" value="{{$customers->totalpremiumcollected}}" class="form-control" placeholder="Enter your Total Premium Amount" readonly>
                                </div>
                            </div> 
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4 mb-4">
                                <button class="btn btn-primary" id="submitBtn" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Main Section End -->
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to the input fields
            var premiumAmountInput = document.getElementById('premiumamount');
            var gstPercentInput = document.getElementById('gstpercent');
            var gstAmountInput = document.getElementById('gstamount');
            var totalPremiumAmountInput = document.getElementById('totalpremiumamount');

            // Set default GST percentage
            var defaultGstPercent = parseFloat(gstPercentInput.value) || 18;

            // Function to calculate GST amount and total premium amount
            function calculateTotals() {
                // Parse input values as floats, default to 0 if not a number
                var premiumAmount = parseFloat(premiumAmountInput.value) || 0;
                var gstPercent = parseFloat(gstPercentInput.value) || defaultGstPercent;

                // Calculate GST amount and total premium amount
                var gstAmount = (premiumAmount * gstPercent) / 100;
                var totalPremiumAmount = premiumAmount + gstAmount;

                // Update the GST amount and total premium amount fields
                gstAmountInput.value = gstAmount.toFixed(2) || '';
                totalPremiumAmountInput.value = totalPremiumAmount.toFixed(2) || '';
            }

            // Add event listener to the premium amount and GST percentage input fields
            premiumAmountInput.addEventListener('input', calculateTotals);
            gstPercentInput.addEventListener('input', calculateTotals);

            // Initial calculation in case there's already a value in the premium amount field
            calculateTotals();
        });
        //jquery validation
        $(document).ready(function($) {
                // Firstname
                 $.validator.addMethod("customName", function(value, element) {
                    return this.optional(element) || /^[^\s][\s\S]{0,24}$/.test(value);;
                },
                "Please enter a valid name. Spaces are allowed only within the name, and it should not exceed 25 characters."
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
                // PremiumAmount
                $.validator.addMethod("custompremiumamount", function(value, element) {
                    var premiumamountRegex = /^\d{1,9}$/;
                    // Checking if the entered value matches the pattern
                    return this.optional(element) || premiumamountRegex.test(value);
                }, "Please enter a valid premium amount.");
                // gstpercent
                $.validator.addMethod("customgstpercent", function(value, element) {
                    // Regular expression pattern for phone number validation
                    var gstpercentRegex = /^\d{1,3}$/;
                    // Checking if the entered value matches the pattern
                    return this.optional(element) || gstpercentRegex.test(value);
                }, "Please enter a valid GST percent.");
                $("#addcustomer").validate({
                    rules: {
                        name: {
                            required: true,
                            customName: true
                        },
                        email: {
                            required: true,
                            customEmail: true
                        },
                        number: {
                            required: true,
                            customPhone: true
                        },
                        premiumamount: {
                            required: true,
                            custompremiumamount: true
                        },
                        gstpercent: {
                            required: true,
                            customgstpercent: true
                        },


                    },
                    messages: {
                        name: {
                            required: "Please enter a name",
                            customName: "Please enter a valid name. No leading spaces are allowed, and the name must not exceed 25 characters."
                        },
                        email: {
                            required: "Please enter an email address",
                            customEmail: "Please enter a valid email address."
                        },
                        number: {
                            required: "Please enter a phone number",
                            customPhone: "Please enter a valid phone number."
                        },
                        premiumamount: {
                            required: "Please enter a Premium Amount",
                            custompremiumamount: "Please enter a valid premium amount."
                        },
                        gstpercent: {
                            required: "Please enter a GST percent",
                            customgstpercent: "Please enter a valid GST percent."
                        }

                    },
                    errorClass: "error", // Apply the 'error' class to error labels
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        });   
    </script>


@endsection
