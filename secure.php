<?php
if($_SESSION['rights'] != 1){
 header('Location: login.php');
}
?>