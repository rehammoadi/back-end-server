
function get_noti(){
    // var feedback = $.ajax({
    //     type: "POST",
    //     url: "feedback.php",
    //     async: false
    // }).success(function(){
    //     setTimeout(function(){get_fb();}, 10000);
    // }).responseText;

    // $('div.feedback-box').html(feedback);
    console.log("work last 7 noti");//last 7 noti
}

$(document).ready(function () {


    // setInterval(
    //     function(){
    //         get_noti();
    //     }, 3000);



        console.log('start!');

        //רשימת עובדים
        $('#workerListTbl').DataTable( {
            "searching": false,
            "serverSide": true,
            "processing": true,
            "method":"GET",
            "ajax": "/worker_list_json",
            "columns": [
                { "data": "name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "level" },
                { "data": "created_date" },
                { "data": "action" },
            ]
            } );





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
            { "data": "processed" },
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
                { "data": "status" },
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
                    { "data": "user_ID" },
                    { "data": "mespar_helka" },
                    { "data": "mespar_gosh" },
                    { "data": "size" },
                    { "data": "short_text" },
                    { "data": "created_at" },
                    { "data": "action" },
                    { "data": "req_status" },
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


                    if($("#status_of_req").length>0){
                        $("input:checkbox").change(function() { 
                            if($(this).is(":checked")) { 
                                $.ajax({
                                    url: '/update_request_details',
                                    type: 'post',
                                    data: { "_token": $("#_token").val(),req_id:$("#req_id").val(), strState:"1" }
                                });
                                    
                                $("#status_text").text("טופל");

                            } else {
                                $.ajax({
                                    url: '/update_request_details',
                                    type: 'post',
                                    data: { 
                                          "_token": $("#_token").val(),
                                          req_id:$("#req_id").val(),
                                          strState:"0"
                                         }
                                });

                                $("#status_text").text("לא טופל");
                            }
                        }); 
                    }


                    //
                    function objectionHahlata(){
       
  
                        var hahlata  = $("#hahlata").val();
                        var id = $("#idObj").val();
                        console.log(hahlata,id);
                             $.ajax({
                               headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                               type: "POST",
                               url: "/objection_hahlata",
                               data:{
               
                                 "id":id,
                                 "hahlata":hahlata
                                 },
                               async: false,
                               success:function(data){
                            
                               if(data.status == true){
                                 $('.tobalText').text('טופל');
                                 $('.tobalText').css('color','green');
                                 $('.tobalText').css('font-size','18px');
                                 $('.tobalText').css('font-weight','700');
                                //type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
               
                               
                                 $.notify({
                                       icon: "add_alert",
                                       message: "הערעור התעדכן וטופל"
               
                                     }, {
                                       type: 'success',
                                       timer: 3000,
                                       placement: {
                                         from: 'bottom',
                                         align: 'center'
                                       }
                                     });
                               }
                             }
                                });
               
                               
                       }

                       //

                      
                      function objectionTobal(id){
              
                       
                            $.ajax({
                              headers: {
                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                               },
                              type: "POST",
                              url: "/objectionProcessed",
                              data:{id},
                              async: false,
                              success:function(data){
                           
                                    if(data.status == true){
                                                $('.tobalText').text('טופל');
                                                $('.tobalText').css('color','green');
                                                $('.tobalText').css('font-size','18px');
                                                $('.tobalText').css('font-weight','700');
                                            //type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
                    
                                    
                                                $.notify({
                                                    icon: "add_alert",
                                                    message: "הערעור התעדכן וטופל"
                            
                                                    }, {
                                                    type: 'success',
                                                    timer: 3000,
                                                    placement: {
                                                        from: 'bottom',
                                                        align: 'center'
                                                    }
                                                    });
                                            }//
                            }
                               });
              
                              
                      }
                            //update hahlata button
                      $("#objectionHahlata").on("click",function(){
                        objectionHahlata();
                      });


                        //objectionProcessed
                      if($("#status_of_obj").length>0){
                        
                        $("input:checkbox").change(function() { 
                            if($(this).is(":checked")) { 
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: "/objectionProcessed",
                                    data: { 
                                        obj_id:$("#idObj").val(),
                                        strState:"1" 
                                    },  
                                        success:function(data){
                           
                                            if(data.status == true){
                                                        $('.tobalText').text('טופל');
                                                        $('.tobalText').css('color','green');
                                                        $('.tobalText').css('font-size','18px');
                                                        $('.tobalText').css('font-weight','700');
                                                    //type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
                            
                                            
                                                        $.notify({
                                                            icon: "add_alert",
                                                            message: "הערעור התעדכן וטופל"
                                    
                                                            }, {
                                                            type: 'success',
                                                            timer: 3000,
                                                            placement: {
                                                                from: 'bottom',
                                                                align: 'center'
                                                            }
                                                            });
                                                    }//
                                    }
                                });

                            } else {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                     url: "/objectionProcessed",
                                    data: { 
                                          
                                          obj_id:$("#idObj").val(),
                                          strState:"0"
                                         },
                                         success:function(data){
                           
                                            if(data.status == true){
                                                        $('.tobalText').text('לא טופל');
                                                        $('.tobalText').css('color','green');
                                                        $('.tobalText').css('font-size','18px');
                                                        $('.tobalText').css('font-weight','700');
                                                    //type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];
                            
                                            
                                                        $.notify({
                                                            icon: "add_alert",
                                                            message: "לא טופל"
                                    
                                                            }, {
                                                            type: 'success',
                                                            timer: 3000,
                                                            placement: {
                                                                from: 'bottom',
                                                                align: 'center'
                                                            }
                                                            });
                                                    }//
                                    }
                                });

                                $("#status_text").text("לא טופל");
                            }
                        }); 
                    }
                 
});