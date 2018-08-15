<?php
  include 'query_db/functions.php';

    $qnrs = select("question",1);

    for ($i=0; $i < count($qnrs); $i++) { 
      $qnrs[$i]['questionaire'] = stripslashes(htmlspecialchars_decode($qnrs[$i]['questionaire']));
    }
    
    ?>
  
    
  <script>
  
    var qnr_obj = <?=json_encode($qnrs)  ?>;
    $(document).ready(function () {
      
      $("#form-wrapper").empty().append(view_qnr_layout);
      
          var template = "<div class='panel' id='repository'>" + "<p class='gen-text has-text-"+$("#theme-color").val()+" panel-heading'>Questionaire Repository</p>"+ "<div class='panel-block'>" +
    "<p class='control has-icons-left'>" + "<input class='input is-small' type='text' placeholder='Search'>" + "<span class='icon is-small is-left'>" + "<i class='icon-search'></i>" + "</span>" + "</p>" + "</div>" ;

    for (var i = 0; i < qnr_obj.length; i++) {
        template += "<a title= '"+qnr_obj[i].description+"' db_id = '"+qnr_obj[i].id+"' index='"+i+"' class='gen-text has-text-"+$("#theme-color").val()+" panel-block is-size-5 qnr-titles'>" +
        "<span class=' panel-icon'>" +
        "<i class=' has-text-"+$("#theme-color").val()+" gen-text icon-file-text-alt'></i>" +
        "</span> "+ qnr_obj[i].title +" </a>" ;
    }

    template +="<div class='panel-block'>" +
    "<button class='button is-pulled-left is-"+$("#theme-color").val()+" is-small'>" +
    "<span class='icon is-small is-left'>" +
    "<i class='icon-refresh'></i>" +
    "</span>&nbsp; Refresh" +
    "</button>" +
        "</div></div>";




        $("#qnr-titles").append(template);
        $("#qnr-tabs-container").tabs();
        $("#qnr-tabs-container ul").sortable({ axis: "x", containment:"#qnr-tabs-container"});

        organize_layout.apply({ el_2:"#qnr-tabs-container",el_1:"#repository"});

            $("#view_qnr_nav").removeClass("is-dark").addClass("is-" + $("#theme-color").val()).attr("default-class", "is-" + $("#theme-color").val());
            $(".qnr_tab").removeClass("bg-dark").addClass("bg-" + $("#theme-color").val());
            

 

   
    });

        

  </script>



<nav id="view_qnr_nav" default-class="is-dark" class="navbar is-dark">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item" href="#">
              <h1>VIEW SAVED QUESTIONAIRES</h1>
            </a>
           
          </div>
          
        </div>
        
      </nav>
 