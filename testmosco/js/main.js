// JavaScript Document
//IcEmOsCo 06/2017
//icemosco@gmail.com

$('.idea_nav_btn').click(function() {
	$(this).addClass('selected_menu');
	var id=$(this).attr('title');
	$('html, body').animate({scrollTop: $("#"+id).offset().top}, 1000);
	
});

$('document').ready(function(){
var info1=1;
//var info2=0;*/
//var info3=0;
$('.vermas_infografias').click(function(){
if(info1===1){
	 $('#info2').slideDown(900);
	$('.vermas_infografias').html('Ocultar Infografía');
	info1=2;
	
}else if(info1===2){
	$('#info2').slideUp(900);
	$('.vermas_infografias').html('Ver más infografías');
	info1=1;
}

	
	
});//click function
	
});	//ready
	

