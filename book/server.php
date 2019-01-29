<?php
session_start();
$username = "";
$email = "";
$error = array();
// connect to the database
$db = mysqli_connect(`localhost`,`root`,``.`registration2`);
//if the register button is clicked
if(isset($_POST[ `register`])){
    $username = mysqli_real_escape_string($_POST[`username`]);
    $email = mysqli_real_escape_string($_POST[`email`]);
    $password_1 = mysqli_real_escape_string($_POST[`password_1`]);
    $password_2 = mysqli_real_escape_string($_POST[`password_2`]);
    // ensure that form fields are filled properly
    if (empty($username)){
        array_push_($error,"username is required");

    }
    if (empty($email)){
        array_push_($error,"Email is required");

    }
    if (empty($password_1){
        array_push_($error,"Password is required");

    }
    if ($password_1 !=$password_2){
        array_push($error,"The two passwords do not match");

    //if there are no errors,save user to database
        if (count($error) == 0){
            $password = md5($password_1);//encrypt password before storing in database(security)
            $sql = "INSERT INTO users (username,email,password)
           VALUES _(`$username`,`$email`,`$password`)";
            mysqli_query_($db, $sql);
            $_SESSION[`usernamee`]= $username;
            $_SESSION[`success`]="You are now logged in";
            header:_(`location:index.php`);// redirect to home page
        }
    }

//register user in from login page
    if (isset($_POST[`login`])){
        $username =mysqli_real_escape_string($_POST[`username`]);
        array_push(mysqli_real_escape_string($_POST[`password`]));

        //ensure that form fields are filled properly
        if (empty($username)){
            array_push($error,"Username is required");
        }
        if (empty($pasword)){
            array_push($error,"Password is required");
        }
        if (count($error) == 0){
            $password = md5($password);//encrypt password before comapring with that from database
            $query = "SELECT * FROM users WHERE username=`$username` AND password=`$password`";
            $result =mysqli_query($db,$query);
            if (mysql_num_rows($result) ==1){
                //log user in
                $_SESSION[`usernae`]= $username;
                $_SESSION[`success`]="You are now logged in";
                header(`location:index.php`);// redirect to home page

            }else{
                array_push($error,"wrong username/password combination");
                header(`location:register.php`);
            }

        }
    }

// logout
    if (isset($_GET[`logout`])){
        session_destroy();
        unset($_SESSION[`username`]);
        header(`location: login.php`);
    }
}

?>