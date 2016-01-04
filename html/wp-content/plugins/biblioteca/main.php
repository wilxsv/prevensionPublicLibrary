<?php
/*
Plugin Name: Biblioteca Virtual
Description: Administración de Herramientas virtuales de la DGPC.
Author: [Dirección General de Proteccion Civil.]
Version: 0.6
*/
register_activation_hook( __FILE__, 'createDB' );
add_action('admin_menu', 'setup_menu');
add_action('admin_menu', 'setup_menu');
add_action('wp_ajax_get_instituciones', 'ajax_get_instituciones');
add_action('wp_ajax_insert_institucion', 'ajax_insert_institucion');
function createDB(){
	include('load.php');
}
function setup_menu(){

	require('setupMenu.php'); 
}
 
function FormHerramientas(){
	require('catalogs/formularioHerramienta.php');
}
	
function listadoHerramienta(){
	require('view/listHerramienta.php');
}
function loadArea(){
	require('area.php');
} 
function parametros(){

	include('catalogs/catalogos.php');
}

function viewLateral(){
	include('view/lateralSearch.php');
}
function viewContent(){

	include('view/contentSearch.php');
}
function ajax_get_instituciones(){
	global $wpdb;
	$instituciones=$wpdb->get_results( 
		"select dgpc_institucion.idinstitucion,dgpc_institucion.nombre from dgpc_institucion order by dgpc_institucion.nombre"    
		);
	$return=array();
	$p=0;
	foreach ($instituciones as $value) {
		$return[$p]=array('value' =>  $value->idinstitucion, 'nombre'=>$value->nombre);
		$p++;
	}
	wp_send_json($return);
	
	
}
function ajax_insert_institucion(){
	global $wpdb;
	$return=array();
	if(isset($_POST["nombre"])){
  		$seleccionpresenta= $_POST["nombre"];
		  $r=$wpdb->query( 
		  $wpdb->prepare( 
		        "INSERT INTO dgpc_institucion (nombre) VALUES (%s)", 
		         $seleccionpresenta) 
		  		);
		  $return[0]=array("result"=>'success');
	}
	wp_send_json($return);

}
//the_content
?>