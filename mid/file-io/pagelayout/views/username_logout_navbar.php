<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<p><i>Logged in as " . "<b>" .$_SESSION['username'] . "</b>" . "</i></P>";
} else {
    header("location:Login.php");
}
?>
<!-- <a href="Logout.php">Logout</a> -->