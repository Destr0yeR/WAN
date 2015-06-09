function extender(val){
	var $id_info=obtenerId_info(val);
	var $id_icon=obtenerId_icon(val);
	var $ext=$('.ft_extendido');
	$('.ft_todo').children('.ft_item').toggle();
	if(!$ext.is(':hidden')){
		$ext.hide();
		cerrar($id_icon,$id_info);
	}	
	else{
		$ext.show();
		abrir($id_icon,$id_info);
	}
}
function abrir($icon,$info){
	$icon.show();
	$icon.siblings().hide();
	$info.show();
	$info.siblings().hide();
}
function cerrar($icon,$info){
	$('.ft_extendido').hide();
	$('.ft_todo .ft_item').hide();
	$icon.siblings().show();
	$icon.show();
	$info.siblings().hide();
	$info.hide();
}
function siguiente(){
	var $sgte=$('.opciones').children(':visible');
	if($sgte.next().hasClass('ft_item')){
		var $icn=obtenerId_icon($sgte.next().attr('id'));
		var $inf=obtenerId_info($sgte.next().attr('id'));
		abrir($icn,$inf);
	}
	else{
		var $icn=obtenerId_icon($sgte.attr('id'));
		var $inf=obtenerId_info($sgte.attr('id'));
		cerrar($icn,$inf);	
	}
}
function anterior(){
	var $sgte=$('.opciones').children(':visible');
	if($sgte.prev().hasClass('ft_item')){
		var $icn=obtenerId_icon($sgte.prev().attr('id'));
		var $inf=obtenerId_info($sgte.prev().attr('id'));
		abrir($icn,$inf);
	}
	else{
		var $icn=obtenerId_icon($sgte.attr('id'));
		var $inf=obtenerId_info($sgte.attr('id'));
		cerrar($icn,$inf);	
	}
}
function obtenerId_info(cad){
	return $('#'+cad.split('_')[0]+'_info')
}
function obtenerId_icon(cad){
	return $('#'+cad);
}