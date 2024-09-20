<?php echo $__env->make('admin.partials.text-input',['name'=>'heading','label'=>__('te.heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.partials.textarea',['name'=>'sub_heading','label'=>__('te.sub-heading')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $options =[];
    foreach(\App\Admin::where('public',1)->limit(1000)->get() as $admin){
        $options[$admin->id] = $admin->user->name.' '.$admin->user->last_name;
    }
?>
<?php echo $__env->make('admin.partials.select-multiple',['name'=>'instructors','label'=>__('default.instructors'),'options'=>$options], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php /**PATH C:\xampp-8.1\htdocs\app\public\templates/edugrids/options/instructors/form.blade.php ENDPATH**/ ?>