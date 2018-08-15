
<!-- <hr style="border-bottom:2px solid #ccc;"> -->

<div class="columns">
  <div id="admin_panel_tasks" class="column is-4">


<div class="columns">
<div class="column">
<div class="notification is-light">
  <nav class="panel">
  <p id="admin_panel_tutorials_tab" class="has-text-dark pnl_text has-text-centered panel-heading">
    Tutorials - Learn The Slave
  </p>
</nav>
  <div class="columns is-multiline">
    <div class="column">
      <div page="tuts.php" header="Video Tutorials" class="is-active has-text-centered notification box is-dark action-link">
        <i class=" icon-facetime-video icon-2x"></i>
        <br>
        <h4 class="is-size-6 heading has-text-centered">Video</h4>
        
      </div>
    </div>
    <div class="column">
      <div page="docs.php" header="Documented Tutorials" class="has-text-centered notification box is-dark action-link">
        <i class="icon-file icon-2x "></i>
        <br>
        <h4 class="is-size-6 heading has-text-centered">Pdf/Docs</h4>
      </div>
    </div>
    <div class="column">
      <div page="external_links.php" header="Search Tutorials Else On The Web" class=" has-text-centered notification box is-dark action-link">
        <i class="icon-globe icon-2x "></i>
        <br>
        <h4 class="is-size-6 heading has-text-centered">Other</h4>
      </div>
    </div>
  </div>


</div>
</div>
</div>
<div class="columns ">
<div class="column">
<div class="notification is-light">
  <nav class="panel">
  <p id="admin_panel_action_tab" class="has-text-centered panel-heading">
    Member Actions
  </p>
</nav>
  <div class="columns is-multiline">
    <div class="column">
      <div page="new_user.php" header="Add New Members" class=" has-text-centered notification box is-dark action-link">
        <i class="icon-group icon-2x"></i>
        <br>
        <h4 class="is-size-6 heading has-text-centered">New</h4>
      </div>
    </div>
    <div class="column">
      <div page="edit_user.php" header="Edit Existing Member" class=" has-text-centered notification box is-dark action-link">
        <i class="icon-cogs icon-2x "></i>
        <br>
        <h4 class="is-size-6 heading has-text-centered">Edit</h4>
      </div>
    </div>
    <div class="column">
      <div page="delete_user.php" header="Delete Member" class=" has-text-centered notification box is-dark action-link">
        <i class="icon-trash icon-2x "></i>
        <br>
        <h4 class="is-size-6 heading has-text-centered">Delete</h4>
      </div>
    </div>
  </div>


</div>
</div>
</div>
<div class="columns">
  
<div class="column">
<div class="notification is-light">
  <nav class="panel">
  <p id="admin_panel_qnr_info" class="has-text-dark pnl_text has-text-centered panel-heading">
    Questionaire Analysis
  </p>
</nav>
  <div class="columns is-multiline">
    <div class="column">
      <div class=" has-text-centered notification box is-white">
        <i class="pnl_text icon-folder-close icon-2x"></i>
        <br>
        <h4 class="pnl_text is-size-6 heading has-text-centered">Saved</h4>
        <hr>
        <h5 class="pnl_text is-size-5 has-text-centered">6</h5>
      </div>
    </div>
    <div class="column">
      <div class=" has-text-centered notification box is-white">
        <i class="pnl_text icon-2x icon-folder-open "></i>
        <br>
        <h4 class="pnl_text is-size-6 heading has-text-centered">Shared</h4>
        <hr>
<h5 class="pnl_text is-size-5 has-text-centered">6</h5>
      </div>
    </div>
    <div class="column">
      <div class=" has-text-centered notification box is-white">
        <i class="pnl_text icon-eye-open icon-2x "></i>
        <br>
        <h4 class="pnl_text is-size-6 heading has-text-centered">Answered</h4>
        <hr>
        <h5 class="pnl_text is-size-5 has-text-centered">6</h5>
      </div>
    </div>
  </div>
</div>
</div>
</div>

  </div>
  <div class="column resize_me">
<nav class="panel">
  <p id="admin_panel_action_pane" class="panel-heading has-text-centered">
    Video Tutorials
  </p>
</nav>
<div class="card">

  <div class="card-content">


    <div id="page-content" class="content">
<?php include "tuts.php" ?>
    </div>
  </div>
</div>
  </div>
</div>

<script>

$(document).ready(function () {
    $(document).on("mouseenter",".card-image ",function(){
        $(".vid-cover").addClass("overlay-" + $("#theme-color").val());
        $(this).find(".vid-cover").show(300);

    });
    $(document).on("mouseleave",".card-image ",function(){
        $(this).find(".vid-cover").hide(200);
        $(".vid-cover").removeClass("overlay-" + $("#theme-color").val());

    });
    $(document).on("mouseover", ".vid-cover i",function(){
        $(this).switchClass("icon-3x","icon-4x",200);
    });

    $(document).on("mouseleave", ".vid-cover i",function(){
        $(this).switchClass("icon-4x","icon-3x",200);
    });


        $("#admin_panel_action_pane,#admin_panel_action_tab").addClass("has-text-"+$("#theme-color").val());
        $(".action-link").on("load").removeClass("is-dark").addClass("is-" + $("#theme-color").val());
        $(".pnl_text").on("load").removeClass("has-text-dark").addClass("has-text-" + $("#theme-color").val());


        $( "#admin_panel_tasks" ).sortable({
          axis: "y",
  containment: "parent"
});
        $( "#admin_tuts" ).sortable({
          axis: "x",
  containment: "parent"
});




$(".drag").draggable({});
$( ".resize_me" ).resizable({
  resize: function( event, ui ) {}
});

$(document).on("click",".action-link",function(){
  var link =  $(this);
  $("#admin_panel_action_pane").text(link.attr("header"));
  $("#page-content").load(link.attr("page"));

});
});


</script>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, sit molestiae quis atque minus iure quasi? Vitae a minima deleniti error. Blanditiis totam assumenda et ea officia beatae, ullam rem.