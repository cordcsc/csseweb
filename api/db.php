<?php
 class db extends PDO{

    private  $servername = "cordstudent.org";
    private  $username = "cordstud_csse";
    private  $password = "&x2fRT_Bt]u}smBQ*7";
    private  $dbType = "mysql"; //Accepts mysql 
    private  $dbName = "";

    private $conn = null;

    public function __construct(){
    }

    public function connect(){
        $dbType = $this->dbType;
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $this->$conn = new PDO("$dbType:host=$servername;dbname=cordstud_csse", $username, $password);
        $this->$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this;
    }

    public function disconnect(){
        $this->$conn = null;
    }

    function runSQL($sql, $params = array()){
        try{
            $stmt = $this->$conn->prepare($sql);


            foreach($params as $Name => &$Value){
              
                $stmt->bindValue($Name, $Value);
            }

        //$stmt->bindValue(':username', $username);
            $stmt->execute();

            $out = array();
            $i = 0;
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $out[$i] = $result;
                $i++;
            }
            
            return $out;
        }
        catch(Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        finally{
            $this->disconnect();
        }
    }


}
?>