<?php 
include('includes/config.php');
if(isset($_GET['code']) && $_GET['code'] === 2){
   $query = $dbh->prepare("UPDATE tblbooking SET Status =2");
   $query->execute();
}
