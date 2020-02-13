<?php

//Check to see if Post Request is coming in.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch (isset($_POST)){
        case isset($_POST['login']):
            login();
            break;
        case isset($_POST['logout']):
            logout();
            break;
        case isset($_POST['checkLoggedIn']):
            checkLoggedIn();
            break;
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch (isset($_GET)){
        case isset($_GET['something']):
            getsomething();
            break;
            }

}


function authenticateAdmin(){
    if(session_status === PHP_SESSION_ACTIVE && isset($_SESSION['access'])){
        if($_SESSION['access'] === 'Admin'){return true;}
        return false;
       }
       return false;
}

function checkLoggedIn(){
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['username'])){
        $responseData = array("UserName" =>  $_SESSION['username'], 
        "AccessType" => $_SESSION['access'], "isLoggedIn" => true);

        http_response_code(200);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($responseData);
        exit;
    }
    else{
        $responseData = array("isLoggedIn" => false);
        echo json_encode($responseData);
        exit;
    }
}


//Function called for incoming Login
function login(){
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT Password, UserName, AccessTypeName FROM User 
LEFT JOIN UserRole ON UserRole.UserId = User.UserId
LEFT JOIN Role ON UserRole.RoleId = cordstud_csse.Role.RoleId
 WHERE User.UserName = :username;";

//Here is how we run 
try{
   $params = array(':username' => $username);
   $result = (new db())->connect()->runSQL($sql, $params);
}
catch(Exception $e){
    echo($e);
}

 



    if($result['Password'] != null){
        if(password_verify($pass, $result['Password'])){
            if (session_status() === PHP_SESSION_ACTIVE){
                $_SESSION['username'] = $username;
                $_SESSION['access'] = $result['AccessTypeName'];
                $responseData = array("UserName" => $username, "Message" => "User logged in");
                http_response_code(200);
                header('Content-type:application/json;charset=utf-8');
                echo json_encode($responseData);
                exit;
            }
        }
        else{
            http_response_code(404);
            $responseData = array("UserName" => $username, "Message" => "Incorrect Password");
            header('Content-type:application/json;charset=utf-8');
            echo json_encode($responseData);
            exit;
        }

    }
    else{
        echo("Please Enter a valid User");
    }

}

function logout(){
    if (session_status() === PHP_SESSION_ACTIVE){
        $responseData = array("UserName" =>  $_SESSION['username'], "Message" => "User logged out");
        http_response_code(200);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($responseData);
        session_destroy();
        exit;
    }
    else{
        echo("no session started");
    }

}

?>