<?php 

include('query_db/functions.php');
if(isset($_POST['saved'])){
  $new_members = array();
   parse_str($_POST['saved'],$new_members);

   $full_name = $new_members['fullname'];
   $date = $new_members['generation'];
   $email = $new_members['email'];

   $fix=array("id"=>"NULL","names"=>$full_name,"email"=>$email,"generation"=>$date);
   if(insert("members",$fix)){
   	echo "good";
   }
   else{
   	echo "bad";
   }
}
else if(isset($_POST['updates'])){
	$badas = array();

	parse_str($_POST['updates'],$badas);
	$names =$badas['fulls'];
	$mails = $badas['email'];
	$id = $badas['angel'];
	$gen = $badas['generation'];

	$qril = "update members set names='".$names."', email='".$mails."', generation='".$gen."' WHERE id = '".$id."'";
	$whoops = mysqli_query(connect(),$qril);

	if($whoops){
		echo "nice";
	}
	else{
		echo "poor";
	}

}
elseif (isset($_POST['yello'])) {
	    $nec = $_POST['yello'];
	    $toy = "delete from members where id ='".$nec."'";
	    $ti = mysqli_query(connect(),$toy);
	    if($ti){
	    	echo "wow";
	    }
	    else{
	    	echo "shit".mysqli_error(connect());
	    }

}
else{
 echo "fail";
}

?>