<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
}
elseif ($_SERVER['REQUEST_METHOD'] === 'GET'){

}
elseif ($_SERVER['REQUEST_METHOD'] === 'PUT'){

}
/**
$sql = "SELECT * FROM Role";
$result = $conn->query($sql);

foreach( $result as $row){
    echo($row['RoleId'] . '->' . $row['AccessTypeName']);
    echo("\n");
}**/


function createNewUser($user){

}

function getAllUsers(){

}


$conn = null;
?>