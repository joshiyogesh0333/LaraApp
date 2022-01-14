<link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/vendors.min.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/ui/prism.min.css'))); ?>" />

<?php echo $__env->yieldContent('vendor-style'); ?>


<link rel="stylesheet" href="<?php echo e(asset(mix('css/core.css'))); ?>" />


<?php $configData = Helper::applClasses(); ?>


<?php if($configData['mainLayoutType'] === 'horizontal'): ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/core/menu/menu-types/horizontal-menu.css'))); ?>" />
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('css/base/core/menu/menu-types/vertical-menu.css'))); ?>" />
<!-- <link rel="stylesheet" href="<?php echo e(asset(mix('css/base/core/colors/palette-gradient.css'))); ?>"> -->


<?php echo $__env->yieldContent('page-style'); ?>


<link rel="stylesheet" href="<?php echo e(asset(mix('css/overrides.css'))); ?>" />



<?php if($configData['direction'] === 'rtl' && isset($configData['direction'])): ?>
<link rel="stylesheet" href="<?php echo e(asset(mix('css/custom-rtl.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('css/style-rtl.css'))); ?>" />
<?php endif; ?>


<link rel="stylesheet" href="<?php echo e(asset(mix('css/style.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/extensions/sweetalert2.min.css'))); ?>">


<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
      }

      /* Safari */
      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }

      @keyframes  spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      .swal2-icon.swal2-info {
          border-color: #3529af !important;
          color: #3529af !important;
      }
      a.btn {
      width: 100%;
      }
</style>
<?php /**PATH C:\xampp\htdocs\public_html\resources\views/panels/styles.blade.php ENDPATH**/ ?>