<?php
    session_start();
    $_SESSION['username'] = 'shreyas';
    $_SESSION['authuser'] = 1;
?>


<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php
    echo 'Zakumi goes live for ';
    echo FAVPLAYER;
?>

<?php include 'templates/pagebottom.php' ?>