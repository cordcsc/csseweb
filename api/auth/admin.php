<?php


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch (isset($_GET)){
        case isset($_GET['something']):
            getsomething();
            break;
            }

}

function createNewUser($user){
if(authenticateAdmin()){
    
}
}

function getAllUsers(){

}


$conn = null;
?>