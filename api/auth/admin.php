<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch (isset($_GET)){
        case isset($_GET['getAllUsers']):
            getAllUsers();
            break;
        case isset($_GET['getAllAccessTypes']):
            getAllAccessTypes();
            break;
            }

}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    switch(isset($_POST)){
        case isset($_POST['newMember']):
            createNewMember();
            break;
    }
}

function createNewMember(){
if(authenticateAdmin()){
    
    $sql = "INSERT INTO MEMBER VALUES (:firstname, :lastname, :gradyear,
    :currentmember, :alumni, :photourl, :email, :phone, :userid)";
    $params = array();

    foreach($_POST as $key => $value){
        if($key != "newMember"){
        array_push($params, [(':'.$key) => $value]);
        }
    }
    echo(json_encode($params));
    try{
    $result = (new db())->connect()->runSQL($sql, $params);
    }
    catch(Exception $e){
        echo($e);
    }
}
}

function getAllAccessTypes(){
 if(authenticateAdmin()){
     $sql = "SELECT * FROM Role";

     $result = (new db())->connect()->runSQL($sql, $params);
     $out = array_values($result);
     http_response_code(200);
     header('Content-type:application/json;charset=utf-8');
     echo json_encode($out);
     exit;
 }
 http_response_code(404);
}

function getAllUsers(){
 if(authenticateAdmin()){
    $sql = "SELECT User.UserId, UserName, CreatedAt, Role.RoleId, AccessTypeName FROM User
    INNER JOIN UserRole on User.UserId = UserRole.UserId
    INNER JOIN Role on UserRole.RoleId = Role.RoleId";  
    

    $result = (new db())->connect()->runSQL($sql, $params);
    $out = array_values($result);
    http_response_code(200);
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($out);
    exit;
 }
 http_response_code(404);
}


$conn = null;
?>