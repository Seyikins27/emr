$(document).ready(function(){
    $("#gen").click(function(){
      
       var url="admin/gen";
	   $.get(url, function(o){
		   $('#id').html(o);
	   });

    });

});