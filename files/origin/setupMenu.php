<?php
       add_menu_page(
       		'Ficha de Biblioteca Virtual', 
        	'Ficha de Biblioteca Virtual', 
        	'manage_options', 
        	'form-biblioteca-virtual', 
        	'FormHerramientas',
        	'dashicons-book-alt',
        	22		
        	 );

       add_submenu_page('form-biblioteca-virtual', 'Parámetros generales', 'Parámetros generales','manage_options', 'catalogos-herramientas','parametros');
?>