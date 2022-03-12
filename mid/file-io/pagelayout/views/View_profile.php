<!DOCTYPE html>
<html lang="en">

<head>

    <title>Profile</title>
</head>

<body>   
    <?php

    require 'Dashboard.php';

    function userInfo($data)
    {
        if (file_exists("../model/Data.json")) 
{
            include 'include_usernamein_profiledetails.php';
            $current_data = file_get_contents("../model/Data.json");

            $current_data = json_decode($current_data, true);
            foreach ($current_data as $row) {
                if ($_SESSION['username'] === $row['username']) {
                    $d_data = array(
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'username' => $row['username'],
                        'gender' => $row['gender'],
                        'dob' => $row['dob'],
                        'phone' => $row['phone'],
                        'preadd' => $row['preadd'],
                        'religion' => $row['religion'],
                    );
                    return $d_data;
                }
            }
        }
    }
    $data = file_get_contents("../model/Data.json");
    $data = json_decode($data, true);
    $name = "";

    $user = userInfo($name);

    echo "UserName            : ";
    echo $user['username'];
    echo "<br>";
    echo "User's Full Name           : ";
    echo $user['name'];
    echo "<br>";
    echo "User Email          : ";
    echo $user['email'];
    echo "<br>";
    echo "User Gender         : ";
    echo $user['gender'];
    echo "<br>";
    echo "User Date of Birth  : ";
    echo $user['dob'];
    echo "<br>";
    echo "User Phone Number   : ";
    echo $user['phone'];
    echo "<br>";
    echo "User Current Address: ";
    echo $user['preadd'];
    echo "<br>";
    echo "User Religion       : ";
    echo $user['religion'];
    echo "<br>";
    ?>

</body>

</html>