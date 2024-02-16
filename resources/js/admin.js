import 'bootstrap';
import jQuery from 'jquery';
window.$ = jQuery;
import 'summernote';
import Swal from 'sweetalert2';



$(document).ready(function() {
    
    // $('.editor').trumbowyg({
    //     // svgPath: route('front.pages.index') + '/node_modules/trumbowyg/dist/ui/icons.svg';
    // });

    $('.toast').show('toast');
    setTimeout(function(){
        $('.toast').hide('toast');
    }, 3580);

    $('.delete').on('click', function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent().submit();
            }
        });
    });

    $(document).ready(function () {
    
        $('#image').change(function () {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $('#avatarPreview').html('<img src="' + e.target.result + '" class="img-fluid" alt="Preview Image">');
                };
    
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#avatarPreview').html('');
            }
        });
    });

});
