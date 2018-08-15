
<?php
include ('query_db/functions.php');
$viewed = select("members",1);
?>


<div class="columns">
    <div class="column is-8 is-offset-2">
  <div class="select">
 <select data-placeholder="Chooose Member To Edit"   tabindex="4" style="height:25px;" id="responsed">

</select>
</div>


<script type="text/javascript">
  $(function(){
    var x;
    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });

   var linux= <?= json_encode($viewed) ?>; 
   var select = "";
   
          for (var r = 0; r < linux.length; r++) {
                select+= "<option  value='"+linux[r].id+"' >"+ linux[r].names +"</option>";
                        }
                  $("#responsed").append(select);

    $("#responsed").on('change',function(){
         x = $(this).val();
        var i=0;
        for(i=0; i<linux.length; i++){
          if(x == linux[i].id){
        $('input[name=fulls]').val(linux[i].names);
        $('input[name=generation]').val(linux[i].generation);
        $('input[name=email]').val(linux[i].email);
      }
      }
    })

    $("#updater").on('submit',function(tip){
       tip.preventDefault();
      $("#hope").append("<input type='hidden' name='angel' value='"+x+"'>");

      var naco = $(this).serialize();
      $.ajax({
        url:'queries.php',
        type:'post',
        data:{'updates':naco},
        success:function(re){
         if(re=='nice'){
        $('input[name=fulls]').val("");
        $('input[name=generation]').val("");
        $('input[name=email]').val("");
      $('#cleared').text("Member successfully updated").fadeIn(3000).fadeOut(3000);
    }
    else {
      $('#uncleard').text("failed to update user info. contact admin").fadeIn(3000).fadeOut(3000);

    }
        },error(){
          alert("updating failed. please contact administration")
        }
      })

    });
  });
 

</script>
<form id="updater" method="post" action="" enctype="multipart/form-data">
<div class="field">
  <label class="label">Full Name</label>
  <p class="control has-icon has-icon-left">
    <input class="input" type="text" placeholder="Member's Full Name" value="" name="fulls">
    <span class="icon is-small">
      <i class="icon-user"></i>
    </span>
  </p>
</div>
<div class="field">
  <label class="label">Generation</label>
  <p class="control has-icon has-icon-left">
    <input class="input"  placeholder="Text input" value="" name="generation">
    <span class="icon is-small">
      <i class="icon-calendar"></i>
    </span>
  </p>
</div>



<div class="field">
  <label class="label">Email</label>
  <p class="control has-icon has-icon-left">
    <input class="input" type="text" placeholder="Member Email Address" id="hope" name="email">
    <span class="icon is-small">
      <i class="icon-envelope"></i>
    </span>
  </p>
</div>



<div class="field is-grouped">
  <p class="control">
    <input type="submit" class="button is-primary" value="Update">
  </p>
  <p class="control">
    <button class="button is-link">Cancel</button>
  </p>
</div>

</form></br>
<div class="notification is-danger " id="uncleard" style="display:none;">
  <div class="title">
    <h3>Sorry</h3>
  </div>
  <div class="message xx">
    User's information could not be updated. Contact Administrators
    
  </div>
</div>
<div class="notification is-success " id="cleared" style="display: none;">
  <div class="title">
    <h3>Success</h3>
  </div>
  <div class="message yy">
    information has been updated
    
  </div>
</div>


    </div>
</div>