<?php
include "connection.php";

if(isset($_POST['cId'])){
    $id = $_POST['cId'];
    $query="SELECT * FROM city WHERE STATEID=$id";
    $runQuery =mysqli_query($connection,$query);
    $str="";
    while($result=mysqli_fetch_array($runQuery)){
        $str.="<option>{$result['CITY']}</option>";
    }
    echo $str;

}

if(isset($_POST['id'])){
    $id = $_POST['id'];

    $stateQuery = "SELECT * FROM state WHERE ID=$id";
    $display = mysqli_query($connection,$stateQuery);
    $str="";
    while($result=mysqli_fetch_array($display)){
        $str.= "<option value=".$result['ST.ID'].">".$result['STATE']."</option>";
    }
    echo $str;
}


?>