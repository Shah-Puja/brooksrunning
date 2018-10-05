// Other popup JS
    $(document).ready(function() {
        $(".slideImg-popup--control").click(function(){
            var imageurl = $(this).find('img').data('bigimage');
        $('.br-bigImage').attr("src", imageurl);
            $("#slideImg-popup--wrapper").addClass("show");
        });
        $(".slideImg-popup--close").click(function(){
            $("#slideImg-popup--wrapper").removeClass("show");
        });
        
    });