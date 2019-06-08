$(document).ready(function () {
        console.log('start!');
        $('#objectionsTbl').DataTable( {
        "searching": false,
        "serverSide": true,
        "processing": true,
        "method":"GET",
        "ajax": "/getObjections_json",
        "columns": [
            { "data": "user_name" },
            { "data": "announcement_number" },
            { "data": "block_number" },
            { "data": "create_date" },
            { "data": "action" },
        ]
        } );





        $('#problemsTbl').DataTable( {
            "searching": false,
            "serverSide": true,
            "processing": true,
            "method":"GET",
            "ajax": "/getProblems_json",
            "columns": [
                { "data": "user_name" },
                { "data": "announcement_number" },
                { "data": "short_report" },
                { "data": "create_date" },
                { "data": "action" },
            ]
            } );
        
});