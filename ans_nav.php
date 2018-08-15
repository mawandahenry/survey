<?php
  include 'query_db/functions.php';
  $sql = "SELECT DISTINCT qnr_id,title,description FROM `responses`";

   
    $retval = mysqli_query(connect(),$sql); 
    if($retval == FALSE){
        die('Select Query Error In MySQL:'.mysqli_error());
 }
 else{
     if(mysqli_num_rows($retval) > 0){
    
        $i = 0;
        while($row = mysqli_fetch_assoc($retval)){
            $table_data[$i] = $row; 
            
           
            $i++;
        }

}
}


        $merry = select("members",1);
        $qnrs = select("responses",1);

    for ($i=0; $i < count($qnrs); $i++) { 
      $qnrs[$i]['qnr_form'] = stripslashes(htmlspecialchars_decode($qnrs[$i]['qnr_form']));
    }
    
    ?>
    
  <script>
  
    var apps = <?=json_encode($merry) ?>;
    var d_titles = <?=json_encode($table_data) ?>;
    var ans_qnr = <?=json_encode($qnrs)  ?>;

$(document).ready(function () {
              var template = "<div class='panel' id='repository'>" + "<p class='gen-text has-text-"+$("#theme-color").val()+" panel-heading'>Questionaire Repository</p>"+ "<div class='panel-block'>" +
    "<p class='control has-icons-left'>" + "<input class='input is-small' type='text' placeholder='Search'>" + "<span class='icon is-small is-left'>" + "<i class='icon-search'></i>" + "</span>" + "</p>" + "</div>" ;

    for (var i = 0; i < d_titles.length; i++) {
        template += "<a title= '"+d_titles[i].description+"' db_id = '"+d_titles[i].qnr_id+"' index='"+i+"' class='gen-text has-text-"+$("#theme-color").val()+" panel-block is-size-5 ans-qnr-title'>" +
        "<span class=' panel-icon'>" +
        "<i class=' has-text-"+$("#theme-color").val()+" gen-text icon-file-text-alt'></i>" +
        "</span> "+ d_titles[i].title +" </a>" ;
    }

    template +="<div class='panel-block'>" +
    "<button class='button is-pulled-left is-"+$("#theme-color").val()+" is-small'>" +
    "<span class='icon is-small is-left'>" +
    "<i class='icon-refresh'></i>" +
    "</span>&nbsp; Refresh" +
    "</button>" +
        "</div></div>";



    var columns = '<div class="columns">';
    for (var j = 0; j < d_titles.length; j++) {

var res_count = 0;
for (var k = 0; k < ans_qnr.length; k++) {
    if(ans_qnr[k].qnr_id == d_titles[j].qnr_id){
        res_count++;
    }
}



      columns+='<div class="column is-3">'+
'<div class="notification box is-light">'+
'<h4 class="heading pnl_text is-size-4 has-text-centered">'+
d_titles[j].title+
'</h4><hr>'+
'<h4 class="heading is-size-4 has-text-centered pnl_text">'+
 res_count+
'</h4></div></div>';
 if((j+1)%4==0){
     columns+='</div>'+
'<div class="columns">';
 }       
    }
 columns+='</div>';


    $("#ans_qnr_list").append(template);
    $("#init_show").append(columns);

});




  </script>
  
  <nav id="ans-nav" default-class="is-dark" class="navbar is-dark">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item" href="#">
              <h1>View Answered Questionaires</h1>
            </a>
           
          </div>
          
        </div>
        
      </nav>


      <script>
      $(document).ready(function () {
            $("#ans-nav").removeClass("is-dark").addClass("is-" + $("#theme-color").val()).attr("default-class", "is-" + $("#theme-color").val());
            $("#form-wrapper").on("click",".ans-qnr-title",function(){

                var select = "<select class='select' id='response_select'><option selected>-- Select User ---</option>";

                var qnr = $(this).attr("db_id");
                for (var i = 0; i < ans_qnr.length; i++) {
                    if(ans_qnr[i].qnr_id == qnr ){
                        for (var r = 0; r < apps.length; r++) {
                            if(apps[r].id == ans_qnr[i].member_id){
                                select+= "<option qnr='"+ ans_qnr[i].qnr_id +"' value='"+apps[r].id+"' >"+ apps[r].names +"</option>";
                            }
                            
                        }
                    }
                    
                }



                $("#init_show").empty();
                $("#myselect").empty().append(select);
            });


            $("#form-wrapper").on("change","#response_select",function(){
                
                var qnr = $("#response_select option").attr("qnr");
                var user = $("#response_select").val();
                for (var t = 0; t < ans_qnr.length; t++) {
                    if((ans_qnr[t].qnr_id == qnr) && (ans_qnr[t].member_id == user) ){
                        
                        $("#init_show").empty().append(ans_qnr[t].qnr_form);
                    }
                    
                }

            });
            
      });
      
      
      </script>