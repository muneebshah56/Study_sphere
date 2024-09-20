<!DOCTYPE html><html  <?php echo e(langMeta()); ?>>

<head>
    <title><?php echo e(__lang('report-card')); ?></title>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <style>
        * { font-family: DejaVu Sans, sans-serif; }
    </style>

    <!-- END STYLESHEETS -->

    <style>
        .fadedtext{
            font-size: 8px;
            color: #d9d9d9;
        }
        .table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .table td, .table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr:hover {background-color: #ddd;}

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>



</head>


<body>
<div class="container">
    <div style="text-align: center">
    <?php $logo = setting('image_logo'); if(!empty($logo)): ?>
    <img style="max-height: 100px" class="img-responsive" src="<?php echo e(asset($logo)); ?>">
    <?php endif;  ?>
    </div>
    <h1 style="text-align: center;"><?php echo e(setting('general_site_name')); ?></h1>

    <h2 style="text-align: center"><?php echo e(__lang('student')); ?> <?php echo e(__lang('report-card')); ?></h2>
    <table class="table table-striped">
        <tr>
            <td><?php echo e(__lang('student')); ?></td>
            <td><?php echo e($student->user->name); ?> <?php echo e($student->user->last_name); ?></td>
        </tr>
        <tr>
            <td>
                <?php echo e(__lang('session-course')); ?>:
            </td>
            <td>
                <?php echo e($session->name); ?>

            </td>
        </tr>
    </table>

    <h4><?php echo e(strtoupper(__lang('results'))); ?></h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th><?php echo e(__lang('test')); ?></th>
            <th><?php echo e(__lang('passmark')); ?></th>
            <th><?php echo e(__lang('score')); ?></th>
            <th><?php echo e(__lang('grade')); ?></th>
            <th><?php echo e(__lang('status')); ?></th>
        </tr>
        </thead>
        <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($test->name); ?></td>
                <td><?php echo e($test->passmark); ?>%</td>
                <td>     <?php  $result =$test->studentTests()->where('student_id',$student->id)->orderBy('score','desc')->first()  ?>
                    <?php if($result): ?>
                        <?php echo e(round($result->score,1)); ?>%
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($result): ?>
                    <?php echo e($testGradeTable->getGrade($result->score)); ?>

                    <?php endif; ?>

                </td>
                <td>
                    <?php if($result && $result->score >= $test->passmark): ?>
                        <span style="color: green"><?php echo e(__lang('passed')); ?></span>
                        <?php else: ?>
                        <span style="color: red"><?php echo e(__lang('failed')); ?></span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <h4>Total</h4>
    <table class="table table-striped">
        <?php  $stats = $controller->getStudentTestsStats($student->id);  ?>
        <tr>
            <td style="width: 30%;"><?php echo e(__lang('average-score')); ?>:</td>
            <td><?php echo e(round($stats['average'],1)); ?>%</td>
        </tr>
        <tr>
            <td><?php echo e(__lang('average-grade')); ?>:</td>
            <td><?php echo e($testGradeTable->getGrade($stats['average'])); ?></td>
        </tr>
    </table>

</div>

</body>

</html>

<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/report/reportcard.blade.php ENDPATH**/ ?>