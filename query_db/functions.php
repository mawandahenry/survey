<?php
function connect(){
    $link = mysqli_connect('localhost','root','sesnaco','org'); 
    if (!$link) { 
	die('Could not connect to MySQL: ' . mysqli_error()); 
}
return $link;
}


function Insert($table,$field_values){

$fields = "";$values="";$i = 0;
foreach ($field_values as $field => $value) {
    $i++;
    if($i==1){
       $fields.="`".$field."`,";
       $values.=$value.","; 
    }else if($i==(count($field_values))){
        $fields.="`".$field."`";$values.="'".$value."'";
    }else{
        $fields.="`".$field."`,";$values.="'".$value."',";
    }
}

    $sql = "INSERT INTO `$table`($fields) VALUES ($values)";
   
    $retval = mysqli_query(connect(),$sql); 
    if($retval == FALSE){
        die('Insert Query Error In MySQL: ' . mysqli_error());
    }else{
            
        return TRUE;
    }

}







function select($table,$where){
    $where = is_array($where) ? create_where_query($where) : $where ; 
    $sql = "SELECT * FROM $table WHERE $where";
    //mysql_select_db('org',connect());
    $retval = mysqli_query(connect(),$sql); 
    if($retval == FALSE){
        die('Select Query Error In MySQL:'.mysqli_error());
 }else{
     if(mysqli_num_rows($retval) > 0){
    
        $i = 0;
        while($row = mysqli_fetch_assoc($retval)){
            $table_data[$i] = $row; 
            
           
            $i++;
        }

}
}
return $table_data;

}
function create_where_query($where){
    extract($where);
    return "$key = $value";

}



 


 ?>