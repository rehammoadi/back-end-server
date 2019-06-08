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

            $('#usersRequestsTbl').DataTable( {
                "searching": false,
                "serverSide": true,
                "processing": true,
                "method":"GET",
                "ajax": "/users_requests_json",
                "columns": [
                    { "data": "full_name" },
                    { "data": "mespar_helka" },
                    { "data": "mespar_gosh" },
                    { "data": "size" },
                    { "data": "short_text" },
                    { "data": "created_at" },
                    { "data": "action" },
                ]
                } );
        
                //appUsersListTbl
                $('#appUsersListTbl').DataTable( {
                    "searching": false,
                    "serverSide": true,
                    "processing": true,
                    "method":"GET",
                    "ajax": "/app_users_list_json",
                    "columns": [
                        { "data": "full_name" },
                        { "data": "email" },
                        { "data": "phone" },
                        { "data": "username" },
                        { "data": "active" },
                        { "data": "created_at" },
                        { "data": "action" },
                        /*
                         <th>שם מלא</th>
                                      <th>דוא״ל</th>
                                      <th>מספר טלפון</th>
                                      <th>שם משתמש</th>
                                      <th>פעיל/לא פעיל</th>
                                      <th>תאריך הרשמה</th>
                                      <th>פרטים נוספים</th>
                        */
                    ]
                    } );

                    //
                    //listOfAnnouncementTbl
                $('#listOfAnnouncementTbl').DataTable( {
                    "searching": false,
                    "serverSide": true,
                    "processing": true,
                    "method":"GET",
                    "ajax": "/list_announcement_json",
                    "columns": [
                        { "data": "title" },
                        { "data": "mespar_tokhnet" },
                        { "data": "area" },
                        { "data": "block_number" },
                        { "data": "helka" },
                        { "data": "created_at" },
                        { "data": "user_created" },
                        { "data": "action" },
                        /*
                       <th>כותרת</th>
                                    <th>מספר תוכנית</th>
                                    <th>איזור</th>
                                    <th>מספר גוש</th>
                                    <th>חלקה</th>
                                    <th>תאריך יצירה</th>
                                    <th>יוצר על ידי</th>
                                    <th>פרטים נוספים</th>
                        */
                    ]
                    } );
});