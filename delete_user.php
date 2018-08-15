  

  <?php 
  include 'query_db/functions.php';
$loop = select("members",1);

   ?> 
<div class="field">
  <label class="label">Contact</label>
<div class="control">
  <div class="select">
 <select data-placeholder="choose contact"   tabindex="4" style="height:25px; " name="booz[]" id="impos">

 </select>
</div>

</div>
</div>

<script>
$(document).ready(function () {
	var y='';
    
    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });
    var hi = <?=json_encode($loop) ?>;
var tint='';

for (var i = 0; i < hi.length; i++) {
	tint += '<option value="'+hi[i].id+'">'+hi[i].names+'</option>';
}
$("#impos").append(tint);

$("#impos").on('change',function(){
	var ama='';
         y = $(this).val();
        var j=0;
        for(j=0; j<hi.length; j++){
          if(y == hi[j].id){
        ama +='<tr><td><span class="has-text-weight-bold is-info">full names</span></td><td>'+hi[j].names+'</td></tr>'+
        '<tr><td><span class="has-text-weight-bold is-info">Email</span></td><td>'+hi[j].email+'</td></tr>'+
        '<tr><td><span class="has-text-weight-bold is-info">Generation</span></td><td>'+hi[j].generation+'</td></tr>'+
        '<tr><td><input type="submit" class="button is-danger" value="Delete" id="deleter"></td></tr>';
      }
      }
      $('#ticks').html(ama);
    });
$("#ticks").on('click','#deleter',function(ex){
   ex.preventDefault();

   $.ajax({
   	url:'queries.php',
   	type:'post',
   	data:{'yello':y},
   	success:function(tim){
        if(tim =="wow"){
        	$("#ticks").empty();
        	$("#cleared").text("User successfully deleted").fadeIn(2000).fadeOut(2000);
          

        }
        else{
        	("#ticks").empty();
        	$("#uncleard").text("Could not delete user. contact help").fadeIn(2000).fadeOut(2000);

        }
   	},error(){
   		alert("An error has occured");
   	}
   })
});

});


</script>

<table class="table">
	<tbody id="ticks">
		
	</tbody>
</table>
<div class="notification is-success " id="cleared" style="display: none;">
  <div class="title">
    <h3>Success</h3>
  </div>
  <div class="message yy">
    
    
  </div>
</div>
<div class="notification is-danger " id="uncleard" style="display:none;">
  <div class="title">
    <h3>Sorry</h3>
  </div>
  <div class="message xx">
   
    
  </div>
</div>

