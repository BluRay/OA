function check_all(ck) {
	if ($(ck).attr('checked')) {
		$("form :input[name='id[]']").each(function() {
			$(this).attr('checked','checked');
			$(this).parent().parent().addClass('highlight');
		});
	} else {
		$("form :input[name='id[]']").each(function() {
			$(this).removeAttr('checked');
			$(this).parent().parent().removeClass('highlight');
		});
	}
}
function showMenus(targetid){
     if (document.getElementById){
         target=document.getElementById(targetid);
             if (target.style.display=="none"){
                 target.style.display="block";
             } else {
                 target.style.display="none";
             }
     }
}