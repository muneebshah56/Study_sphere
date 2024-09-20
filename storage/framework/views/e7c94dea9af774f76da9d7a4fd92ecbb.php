
<div class="box mb-5" >
    <div class="box-head">
        <header><h4><?php echo e(__lang('slide')); ?> <strong>[num]</strong>  </h4></header>
    </div>
    <div class="box-body " class="slideroptions">


        <div class="form-group"  >

            <label for="slideshow_image[num]" class="control-label"><?php echo e(__lang('image')); ?></label><br />


            <div class="image"><img data-name="slideshow_image[num]" src="[no_image]" alt="" id="slideshow_thumb[num]" /><br />
                <input class="form-control" type="hidden" name="slideshow_image[num]" value="" id="slideshow_image[num]" />
                <a class="pointer" onclick="image_upload('slideshow_image[num]', 'slideshow_thumb[num]');"><?php echo e(__lang('Browse')); ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="pointer" onclick="$('#slideshow_thumb[num]').attr('src', '[no_image]'); $('#slideshow_image[num]').attr('value', '');"><?php echo e(__lang('Clear')); ?></a></div>

        </div>


    </div>





</div><!--end .box -->





<hr>

<?php /**PATH C:\xampp-8.1\htdocs\app\resources\views/admin/widget/forms/slideshow.blade.php ENDPATH**/ ?>