$(document).ready(function(){

    
  
    
    $("#view_qnrs").on("click",function(){
        $("#div").remove();
        $("#form-wrapper").before($("<div id='div'></div>").load("view_saved.php"));
        

        
    });

    $("#form-wrapper").on("click", ".panel-block.qnr-titles", function () { $(".panel-block.qnr-titles").removeClass("is-active");$(this).addClass("is-active");});
    

    


    $("#form-wrapper").on("click",".qnr-titles",function(){
        var link = $(this);
        var i = new Number(link.attr("index"));
        if ($("#qnr-" + qnr_obj[i].id +".qnr_tab_pane").length > 0 ) {
            
            $("<div class='bg-" + $("#theme-color").val() + "'><h1 class='is-size-4'>" + qnr_obj[i].title + " Tab <br>Already Created!!</h1></div>").dialog({ title: "Duplicate Tab", position: { my: "left top", at: "left top", of:"#qnr_tabs_holder"}});
        }
        else{
            
            $("#qnr-tabs-container ul").append("<li class='qnr_tab' ><a id='qnr-" + qnr_obj[i].id + "-handle' href='#qnr-" + qnr_obj[i].id + "'>" + qnr_obj[i].title + "</a></li>");
            
            var controls = '<div class="field is-pulled-right has-addons">' +
                '<p class="control">' +
                '<a class="button share_form is-info">' +
                '<span class="icon is-small">' +
                '<i class="icon-share"></i>' +
                '</span>' +
                '<span>Share</span>' +
                '</a>' +
                '</p>' +
                '<p class="control">' +
                '<a class="button expand_form" content="#qnr-' + qnr_obj[i].id + '">' +
                '<span class="icon is-small">' +
                '<i class="icon-resize-full"></i>' +
                '</span>' +
                '<span>Expand</span>' +
                '</a>' +
                '</p>' +
                '<p class="control">' +
                '<a class="button close_form" handle="#qnr-' + qnr_obj[i].id + '-handle"  content="#qnr-' + qnr_obj[i].id + '">' +
                '<span class="icon is-small">' +
                '<i class="icon-remove-circle"></i>' +
                '</span>' +
                '<span>Close</span>' +
                '</a>' +
                '</p>' +
                '</div>';
            $("#qnr-tabs-container").append( 
                "<div class='qnr_tab_pane' id='qnr-" + qnr_obj[i].id + "'>" + controls +
                "<div class='tabcontent'>"+
                '<br><h1 class="is-size-3 has-text-centered">' + qnr_obj[i].title + '</h1>' +
                '<h1 class="is-size-4 has-text-centered">' + qnr_obj[i].description + '</h1>' +
                '<hr>' +
                qnr_obj[i].questionaire +
                "</div>");
            $("#qnr-tabs-container").tabs("refresh");
        }
    });

    $("#form-wrapper").on("click","ul li.qnr_tab a",function(){
        var theme = $("#theme-color").val();
        $(".qnr_tab").removeClass("bg-" + theme);
        $(".qnr_tab.ui-state-active").addClass("bg-" + theme);
    });

    $("#form-wrapper").on("click",".expand_form",function(){
        
        
    });

    $("#form-wrapper").on("click",".close_form",function(){
        $($(this).attr("content")).remove();
        $($(this).attr("handle")).parent().remove();
        $("#qnr-tabs-container").tabs("refresh");
        $(".qnr_tab.ui-state-active").addClass("bg-" + $("#theme-color").val());
        $(".panel-block.qnr-titles").removeClass("is-active");
    });

    $("#form-wrapper").on("click",".share_form",function(){
        $("#qnr_tabs_container").empty();
         
           
    });
});

var view_qnr_layout = function(){

    var template = "<div class='columns'><div class='column is-3' id='qnr-titles'></div>" +
        "<div class='column is-9' id='view-tabs-container'>"+
    
        "<div class='is-boxed' id = 'qnr-tabs-container' >" +
        "<ul id='qnr_tabs_holder'>" +
        "<li class='qnr_tab bg-dark'><a href='#welcome'>Welcome Page</a> </li>" +
        "</ul>" +
        "<div class='qnr_tab_pane' id='welcome'>" +
        "<h1 class='has-text-"+$("#theme-color").val()+" gen-text has-text-centered is-size-3'>Welcome To The Questionaire Explore Page</h1><hr>" +
        "</div>" +
        "</div></div></div>";

    return template;
};





var organize_layout = function(){
    if ($(this.el_1).innerHeight() < $(this.el_2).innerHeight()){
        $(this.el_2).innerHeight($(this.el_1).innerHeight());
    }
    else{
        $(this.el_2).innerHeight($(this.el_1).innerHeight());
    }
    $(this.el_2 + "," + this.el_1).css({overflow:"scroll"});
}

  