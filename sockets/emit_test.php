<?php
include "vendor/autoload.php";
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db = new PDO('mysql:host=localhost;dbname=vote_system', 'root', '');
        $form_data = [
            'firstname' => $_POST['firstname'],
            'lastname'  => $_POST['lastname'],
            'email'     => $_POST['email'],
            'message'   => $_POST['message'],
         ];

         $sql = "INSERT INTO admins(firstname,lastname,email,message) VALUES(:firstname,:lastname,:email,:message)";
         $stmt = $db->prepare($sql);
         $stmt->execute([
            ':firstname' => $form_data['firstname'],
            ':lastname'  => $form_data['lastname'],
            ':email'     => $form_data['email'],
            ':message'   => $form_data['message'],
         ]);


        $version = new Version2X("http://localhost:3001");
        $client =  new Client($version);
        $client->initialize();
        $client->emit("new_order",$form_data);
        $client->close();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-signin" method="POST" action="">
                <div class="form-group">
                    <label for="#firstname">Firstname : </label>
                    <input type="text" id="firstname" name="firstname" class="form-control">
                </div>

                <div class="form-group">
                    <label for="#lastname">Lastname : </label>
                    <input type="text" id="lastname" name="lastname" class="form-control">
                </div>

                <div class="form-group">
                    <label for="#email">Email : </label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="#message">Message : </label>
                    <textarea name="message" id="message" class="form-control">
                    </textarea>
                </div>

                <button class="btn btn-primary" type="submit">Submit message</button>
            </form>
            </div> <!-- /container -->
        </body>
    </html>