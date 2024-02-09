import $ from 'jquery';
window.$ = $;
import 'bootstrap';


import 'datatables.net-responsive-bs5';
// import 'datatables.net-responsive-jqui';

$(document).ready(function() {
    $('#dt').DataTable({
        responsive: true,
    });
});