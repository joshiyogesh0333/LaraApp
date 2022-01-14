{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<script>
    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generateString(length = 10) {  
    let result = ' ';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}
    document.addEventListener('readystatechange', event => {

// When HTML/DOM elements are ready:
if (event.target.readyState === "interactive") {   //does same as:  ..addEventListener("DOMContentLoaded"..

}

console.log('status',"{{ session('status') }}");
console.log('massege',"{{ session('massege') }}");

@if(session('status') == 'true' || session('status') == true || session('status') == 1 || session('status') == "1")
    @if(session('massege'))
        
        Swal.fire({
            position: 'bottom-end',
            icon: 'info',
            title: "{{ session('massege') }}",
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        });
    @endif
@endif

@if(session('status') == 'false' || session('status') == false || session('status') == 0 || session('status') == "0")
    @if(session('massege'))
        Swal.fire({
            title: '',
            html: "{{ session('massege') }}",
            icon: 'info',
            timer: 3000,
            customClass: {
            confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        });
    @endif
@endif

// When window loaded ( external resources are loaded too- `css`,`src`, etc...)
if (event.target.readyState === "complete") {
    jQuery('.form-group select').trigger('change');
    jQuery('button#submit').click(function(){
        jQuery(this).css('display','none');
        var html = '<button class="anuconst_loader btn btn-outline-primary waves-effect" type="button" disabled=""><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="ml-25 align-middle">Loading...</span></button>';
        jQuery(html).insertAfter(jQuery(this));
        setTimeout(function(){jQuery('.anuconst_loader').remove();jQuery('button#submit').show();},6000);
    });
}
});

jQuery(document).on('click','.select2.select2-container',function(){
        if(jQuery(this).parents('.form-group').find('select option').length <= 1)
        {
            setTimeout(function(){
                jQuery('select').select2().trigger('change');
            },1500);

        }
    });

    jQuery(document).on('click','select',function(){
        if(jQuery(this).parents('.form-group').find('select option').length <= 1)
        {
            setTimeout(function(){
                jQuery('select').trigger('change');
            },1500);
        }
    });

    function Rs(amount) {
      var words = new Array();
      words[0] = 'Zero'; words[1] = 'One'; words[2] = 'Two'; words[3] = 'Three'; words[4] = 'Four'; words[5] = 'Five'; words[6] = 'Six'; words[7] = 'Seven'; words[8] = 'Eight'; words[9] = 'Nine'; words[10] = 'Ten'; words[11] = 'Eleven'; words[12] = 'Twelve'; words[13] = 'Thirteen'; words[14] = 'Fourteen'; words[15] = 'Fifteen'; words[16] = 'Sixteen'; words[17] = 'Seventeen'; words[18] = 'Eighteen'; words[19] = 'Nineteen'; words[20] = 'Twenty'; words[30] = 'Thirty'; words[40] = 'Forty'; words[50] = 'Fifty'; words[60] = 'Sixty'; words[70] = 'Seventy'; words[80] = 'Eighty'; words[90] = 'Ninety'; var op;
      amount = amount.toString();
      var atemp = amount.split('.');
      var number = atemp[0].split(',').join('');
      var n_length = number.length;
      var words_string = '';
      if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
          received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
          n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
          if (i == 0 || i == 2 || i == 4 || i == 7) {
            if (n_array[i] == 1) {
              n_array[j] = 10 + parseInt(n_array[j]);
              n_array[i] = 0;
            }
          }
        }
        value = '';
        for (var i = 0; i < 9; i++) {
          if (i == 0 || i == 2 || i == 4 || i == 7) {
            value = n_array[i] * 10;
          } else {
            value = n_array[i];
          }
          if (value != 0) {
            words_string += words[value] + ' ';
          }
          if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
            words_string += 'Crores ';
          }
          if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
            words_string += 'Lakhs ';
          }
          if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
            words_string += 'Thousand ';
          }
          if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
            words_string += 'Hundred and ';
          } else if (i == 6 && value != 0) {
            words_string += 'Hundred ';
          }
        }
        words_string = words_string.split(' ').join(' ');
      }
      return words_string; 
    }
  function RsPaise(n) {
      nums = n.toString().split('.')
      var whole = Rs(nums[0])
      if (nums[1] == null) nums[1] = 0;
      if (nums[1].length == 1) nums[1] = nums[1] + '0';
      if (nums[1].length > 2) { nums[1] = nums[1].substring(2, length - 1) }
      if (nums.length == 2) {
        if (nums[0] <= 9) { nums[0] = nums[0] * 10 } else { nums[0] = nums[0] };
        var fraction = Rs(nums[1])
        if (whole == '' && fraction == '') { op = 'Zero only'; }
        if (whole == '' && fraction != '') { op = 'Paise ' + fraction + ' only'; }
        if (whole != '' && fraction == '') { op = 'Indian Rupee ' + whole + ' only'; }
        if (whole != '' && fraction != '') { op = 'Indian Rupee ' + whole + 'and Paise ' + fraction + 'only'; }
      }
      return op;
    }



</script>
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
