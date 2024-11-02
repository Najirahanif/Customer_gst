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
    <h2 class="content-title card-title" style="float: left;">Designation List</h2>
</div>
<table id="post" class="table">
    <thead>
        <tr>
            <th  scope="col" class="text-center">#</th>
            <th  scope="col" class="text-center">Name</th>
            <th  scope="col" class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td  scope="col" class="text-center"><?php echo e($i); ?></td>
                <td  scope="col" class="text-center"><?php echo e(ucfirst(strtolower($designation->name))); ?></td>
               <td scope="col" class="text-center"><?php echo e(ucfirst($designation->status)); ?></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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





<?php /**PATH E:\xampp\htdocs\hrm_app\resources\views/admin/designation/export.blade.php ENDPATH**/ ?>