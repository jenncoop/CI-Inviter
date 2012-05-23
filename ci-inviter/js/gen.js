$(document).ready(function() {   
 
//    $(':checkbox[name=select_all]').click (function () {
//      $(':checkbox[name=contact_list[]]').prop('checked', this.checked);
//    });
        var tog = false;
        $('#select_all').click(function() {
                $('input[type=checkbox]').attr('checked', !tog);
        tog = !tog;
        });

});

