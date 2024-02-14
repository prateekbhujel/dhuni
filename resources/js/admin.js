import $ from 'jquery';
window.$ = $;
import 'bootstrap';
// import 'datatables.net-responsive-bs5';

//Toaster Message show.
$(document).ready(function() {

    $('.toast').show('toast');
    setTimeout(function(){
        $('.toast').hide('toast');
    }, 3580);

    $('.delete').on('click', function(e){
        e.preventDefault();

        if(confirm("Are you Sure You Want to Delete This Record !??")) {
            $(this).parent().submit();
        }
    });
    
});

// // Initalizing datatable
// $(document).ready(function() {
//     $('#datatable').DataTable({
//         responsive: true,
//     });
// });