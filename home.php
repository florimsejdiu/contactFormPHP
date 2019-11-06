<?php
require_once(__DIR__.'/query_runner.php');

session_start();


$query_runner = new QueryRunner();
$_SESSION["users"] = $query_runner->get_all_users();

?>

<html>
    <head>
        <title>Register</title>
        <style>
            body {
                padding: 50px;
            }
            table {
                border-collapse: collapse;
            }
            thead {
                font-weight: bold;
            }
            td {
                padding: 5px;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Data registered in database "contactForm_db"</h1>
        <?php if(isset($_SESSION["update_success"])) : ?>
        <span style="color: green"><?=$_SESSION["update_success"]?></span>
        <?php endif; ?>
        <table>
            <thead>
                <td>Id</td>
                <td>Name</td>
                <td>Surname</td>
                <td>Email</td>
                <td>Phonenumber</td>
                <td>Message</td>
                <td>Created At</td>
        
            </thead>
            <tbody>
                <?php foreach($_SESSION["users"] as $user) : ?>
                    <tr>
                        <td><?=$user["id"]?></td>
                        <td><?=$user["name"]?></td>
                        <td><?=$user["surname"]?></td>
                        <td><?=$user["email"]?></td>
                        <td><?=$user["phonenumber"]?></td>
                        <td><?=$user["message"]?></td>
                        <td><?=$user["created_at"]?></td>
                
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </body>
</html>
<?php

session_unset();
session_destroy();
?>