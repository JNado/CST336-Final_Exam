<?php
    session_start();

    if (!isset($_SESSION['email'])){
      header("Location: login.html");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Final: Appointment Scheduler</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/simple-line-icons.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <style>

        </style>
    </head>
    <body>
        <div>
            <button id="logout" class="btn btn-danger" style="float: right">Logout</button>
        </div>
        
        <h1>Appointment Dashboard</h1>
        
        <br><br>
        
        <div>
            <h4>Invitation Link</h4>
            <p>https://c9-cst336-nadolna-jnado.c9users.io/Final/OutsideUser/?email='jnadolna@csumb.edu'</p>
        </div>
        
        <br><br>
        
        <div>
            <table width="100%" id="appointments">
                <tr>
                    <th>Appointment ID</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Duration</th>
                    <th>Booked By</th>
                    <th>
                        <button id="createApp" class="btn btn-primary" href="#timeModal" data-toggle="modal">Create Time Slot</button>
                        <button id="createMultiApp" class="btn btn-primary" href="#multiTimeModal" data-toggle="modal">+</button>
                    </th>
                </tr>
                <hr>
            </table>
        </div>
        
        <br><br>
        
        <div>
            <button id="showRubric" class="btn btn-dark" href="#rubricModal" data-toggle="modal">Show Rubric</button>
        </div>
        
        <div class="modal fade" id="timeModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="titleM" class="modal-title">Create Time Slot</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <p id="omD">
                            Date: <input type="text" id="date" placeholder="YYYY/MM/DD"><br>
                            Start Time: <input type="text" id="startTime" placeholder="--:-- AM/PM"/><br>
                            Duration: <input type="text" id="duration" placeholder="(0 - 24)"/><br>
                            <button class="btn btn-primary" type="button" id="addApp" style="float: right">Add</button>
                        </p>
                    </div>
                    
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="titleM" class="modal-title">Delete Time Slot: Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <p id="omD">
                            Appointment ID: <h2 id="date-id"></h2><br>
                            Date: <h2 id="date-date"></h2><br>
                            Start Time: <h2 id="date-time"></h2><br>
                            Duration: <h2 id="date-duration"></h2><br>
                            <button class="btn btn-danger" type="button" id="deleteApp" style="float: right">Delete</button>
                        </p>
                    </div>
                    
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="multiTimeModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="titleM" class="modal-title">Create Multiple Time Slots</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <p id="omD">
                            Date: <input type="text" id="multi-date" placeholder="YYYY/MM/DD"><br>
                            Days of Iteration: <input type="text" id="multi-iteration" placeholder="(0-30)"><br>
                            Start Time: <input type="text" id="multi-startTime" placeholder="--:-- AM/PM"/><br>
                            Duration: <input type="text" id="multi-duration" placeholder="(0 - 24)"/><br>
                            <p>
                                An appointment time slot will be created starting at the indicated Start Time for the Duration
                                indicated and will be scheduled starting on the Date and for Days of Iteration afterwards.
                            </p>
                            <button class="btn btn-primary" type="button" id="addMultiApp" style="float: right">Add</button>
                        </p>
                    </div>
                    
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="rubricModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="titleM" class="modal-title">Rubric</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <p id="omD">
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th style="text-align:left">#</th>
                                        <th style="text-align:left">Task Description</th>
                                        <th style="text-align:left">Points</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align:left">1</td>
                                        <td style="text-align:left"><font color="green">You provide a ERD diagram representing the data and its relationships. This may be included in Cloud9 as a picture or from a designer tool</font></td>
                                        <td style="text-align:left">10</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">2</td>
                                        <td style="text-align:left"><font color="green">Tables in MySQL match the ERD and support the requirements of the application</font></td>
                                        <td style="text-align:left">20</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">3</td>
                                        <td style="text-align:left"><font color="green">The list of available appointments is pulled from MySQL using the API endpoint and displayed using the specified page design</font></td>
                                        <td style="text-align:left">20</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">4</td>
                                        <td style="text-align:left"><font color="green">Available times with dates in the past do not show up in the Dashboard list</font></td>
                                        <td style="text-align:left">5</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">5</td>
                                        <td style="text-align:left"><font color="green">A user can add an available time slot to the MySQL using the API endpoint and displayed using the specified modal design</font></td>
                                        <td style="text-align:left">20</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">6</td>
                                        <td style="text-align:left"><font color="green">A user can remove an available time slot from MySQL using the API endpoint</font></td>
                                        <td style="text-align:left">15</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">7</td>
                                        <td style="text-align:left"><font color="green">The user confirms the removal using the specified modal design</font></td>
                                        <td style="text-align:left">10</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left"></td>
                                        <td style="text-align:left">TOTAL</td>
                                        <td style="text-align:left">100</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left"></td>
                                        <td style="text-align:left"><font color="green">This rubric is properly included AND UPDATED (BONUS)</font></td>
                                        <td style="text-align:left">2</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="green">Login works with a User table and BCrypt</font></td>
                                        <td style="text-align:left">20</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="red">Add Google Signin for app login</font></td>
                                        <td style="text-align:left">10</td>
                                        <td><img src="img/xmark.png" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="green">The app is deployed to Heroku</font></td>
                                        <td style="text-align:left">15</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="red">A banner file can be uploaded and displayed</font></td>
                                        <td style="text-align:left">20</td>
                                        <td><img src="img/xmark.png" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="green">The user can add multiple available time slots as specified</font></td>
                                        <td style="text-align:left">10</td>
                                        <td><img src="img/checkmark.jpg" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="red">In a separate page, you show the correct list of available time slots to the user who navigates to the correct invitation URL</font></td>
                                        <td style="text-align:left">10</td>
                                        <td><img src="img/xmark.png" height="10" width="10"/></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left">BD</td>
                                        <td style="text-align:left"><font color="red">You correctly implement booking of the appointement, including all side effects</font></td>
                                        <td style="text-align:left">30</td>
                                        <td><img src="img/xmark.png" height="10" width="10"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        
    </body>
    
    <script type="text/javascript">
    /*global $*/
    $("document").ready(function() {
        $.ajax({
            type: "POST",
            url: "api.php",
            dataType: "json",
            data: {
                'op' : '2'
            },
            success: function(data, status) {
                console.log(data);
                
                data.forEach(function(element) {
                    $("#appointments").append("<tr id=" + element.id +">" +
                                              "<td>" + element.id + "</td>" +
                                              "<td>" + element.date + "</td>" +
                                              "<td>" + element.start_time + "</td>" +
                                              "<td>" + element.duration + " hour(s) </td>" +
                                              "<td>" + element.booked_by + "</td>" +
                                              "<td><input href='#deleteModal' data-toggle='modal' class='btn btn-danger' type='button' data-id='" + element.id + "' name='deleteButton' value='Delete'/></td>" +
                                              "</tr>");
                    
                    $("input[name='deleteButton']").click(function() {
                        var holdId = $(this).attr("data-id");
                        
                        $("#date-id").html($("#" + holdId).find("td:eq(0)").text());
                        $("#date-date").html($("#" + holdId).find("td:eq(1)").text());
                        $("#date-time").html($("#" + holdId).find("td:eq(2)").text());
                        $("#date-duration").html($("#" + holdId).find("td:eq(3)").text());
                    });
                });
            },
            complete: function(data, status) {
                // console.log(status);
            }
        });
        
        $("#logout").on("click", function() {
            window.location = "logout.php";
        });
        
        $("#addApp").on("click", function() {
            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "text",
                data: {
                    'date': $("#date").val(),
                    'start_time': $("#startTime").val(),
                    'duration': $("#duration").val(),
                    'op' : '1'
                },
                success: function(data, status) {
                    console.log(data);
                    
                    alert("Time slot registered... Refreshing page");
                    
                    window.location.reload();
                },
                complete: function(data, status) {
                    // console.log(status);
                }
            });
        });
        
        $("#deleteApp").on("click", function() {
            removeAppointmentSlot($("#date-id").html());
            alert("Time slot removed... Refreshing page");
            
            window.location.reload();
        });
        
        $("#addMultiApp").on("click", function() {
            var timeArr = $("#multi-date").val().split("/");
            var day = parseInt(timeArr[2]);
            var iter = parseInt($("#multi-iteration").val());
            var i;
            
            for (i = 0; i < iter; i++) {
                var newDay = parseInt(timeArr[2]) + parseInt(i);
                var newMonth = timeArr[1];
                
                if (newDay > 30) {
                    newMonth++;
                    newDay -= 30;
                }
                var insertDate = timeArr[0] + "/" + newMonth + "/" + newDay;
                
                $.ajax({
                    type: "POST",
                    url: "api.php",
                    dataType: "text",
                    data: {
                        'date': insertDate,
                        'start_time': $("#multi-startTime").val(),
                        'duration': $("#multi-duration").val(),
                        'op' : '1'
                    },
                    success: function(data, status) {
                        console.log(data);
                    },
                    complete: function(data, status) {
                        // console.log(status);
                    }
                });
            }
            
            alert("Time slots created... Refreshing page");
            window.location.reload();
        });
    });
    
    function removeAppointmentSlot(id) {
        $.ajax({
            type: "POST",
            url: "api.php",
            dataType: "text",
            data: {
                'id' : id,
                'op' : '3'
            },
            success: function(data, status) {
                console.log(data);
            },
            complete: function(data, status) {
                // console.log(status);
            }
        });
    }
    </script>
</html>