<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="socket.js"></script>
    </head>
    <body>
        <script>
                var socket = io.connect("http://localhost:3001");
                    socket.on("new_order",function (data){
                   $('#data').prepend("<tr><td>" + data.firstname + "</td><td>" + data.lastname + "</td> <td>" + data.email + "</td> <td>" + data.message + "</td></tr>");
                });
        </script>

        <body>
        <div class="container">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody id="data">
                </tbody>
            </table>
        </div> <!-- /container -->
    </body>
</html>