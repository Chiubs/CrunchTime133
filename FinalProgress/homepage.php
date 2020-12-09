
<?php
//homepage.php
session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Time Crunch Planner</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>

$(document).ready(function() {
         var calendar = $('#calendar').fullCalendar({
                defaultView: 'month',
                editable:true,
                //header used to determine buttons in the header section
                header:{
                       left:'prev,next, today',
                       center:'title',
                       right:'month, agendaWeek, agendaDay, listWeek'
                 },
          //fullcalendar options and the php code for loading events, which will fetch them from our database
          events: 'load.php',
          selectable:true,
          selectHelper:true,

          select: function(start, end, timeGridWeek,timeGridDay){
                  var r = confirm("Add an event?"); //popup window to confirm event

                 if(r == true){
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD"); //the start date for our function
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD"); //the end date for our function

                        $.ajax({
                              url : "insert.php", //insert.php is used to create session variables we will use with our event form 
                              type:"POST",
                              data:{start:start, end:end}, //send data through POST
                              success:function()
                              {
                                    location.href = "eventForm.php"; //once variables are set, redirect to event form
                              }
                        })
                 }
           },

          editable:true, //editable, so we use fullcalendar's event editing functions
          eventResize:function(event){
                 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss"); //unlike in our add event function, these include time 
                 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                 var title = event.title; //title refers to the name of our event
                 var id = event.id;

                 $.ajax({
                        url:"update.php",
                        type:"POST",
                        data:{title:title, start:start, end:end, id:id},
                        success:function(){
                              calendar.fullCalendar('refetchEvents'); //calendar function for updating
                        }
                 })
          },

          eventDrop:function(event){
                 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                 var title = event.title;
                 var id = event.id;

                 $.ajax({
                        url:"update.php",
                        type:"POST",
                        data:{title:title, start:start, end:end, id:id},
                        success:function(){
                             calendar.fullCalendar('refetchEvents');
                        }
                 });
          },

          eventClick:function(event){
                 if(confirm("Would you like to delete this event?")){
                       var id = event.id;

                        $.ajax({
                               url:"delete.php",
                               type:"POST",
                               data:{id:id},
                               success:function(){
                                     calendar.fullCalendar('refetchEvents');
                                    }
                        })
                 }
          },
   });
});

  </script>
 </head>
 <body>
  <br />
  <h2 align="center"><a href="#">Time Crunch Planner</a></h2>
  <br />

  <button style="float: right;margin-right:200px;"onclick="window.location.href='logout.php';"> Logout </button> //logout button
  <div class="container">
   <div id="calendar"></div>
  </div>
 </body>
</html>
