<?php
 add_menu_page('Listado de recursos en la biblioteca virtual', 'Biblioteca Virtual', 'manage_options', 'bvirtual', 'listadoHerramienta', 'dashicons-book-alt');
 add_submenu_page('bvirtual', 'Ficha de Biblioteca Virtual', 'Agregar herramienta','manage_options', 'agregaHerramienta','FormHerramientas');
 add_submenu_page('bvirtual', 'Parámetros generales', 'Parametros','manage_options', 'catalogo-herramienta','parametros');
?>
