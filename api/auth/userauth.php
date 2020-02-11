<?php

//Check to see if Post Request is coming in.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch (isset($_POST)){
        case isset($_POST['login']):
            login($conn);
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
        $responseData = array("UserName" =>  $_SESSION['username'], "Message" => "User Currently Logged in");
        http_response_code(200);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($responseData);
        session_destroy();
        exit;
    }
    else{
        echo("No Logged in User");
    }
}


//Function called for incoming Login
function login($conn){
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT Password, UserName, AccessTypeName FROM User 
LEFT JOIN UserRole ON UserRole.UserId = User.UserId
LEFT JOIN Role ON UserRole.RoleId = cordstud_csse.Role.RoleId
 WHERE User.UserName = :username;";

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $username);


    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);


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