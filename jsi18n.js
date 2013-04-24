jQuery(document).ready(function($) {
	$(".jsi18n-choose").each(function() {
		$(this).find("> *").hide();
		var found=false;
		for(var i=0,max=jsi18n.length;i<max;i++){
			$(this).find("> .jsi18n-"+jsi18n[i].lang).each(function(){
				$(this).show();
				found=true;
			});
			if(found){
				break;
			}
		}
		if(!found){
			$(this).find("> .jsi18n-default").show();
		}
	});
});