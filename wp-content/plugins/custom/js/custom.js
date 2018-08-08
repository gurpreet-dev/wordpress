jQuery(document).ready(function(){

    jQuery("#btn1").click(function(){
        alert('clicked!');
    });

    jQuery("#btn2").click(function(){
        jQuery.ajax({
            type : "post",
            dataType : "html",
            url : myAjax.ajaxurl,
            data : {action: "get_posts"},
            success: function(response) {
                jQuery("#all_movies").html(response);
            }
        });
    });       

});
