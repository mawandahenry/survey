var i = 1;
var dark ="#363636";
var black ="#0a0a0a";
var info ="#209cee";
var success ="#23d160";
var primary ="#00d1b2";
var danger ="#ff3860";
$(document).ready(function () {
   
    $(document).tooltip({
        show: { effect: "fadeIn", duration: 500 }
    });

    $("#theme-link-trigger").on("click",function(){
        $(".theme-button").toggle(500);
    });
  
    $("#form-wrapper").load("admin_panel.php");
    
    $("#admin_panel").on("click",function (e) {  
        $("#div").remove();
        $("#form-wrapper").load("admin_panel.php");

    });

    $(document).on("click", ".action-link",function(){
        $(".action-link").removeClass("is-active");
        $(this).addClass("is-active");
    });

// Theme changer
$(document).on("click",".theme-button",function (e) { 
    var new_class = $(this).attr("target-class") ;
    var old_class = $("#theme-color").val();
    $("#theme-color").val(new_class);

    $('.theme-button').removeClass("is-online");
    $(this).addClass("is-online");

    $(".qn-container").removeClass("shadow-"+old_class).addClass("shadow-"+new_class);

    $("#control-nav,#view_qnr_nav ,#page-header,.submit,.action-link").removeClass("is-" + old_class).addClass("is-"+new_class);
    $(".tile-text,#admin_panel_action_pane,#admin_panel_action_tab , .tile-icon,#theme-link-trigger-text,.gen-text,.pnl_text").removeClass(" has-text-" + old_class).addClass("has-text-"+new_class);
    
    $("article.box.box-" + old_class).removeClass("box-" + old_class).addClass("box-" + new_class);

    $("article.box.box-" + new_class + " .tile-icon , article.box.box-" + new_class + " .tile-text").removeClass("has-text-" + new_class).addClass("has-text-white");

    $(".qnr_tab").removeClass("bg-" + old_class);
    $(".qnr_tab.ui-state-active").addClass("bg-" + new_class);


});


//Pages navgation themes
$("article.box").on("click",function(){
    var active_tile = "box-" + $("#theme-color").val();
    var in_active_tile_text = "has-text-" + $("#theme-color").val();

    $("article.box").removeClass(active_tile);
    $('.tile-icon , .tile-text').removeClass('has-text-white').addClass('has-text-' + $("#theme-color").val());
    $(this).addClass(active_tile);

    $("." + active_tile + " .tile-icon , " + "." + active_tile + " .tile-text ").removeClass(in_active_tile_text).addClass("has-text-white");

});

// Create new form/questionaire

$("#new_qnr").on("click",function(){
    $("#div").remove();
   $("#form-wrapper").before($("<div id='div'></div>").load("new_qnr.php"));


    $("#form-wrapper").empty().append(form_head_template());
    
    $("#qnr_placehold").append(qn_template());

    $("#qn_"+(i-1)+"_options_container").append(multiple_choice(1));

});

    $("#view_ans").on("click",function(){
   
    $("#div").remove();
   $("#form-wrapper").empty().load("answers.php").before($("<div id='div'></div>").load("ans_nav.php"));

});


// add new question
    $(document).on("click","#add_question",function(e){
    e.preventDefault();

    $("#qnr_placehold").append(qn_template());
    $("#qn_"+(i-1)+"_options_container").append(multiple_choice(1));
});



//Delete Question
    $("#form-wrapper").on("click",".qn_delete",function(e){
        e.preventDefault();
        $("#"+$(this).attr("qn")).remove();
    });



// Changing Question type with question body
    $("#form-wrapper").on("change", ".qn-type",function(){
        var update_attr = $(this).attr("update");
        var value = $(this).val();
        if (value === "short_answer" ) {
           var qn_type = short_answer(); 
        } else if (value === "checkbox"){
            var qn_type = checkboxes(1); 
            
        } else if (value === "paragraph"){
            var qn_type = para_answer(); 
            
        } else if (value === "multiple_choice"){
            var qn_type = multiple_choice(1); 
            
        }else{
           var qn_type = short_answer(); 
        }

        $("#"+update_attr).attr("qn-type",value);


        $("#" + $(this).attr("target")).empty().append(qn_type);
        
    });




    // Add Option
    $("#form-wrapper").on("click", ".add_option", function (e) {
        e.preventDefault();
        var options = new Number(($(this).attr("option")))+1;
        // alert($(this).attr("qn-type"));

        if(($(this).attr("qn-type"))==="checkbox_only")
            $(this).parent().parent().siblings().eq(0).append(checkbox_only(options));
        else
            $(this).parent().parent().siblings().eq(0).append(choice_only(options));

        $(this).attr("option",options);
    });




// Deleting options
    $("#form-wrapper").on("click", ".remove", function (e) {
        $(this).parent().parent().remove();

    });


// Editable fields

    $("#form-wrapper").on("click", ".editable", function (e) {
        $(this).html("<input type='text' placeholder='" + $(this).attr('place-holder') +"' id='" + $(this).attr('input-id') + "' class='input is-white edits " + $(this).attr('input-size') + "' value=''  />");
        $("#"+$(this).attr('input-id')).focus().addClass("btm-bdr-"+$("#theme-color").val());


    });

    
// save text on mouseleave
    $("#form-wrapper").on("mouseleave", ".edits", function (e) {
        

        var input = ($(this).val() === "") ? $(this).parent().attr('input-placeholder') : $(this).val();
       
        $(this).parent().html(input);

    });


// Preview Questionaire/form

$(document).on("click","#preview", function (e) {
    e.preventDefault();
    $(".qn_container_copy").remove();
    // Set up form dynamically for preview
    //form-title
    $("#form_title_copy").text($("#form_title").text());
    $("#form_description_copy").text($("#form_description").text());
    $("#qnr-title").val($("#form_title").text());
    $("#qnr-desc").val($("#form_description").text());
    $("#qnr-theme").val($("#theme-color").val());

    // alert($("#theme-color").val());
    
    
    //loop through each question
    // alert($("#form-wrapper").find(".qn_container_copy").length) ;
    
    $(".qn-container").each(function(){
        var qn = $(this);
        var qn_title = qn.find(".qn-title > span").text();
        var qn_type = qn.attr("qn-type");
        var id_count = $(".qn_container_copy").length + 1;

        $("#qn_holder").append(qn_copy_template(id_count));
        $("#qn_" + id_count + "_title_copy").text(qn_title);
        $("#qn_" + id_count + "_title_copy").attr("qn_type", qn.attr("qn-type"));
        $("#options_" + id_count + "_container_copy.options-container-copy").append(extract_options(qn, id_count));


    }).end()


    $("#myModal").toggleClass("is-active");
    $("#myModal .modal-card").css("width", "60%");

});



    $("a#create_qnr").on("click",function(e){
        e.preventDefault();
var options="";
        $("#qnr-form").val($("#qn_holder").html());  
//         $(".qn_container_copy").each(function () {
//             var qn = $(this);
//             var q= $(this).attr('id');

//             var val =  $("#qnr-form").val();
            
//             var q_title = qn.find(".qn-title-copy").text();
//              $("#qnr-form").val(val + q_title + "*qn-title*" );
            
//             $("#"+q + " .qn-option").each(function () {
//                 var val_with_title = $("#qnr-form").val();
//                 $("#qnr-form").val(val_with_title + $(this).parent().html()); 
                
//             }).end();












           
// var val_with_options = $("#qnr-form").val();
//  $("#qnr-form").val(val_with_options+"*qn*");


//         }).end()


//             alert($("#qnr-form").val());
            
        

// alert(data);

var data = $("#save_qnr").serialize();
    var url = "query_db/save_qnr.php";




    $.ajax({
        type: "post",
        url: url,
        data: data,
        // dataType: "json",
        success: function (response) {
            $("#myModal").toggleClass("is-active");
            $("<div class='bg-" + $("#theme-color").val() + "'><p class='has-text-white'><h4 class='is-size-4'>Title :</h4> " + $("#qnr-title").val() + "<br><h4 class='is-size-4'>Description :</h4> " + $("#qnr-desc").val() + " </p></div>").dialog({ title: "Questionaire Saved", position: { my: "left top", at: "center top", of: "#form-wrapper" } });

            $("#form-wrapper").load("admin_panel.php");
            




        }
    });
    });

$("#save_qnr").on("submit",function(){
    e.preventDefault();




});










});

function extract_options(qn, id_count){
    
    if (qn.attr('qn-type') === "short_answer") {
        var template = "<div class='option columns'>" +
            "<div class='column'>" +
            "<input type='text' name='qn-" + id_count + "-option' id='qn-" + id_count + "-option-1' class='input qn-option qn-" + id_count +"-option' />" +
            "</div>" +
            "</div>";
    } else if (qn.attr('qn-type') === "checkbox") {
        var template = "";
        var opt_count = 0;
        qn.find(".option.columns").each(function () {

            var option = qn.children().eq(1).children().eq(0).children().eq(0).children().eq(opt_count).children().eq(0).children().eq(1).text();
         template += "<div class='option columns'>" +
            "<div class='column'>" +
             "<input type='checkbox' name='qn-" + id_count + "-option' id='qn-" + id_count + "-option-" + (opt_count + 1) + "' class='qn-option qn-" + id_count + "-option' value='" + option +"'/>&nbsp;<span class='option-text'>" + option + "</span></div>" +
            "</div>";
            
            opt_count++;
        }).end()
    } else if (qn.attr('qn-type') === "paragraph") {
        var template = "<div class='option columns'>" +
        "<div class='column'>" +
            "<textarea name='qn-" + id_count + "-option' id='qn-" + id_count + "-option-1' class='qn-option qn-" + id_count +"-option' style='width:100%;' rows='10'></textarea>" +
        "</div>" +
        "</div>";
        
    } else if (qn.attr('qn-type') === "multiple_choice") {
        var template="";
        var opt_count = 0;
        qn.find(".option.columns").each(function(){
            var option = qn.children().eq(1).children().eq(0).children().eq(0).children().eq(opt_count).children().eq(0).children().eq(1).text();;
            template +=  "<div class='option columns'>" +
            "<div class='column'>" +
                "<input type='radio' name='qn-" + id_count + "-option' id='qn-" + id_count + "-option-" + (opt_count + 1) + "' class='qn-option qn-" + id_count + "-option' value='" + option + "' />&nbsp;<span class='option-text'>" + option + "</span></div>" +
            "</div>";
            
                opt_count++;
        }).end()
    } else {
    }
    
return template;
}





function form_head_template(){
 var template = "<div id=' form-container' class='columns'>"+
                    "<div id='qnr_placehold' class='column is-10 is-offset-1'>"+
                      "<h1 class='' id='form_title' style='font-size:2em'><span input-id='title' input-size='is-large' place-holder='Input Your Short Form Title' input-placeholder='Un-titled form' class='editable'>Un-titled form</span></h1>"+
                      "<h2 class='' id='form_description' style='font-size:1.4em'><span input-id='desciption' input-size='is-medium' place-holder='Input Your Short Form Description' input-placeholder='Type form description' class='editable'>Type Form description</span></h2>"+
                      "<hr>"+
                    "</div>"+
                    "</div>";
            return template;
}


function qn_template(){
 var template =   "<div qn-type='multiple_choice' id='qn_"+i+"_container' class='card shadow-"+ $("#theme-color").val() +" qn-container'>"+
       "<header class='card-header qn-header'>"+
     "<p class='card-header-title qn-title'><span input-id='qn_" + i +"_title' place-holder='Input Question Text' input-size='is-medium' input-placeholder='Un-titled question' class='editable'>Un-titled question</span></p>"+
         "<span>"+
         "Question Type :   "+
     "<select update='qn_" + i +"_container' target='qn_" + i +"_options_container' class='qn-type' id='qn_"+i+"_type'>"+
            "<option value='short_answer'>Short Answer</option>"+
            "<option value='paragraph'>Paragraph</option>"+
            "<option selected='selected' value='multiple_choice'>Multiple Choice</option>"+
            "<option value='checkbox'>Checkboxes</option>"+
            // "<option value='date_time'>Date-Time</option>"+
          "</select></span>"+
          
        "</header>"+
        "<div id='qn_"+i+"_body' class='card-content qn-body'>"+
         "<div id='qn_"+i+"_options_container' class='options-container content'> "+
//options content
           "</div>"+
        "</div>"+

        "<footer id='qn_"+i+"_footer' class='card-footer qn-footer'>"+
          "<a class='card-footer-item qn_copy' qn='qn_"+i+"_container'> <i class='icon-copy'></i>&nbsp; Duplicate Question</a>"+
          "<a class='card-footer-item qn_delete' qn='qn_"+i+"_container'> <i class='icon-trash'></i>&nbsp; Delete</a>"+
        "</footer>"+
      "</div>";

i++;

            return template;
}



function checkboxes(options){
   var template = "<div  class='options-list'>"+
                    
                    checkbox_only(options)+
                    "</div><hr>"+
                    "<div class='columns'>"+
                    "<div class='column'>"+
                    "<i class='icon-check-empty'></i>&nbsp;<a qn-type='checkbox_only'  option='"+options+"' class='add_option'>Add Option...</a>"+
                    "</div>"+
                    "</div>";
return template;
}
function checkbox_only(options){
    var template = "<div class='option columns'>" +
        "<div class='column is-11'><i class='icon-check-empty'></i>&nbsp;<span input-size='is-medium is-inline' place-holder='Input Option Text' input-id='title' input-placeholder='Option " + options +"' class='editable'>Option "+ options +"</span></div>" +
        "<div class='column is-1'><a class='remove'><i class='icon-remove'></i></a></div>" +

        "</div>" ;
        return template;
}



function multiple_choice(options){
   var template = "<div class='options-list'>"+
                    choice_only(options)+
                    "</div><hr>"+

                    "<div class='columns'>"+
                    "<div class='column'>"+
       "<i class='icon-circle-blank'></i>&nbsp;<a qn-type='choice_only' option='" + options +"' class='add_option'>Add Option...</a>"+
                    "</div>"+
                    "</div>";
return template;
}
function choice_only(options) {

var template = "<div class='option columns'>"+
    "<div class='column is-11'><i class='icon-circle-blank'></i>&nbsp;<span input-id='title' input-size='is-medium is-inline' place-holder='Input Option Text' input-placeholder='Option " + options +"' class='editable'>Option "+options+" </span></div>"+
                    "<div class='column is-1'><a class='remove'><i class='icon-remove'></i></a></div>"+

                    "</div>";
return template;
}
function short_answer(){
   var template = "<div class='option columns'>"+
                    "<div class='column is-11'>"+
                    "<hr class='short-answer'>"+
                    "</div></div>";
return template;
}

function para_answer(){
   var template = "<div class='option columns'>"+
                    "<div class='column is-11'>"+
                    "<hr class='para-answer'>"+
                    "<hr class='para-answer'>"+
                    "<hr class='para-answer'>"+
                    "<hr class='para-answer'>"+
                    "<hr class='para-answer-half'>"+
                    "</div>"+

                    "</div>";
return template;
}
function qn_copy_template(id){
    var template = "<div id='qn_" + id + "_container_copy' class='card shadow-" + $("#theme-color").val() +" qn_container_copy'>" +
        "<header class='card-header '>" +
        "<p class='card-header-title'>" +
        "<span id='qn_" + id +"_title_copy' class='qn-title-copy'></span>" +
        "</p>" +
        "</header>" +
        "<div id='qn_" + id +"_body_copy' class='card-content qn-body-copy'>" +
        "<div id='options_" + id +"_container_copy' class='content options-container-copy'>" +







        "</div>" +
        "</div>" +
        "</div>";
return template;
}


