import $ from 'jquery';
window.$ = $;
import 'bootstrap';
import 'datatables.net-responsive-bs5';
// import 'datatables.net-responsive-jqui';


//Initalizing toaster
$(document).ready(function() {

    $('.toast').show('toast');
    setTimeout(function(){
        $('.toast').hide('toast');
    }, 3580);
    
});
//Initalizing datatable
// $(document).ready(function() {
//     $('#datatable').DataTable({
//         responsive: true,
//     });
// });