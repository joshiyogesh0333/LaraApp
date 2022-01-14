@extends('layouts/contentLayoutMaster')

@section('title', 'Permission Master')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">
@endsection

@section('content')
<pre style="display: none;">
<?php print_r($data); ?>
</pre>

<section class="master-item-demo invoice-add-wrapper">
  <div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
      <div class="card invoice-preview-card">
        <div class="card-body invoice-padding invoice-product-details">
          <h1>Permission List</h1>
          <form id="source-item" class="source-item">
            <div>
              <div class="repeater-wrapper repeater-item" style="margin-bottom: 0px !important;">
                <div class="row">
                  <?php
                  if(empty($data))
                  { ?>
                    <div class="col-md-3 d-flex product-details-border position-relative pr-0">
                    <div class="row w-100 pr-lg-0 pr-1 py-2" style="padding: 0 !important;">
                      <div class="col-lg-12 col-12"
                        style="padding: 0 !important;padding-right: 13px !important;">
                        <input type="text" name="permission[]" class="form-control master_value_item" value="" placeholder="" />
                      </div>
                    </div>
                    <div
                      class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25"
                      style="width: 20%;">
                      <i data-feather="x" data-role-id="" class="cursor-pointer font-medium-3 repeater-delete"></i>
                    </div>
                  </div>
                  <?php
                  }
                  else
                  {
                  foreach($data as $key => $value)
                  {

                    $id = $value['id'];
                    $role = $value['name'];
?>
                  <div class="col-md-3 d-flex product-details-border position-relative pr-0">
                    <div class="row w-100 pr-lg-0 pr-1 py-2" style="padding: 0 !important;">
                      <div class="col-lg-12 col-12"
                        style="padding: 0 !important;padding-right: 13px !important;">
                        <input type="text" name="permission[]" class="form-control master_value_item" data-role-id="<?=$id?>" value="<?=$role?>" placeholder="<?=$role?>" />
                      </div>
                    </div>
                    <div
                      class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25"
                      style="width: 20%;">
                      <i data-feather="x" data-role-id="<?=$id?>" class="cursor-pointer font-medium-3 repeater-delete"></i>
                    </div>
                  </div>

                  <?php }} ?>
                </div>
              </div>
            </div>
            <div class="row mt-1">
              <div class="col-12 px-0">
                <button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
                  <i data-feather="plus" class="mr-25"></i>
                  <span class="align-middle">Add Item</span>
                </button>
                <button type="button" class="btn btn-primary btn-sm btn-save-item" data-repeater-create>
                  <i data-feather="save" class="mr-25"></i>
                  <span class="align-middle">Save Item</span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- <div class="d-flex remove-master-item flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25" style="width: 20%;">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer font-medium-3"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
    </div> --}}
  </div>
</section>




<div class="all-master-items">

</div>

@endsection

@section('vendor-script')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
<script>



  jQuery(document).on('click',"button.btn.btn-primary.btn-add-new",function(e)
  {
    jQuery("button.btn.btn-primary.btn-add-new").parents('form.source-item').find('.repeater-wrapper.repeater-item .col-md-3.d-flex.product-details-border.position-relative.pr-0').last().clone().insertAfter(jQuery(this).parents('form.source-item').find('.repeater-wrapper.repeater-item .col-md-3.d-flex.product-details-border.position-relative.pr-0').last());
  });



  jQuery("button.btn.btn-primary.btn-save-item").click(function (e) {

    var form = jQuery(this).parents('form').first();
    var formdata = new FormData();
    // var master_item_name = jQuery(form).find('input.master_key').first().val();
    var master_value_item = [];
    jQuery('form#source-item input.form-control.master_value_item').each(function(){
        master_value_item.push(jQuery(this).val());
    });

    console.log(master_value_item);


    formdata.append("permission_list",master_value_item);
    // formdata.append("master_item_name", master_item_name);
    formdata.append("_token", "{{ csrf_token() }}");


    jQuery.ajax({
      type: 'POST',
      url: '/user/add_permission',
      traditional: true,
      processData: false,
      contentType: false,
      data: formdata,
      success: function (response) {
        console.log(response);

        Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: 'Module Save Successfully',
        showConfirmButton: false,
        timer: 1500,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });


      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
              Swal.fire({
        title: 'Error!',
        text: ' somthing want to wrong, please Try again',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });

      }
    });
  });


  jQuery(document).on('click','svg.repeater-delete',function(){
    var form = jQuery(this).parents('form.source-item').first();
    jQuery(this).parents('.col-md-3.d-flex.product-details-border.position-relative.pr-0').first().remove();
});



</script>


@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
<script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
<script>
  jQuery('li.nav-item.module_permission').addClass('active');
  </script>
@endsection
