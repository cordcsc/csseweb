<?php

if(isset($_POST['register'])){

    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.

    $registerError= array();

    if($username == null || $pass == null){
        $registerError["EmptyValue"] = "Please ensure that all required fields are filled";
    }
    if(preg_match("/^[0-9a-zA-Z_]{5,}$/", $username === 0 ))
        $registerError["UserNameError"] = "User must be bigger that 5 chars and contain only digits, letters and underscore";

    if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pass) === 0)
        $registerError["PasswordError"] = "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit.";

    //check to see if we found any errors in user params, if so return errors and break out of registration process
    if(!empty($registerError)){
        http_response_code(406);
        header('Content-type:application/json;charset=utf-8');
        //header('Location: ' . $_SERVER['HTTP_ORIGIN']);
        echo json_encode($registerError);
        exit;
    }


    //check if the supplied username already exists.

    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(UserName) AS num FROM User WHERE UserName = :username";
   
 try{
    $params = array(':username' => $username);
    $row = (new db())->connect()->runSQL($sql, $params);
 }
 catch(Exception $e){
     echo($e);
 }

   

    //If there is already a username in db with requested value, return error
    if($row['num'] > 0){
        http_response_code(406);
        echo json_encode(array("UserName" => $username,"message" => "Unable to create user. User already exists"));
        exit;
    }
    else{

    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
    $created = date('Y-m-d H:i:s');

    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO User (UserName, Password, CreatedAt) VALUES (:username, :password, :datecreated)";

    //Execute the statement and insert the new account.
    try{
    $params = array(':username' => $username, ':password' => $passwordHash, ':datecreated' => $created);
    $result = (new db())->connect()->runSQL($sql, $params);
    }
    catch(Exception $e){
        echo($e);
    }
  

    //If the sign up process is successful.
    if($result){
        // set response code
        $_SESSION['username'] = $username;
        $responseData = array("UserName" => $username, "Message" => "User was created successfully");
        http_response_code(200);
        header('Content-type:application/json;charset=utf-8');
        // display message: user was created
        echo json_encode($responseData);
    }
    }

}
?>