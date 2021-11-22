<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<title><?php echo $__env->yieldContent('title'); ?> | Office Leads Extractor</title>
	

	  
	<!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/fonts/fontawesome/css/fontawesome-all.css')); ?>">
    
	<!-- custom css -->
	  <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
	  
    <!-- jquery 3.3.1 -->
    <script src="<?php echo e(asset('vendor/jquery/jquery-3.3.1.min.js')); ?>"></script>
	 <!-- bootstrap bundle js -->
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.js')); ?>"></script>
	
	<!--AutoComplete --> 
    <link href="<?php echo e(asset('css/flexselect.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/liquidmetal.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.flexselect.js')); ?>"></script>
	
	<!-- custom js -->
	<script src="<?php echo e(asset('js/helpers.js').'?ver='.rand(56,99999)); ?>"></script>
	<script src="<?php echo e(asset('js/mmm.js').'?ver='.rand(56,99999)); ?>"></script>
	
	<!--SweetAlert--> 
    <link href="<?php echo e(asset('lib/sweet-alert/sweetalert2.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('lib/sweet-alert/sweetalert2.js')); ?>"></script>
	
	<?php echo $__env->yieldContent('styles'); ?>
	<?php echo $__env->yieldContent('scripts'); ?>
</head>

<body>

<div class="container-fluid">
  <!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 

                 <?php if($pop != "" && $val != ""): ?>
                   <?php echo $__env->make('session-status',['pop' => $pop, 'val' => $val], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <?php endif; ?>
        	<!--------- Input errors -------------->
                    <?php if(count($errors) > 0): ?>
                          <?php echo $__env->make('input-errors', ['errors'=>$errors], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <?php endif; ?> 
				<?php echo $__env->yieldContent('content'); ?>

</div>
</body>
 
</html>
<?php /**PATH C:\bkupp\lokl\repo\office-leads-extractor\resources\views/layout.blade.php ENDPATH**/ ?>