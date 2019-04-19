$(document).ready(function () {
    
    $('#table_id').DataTable( {
        "serverSide": true,
        "processing": true,
        "method":"GET",
        "ajax": "/list_announcement_json",
        "columns": [

            { "data": "title" },
            { "data": "area" },
            { "data": "city" },
            { "data": "action" },
        ]
    } );



});