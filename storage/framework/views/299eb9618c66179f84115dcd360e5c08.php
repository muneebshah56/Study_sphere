<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('admin.partials.footer_menu',['menu'=>$menu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="int_ml50  ml-5">
        <?php $__currentLoopData = \App\FooterMenu::where('parent_id',$menu->id)->orderBy('sort_order')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('admin.partials.footer_menu',['menu'=>$subMenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/menu/load_footer.blade.php ENDPATH**/ ?>