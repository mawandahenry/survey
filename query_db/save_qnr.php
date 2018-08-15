<?php include "functions.php" ;

// print_r($_POST);

$title = $_POST['qnr-title'];
$desc = $_POST['qnr-desc'];
$form = addslashes(htmlspecialchars($_POST['qnr-form']));
$theme = $_POST['qnr-theme'];
$arrayName = array("id"=>"NULL","title"=>"$title","description"=>"$desc","questionaire"=>"$form","theme"=>"$theme");
if(Insert("question", $arrayName)){
  $response = $arrayName;
  // header("location:../admin_home.php?s=1&t=$title&h=$theme");
}else{
  // header("location:../admin_home.php?s=0&t=$title&h=$theme");
    echo "failure";
}

?>