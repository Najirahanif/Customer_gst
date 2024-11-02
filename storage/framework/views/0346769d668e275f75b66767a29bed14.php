<head>
    <style>

    #header { position: fixed; left: 0px; top: -60px; right: 0px; height: 150px; text-align: right; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; text-align: right;}
     #footer .page:after { content: counter(page, upper-roman); }

    .logo {
            max-width: 100px;
            max-height: 50px;
        }

        #post {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #post td,
        #post th {
            border: 1px solid #ddd;
            padding: 5px;
            font-size: 12px;
        }

        #post tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #post tr:hover {
            background-color: #ddd;
        }

        #post th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: #054c8a;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        .content-title {
            color: #054c8a;
        }
        .right-align {
            float: right;
            width: 7%;
        }
        .product-image {
            max-width: 50px;
            max-height: 50px;
            object-fit: cover;
        }
</style>

</head>
<div id="header">
<img src="" alt="Logo" loading="lazy" class="right-align">
    <h2 class="content-title card-title" style="float: left;">Employee Details</h2>
</div>
<table id="post" class="table">
    <tbody>
    <?php $i=1; ?>
        <tr>
            <th scope="row">#</th>
            <td class="text-center"><?php echo e($i); ?></td>
        </tr>
        <tr>
            <th scope="row">Firstname</th>
            <td class="text-center"><?php echo e(ucfirst(strtolower($employee->fname))); ?></td>
        </tr>
        <tr>
            <th scope="row">Lastname</th>
            <td class="text-center"><?php echo e(ucfirst($employee->lname)); ?></td>
        </tr>
        <tr>
            <th scope="row">Date of Birth</th>
            <td class="text-center"><?php echo e(ucfirst($employee->dob)); ?></td>
        </tr>
        <tr>
            <th scope="row">Email</th>
            <td class="text-center"><?php echo e(ucfirst($employee->email)); ?></td>
        </tr>
        <tr>
            <th scope="row">Number</th>
            <td class="text-center"><?php echo e(ucfirst($employee->number)); ?></td>
        </tr>
        <tr>
            <th scope="row">Nationality</th>
            <td class="text-center"><?php echo e(ucfirst($employee->nationality)); ?></td>
        </tr>
        <tr>
            <th scope="row">Date of Joining</th>
            <td class="text-center"><?php echo e(ucfirst($employee->dateofjoining)); ?></td>
        </tr>
        <tr>
            <th scope="row">Gender</th>
            <td class="text-center"><?php echo e(ucfirst($employee->gender)); ?></td>
        </tr>
        <tr>
            <th scope="row">Designation</th>
            <td class="text-center"><?php echo e(ucfirst($employee->designation)); ?></td>
        </tr>
        <tr>
            <th scope="row">Department</th>
            <td class="text-center"><?php echo e(ucfirst($employee->department)); ?></td>
        </tr>
        <tr>
            <th scope="row">Employee Status</th>
            <td class="text-center"><?php echo e(ucfirst($employee->status)); ?></td>
        </tr>
        <tr>
            <th scope="row">Previous Roles</th>
            <td class="text-center"><?php echo e(ucfirst($employee->previousrole)); ?></td>
        </tr>
        <tr>
            <th scope="row">Address</th>
            <td class="text-center"><?php echo e(ucfirst($employee->address)); ?></td>
        </tr>
        <tr>
            <th scope="row">Relationship</th>
            <td class="text-center"><?php echo e(ucfirst($employee->emergencyrelationship)); ?></td>
        </tr>
        <?php $i++; ?>
    </tbody>
</table>
<div id="footer">
    This is an auto-generated report from </a>
</div>

<script>
    <script type="text/php">
    if ( isset($pdf) ) {
        // OLD
        // $font = Font_Metrics::get_font("helvetica", "bold");
        // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(255,0,0));
        // v.0.7.0 and greater
        $x = 72;
        $y = 18;
        $text = "{PAGE_NUM} of {PAGE_COUNT}";
        $font = $fontMetrics->get_font("helvetica", "bold");
        $size = 6;
        $color = array(255,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
    </script>





<?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/employee/exportshow.blade.php ENDPATH**/ ?>