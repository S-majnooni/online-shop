<?php include("action/if_admin.php"); ?> 

<?php 
    session_start();
    session_destroy();
    exit(header("location:../originalpage.php"));
?>