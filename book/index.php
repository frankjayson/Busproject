<?php include(`server.php`);


//if user is not logged in, they cannot access this page
if (empty($_SESSION[`username`])){
    header(`location:login.html`);
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BUS BOOKING</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
        .myLink {display: none}
    </style>
</head>
<body class="w3-light-grey">

</body>
<div class="header">
    <h2> BOOKED MESSAGE PAGE </h2>
</div>
<div class="content">
    <?php if (isset($_SESSION[`success`])): ?>
        <div class="error success"></div>
        <h3>
            <?php
            echo $_SESSION[`succes`];
            unset($_SESSION[`succes`]);
            ?>
        </h3>
    <?php endif; ?>
    <?php if (isset($_SESSION['username'])): ?>
        <p> Welcome <strong><?php echo $_SESSION[`username`]; ?></strong></p>
        <p><a href="index.php?logout=`1`" style="color: red;">Book Now</a> </p>
    <?php endif; ?>




</div>


</body>
</html>