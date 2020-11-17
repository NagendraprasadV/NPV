<?php
include_once 'database.php';

$db = new Dbh;
$connection = $db->connect();

$cruds = new crud($connection);

class crud {
 private $conn;
 public $data = array();

 public function __construct($conn){

    $this->conn = $conn;
 }

// to fetch data from tbl_sample table
 public function fetchData(){
     $query = "select * from tbl_sample";
     $smt = $this->conn->prepare($query);
     $smt->execute();
     return $smt;
 }

// insert data to tbl_sample
 public function insertData($data){

   // $data = array('sanjeec','v');
    $query = "select * from tbl_sample where email= '".$data['email']."' ";
    $result = $this->conn->prepare($query);
    $result->execute();
    $count = $result->rowCount();
    if($count > 0 ){
       return 'existingUser' ;
    } 
    else {
        $i = "insert into tbl_sample values(Null,";
        $j = 0;

        foreach($data as $key => $values){
            $i.= "'addslashes($values)'";
            if(++$j < count($data)){
                $i.=",";
            }
        }
        $i.=");";
        $smt = $this->conn->prepare($i);
        $smt->execute();
        return "newUser";
    }
 }

 // get user by id to update user according to user id
 public function getUserById($id){
    $query = "select * from tbl_sample where id='$id'";
    $smt = $this->conn->prepare($query);
    $smt->execute();
    return $smt;
 }

 // update user
 public function updateData($data,$id){

    $i = "update tbl_sample set ";
    $j = 1;

    foreach($data as $key => $values){

        if($key=='id')
        continue;
        $i.= "$key="."'$values'";
        if(++$j < count($data)){
            $i.=", ";
        }
    }
    $i.="where id='".$id."'";
    $smt = $this->conn->prepare($i);
    $smt->execute();
    return true;
     
 }

// delete user by id
 public function deleteUser($id){
    $query = "delete from tbl_sample where id='$id'";
    $smt = $this->conn->prepare($query);
    $smt->execute();
    return $smt;
 }

}

