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
    switch(isset($_POST)){
        case isset($_POST['newMember']):
            createNewMember($_POST);
            break;
    }
       
         

}

function createNewMember($data){
if(authenticateAdmin()){
    foreach($data as $key=>$post_data){
        echo "You posted:" . $key . " = " . $post_data . "<br>";
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