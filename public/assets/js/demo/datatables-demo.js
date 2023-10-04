// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable({
    // dom: 'Bfrtip', 
    lengthMenu: [
      [5, 10, 25, 50],
      ['5 rows', '10 rows', '25 rows', '50 rows']
    ],
    buttons: [
      'excel', 'print', 'pagelength',
    ]
  });
});
