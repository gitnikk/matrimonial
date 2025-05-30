<?php
class DBConfig{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "#####";
    private $dbName     = "dbname";

       
    public function __construct(){
    	// echo "***Database Connected</br></br>";
        if(!isset($this->db)){
            // Connect to the database
            try{
                $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";charset=utf8", $this->dbUsername, $this->dbPassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
                // return $this->db;
            }catch(PDOException $e){
                $this->db = null;
                header("location:../1049.php");
            }
        }
    }
    /*
    * Start transaction mode
    */
    public function startTransation(){
    	// echo "***Transaction starts<br><br><br>";
        $this->db->beginTransaction();
    }
    /*
    * commit database
    */
    public function doCommit(){
        return $this->db->commit();
		// echo "***Db commited<br><br><br>";
    	$this->db = null;    
    }
    /*
    * rollback database
    */
    public function doRollBack(){
        $this->db->rollBack();
    	// echo "***Db Rolledback<br><br><br>";
    	$this->db = null;
    }
}
?>