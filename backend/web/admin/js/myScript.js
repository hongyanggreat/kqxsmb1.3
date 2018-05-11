$("document").ready(function(){ 

     var baseUrl = window.location.origin;
     $("body").on("click",'.checkAllModule',function(){
        var id = $(this).attr('id');
        var checkbox = 'checkbox'+id;
        //alert(checkbox);
        //$(checkbox)
        if($(this).hasClass('onchecked')){
             $('.'+checkbox).prop('checked', false);
            $('.'+checkbox).parent('span').removeClass('checked');
            $(this).removeClass('onchecked');
        }else{
            $('.'+checkbox).prop('checked', true);
            $('.'+checkbox).parent('span').addClass('checked');
            $(this).addClass('onchecked');
        }
     });  
     // FCKEDITOR
    for(var name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy(true);
    }
    if($("textarea[name='Services[CONTENT]']").length) {
       ckeditorFull('Services[CONTENT]');
    }
    if($("textarea[name='Services[FEATURES]']").length) {
       ckeditorMini('Services[FEATURES]');
    }
    if($("textarea[name='Services[PERFORMANCE_TEXT]']").length) {
       ckeditorMini('Services[PERFORMANCE_TEXT]');
    }
    if($("textarea[name='Articles[CONTENT]']").length) {
       ckeditorFull('Articles[CONTENT]');
    }
   
    if($("textarea[name='ServiceOptions[CONTENT]']").length) {
       ckeditorFull('ServiceOptions[CONTENT]');
    }

    
 });