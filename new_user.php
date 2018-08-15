<script>
  
$(function(){
$("#rougue").on('submit',function(e){
  e.preventDefault();
  var dam = $(this).serialize();
 $.ajax({

  url:'queries.php',
  type:'post',
  data:{'saved':dam},

  success:function(reply){
    if(reply=='good'){
      $('#cleared').text("user Successfully added").fadeIn(3000).fadeOut(3000);
      $('input[name=fullname]').val('');
      $('input[name=generation]').val('');
      $('input[name=email]').val('');
    }
    else if(reply=='bad'){
      $('#uncleard').text("user not added. contact help").fadeIn(3000).fadeOut(3000);

    }
  },
  error:function(){
    alert("Sorry an error has occured");

  }


 });
});

  });
</script>

 <form action="" method="post" enctype="multipart/form-data" id="rougue">
<div class="columns">
 
    <div class="column is-8 is-offset-2">
        
<div class="field">
  <label class="label">Full Name</label>
  <p class="control has-icon has-icon-left">
    <input class="input" type="text" placeholder="Member's Full Name" name="fullname" value="">
    <span class="icon is-small">
      <i class="icon-user"></i>
    </span>
  </p>
</div>
<div class="field">
  <label class="label">Generation</label>
  <p class="control has-icon has-icon-left">
    <input class="input" type="date" placeholder="Text input" value="" name="generation">
    <span class="icon is-small">
      <i class="icon-calendar"></i>
    </span>
  </p>
</div>



<div class="field">
  <label class="label">Email</label>
  <p class="control has-icon has-icon-left">
    <input class="input" type="text" placeholder="Member Email Address" value="" name="email">
    <span class="icon is-small">
      <i class="icon-envelope"></i>
    </span>
  </p>
</div>



<div class="field is-grouped">
  <p class="control">
    <button class="button is-primary" id="new">Add</button>
  </p>
  <p class="control">
    <button class="button is-link">Cancel</button>
  </p>
</div>



</form>
<div class="notification is-danger " id="uncleard" style="display:none;">
  <div class="title">
    <h3>Sorry</h3>
  </div>
  <div class="message xx">
    User could not be saved to the system. Contact Administrators
    
  </div>
</div>
<div class="notification is-success " id="cleared" style="display: none;">
  <div class="title">
    <h3>Successfully</h3>
  </div>
  <div class="message yy">
    New user has been saved into the system
    
  </div>
</div>
</div>
</div>
