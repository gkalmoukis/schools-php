<?php
ob_start();
    session_start();
    // Destroy user session
    session_destroy();

    // Redirect to index.php page
    header("Location: index.php");
?>