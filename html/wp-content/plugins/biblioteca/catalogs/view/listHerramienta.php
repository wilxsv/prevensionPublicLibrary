<div class="wrap">
 <h1>Listado de Herramientas registradas en la biblioteca</h1>
 <table class="wp-list-table widefat fixed striped posts">
  <thead>
   <tr>
	<th class="manage-column">Nombre</th>
    <th class="manage-column">Publicada</th>
    <th class="manage-column">Componente</th>
    <th class="manage-column">Tipo</th>
    <th class="manage-column">Clase</th>
    <th class="manage-column">Peso</th>
    <th class="manage-column">Acciones</th>
   </tr>
  </thead>
  <tbody id="the-list">
   <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
   <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
  </tbody>
  <tfoot>
	<th class="manage-column">Nombre</th>
    <th class="manage-column">Publicada</th>
    <th class="manage-column">Componente</th>
    <th class="manage-column">Tipo</th>
    <th class="manage-column">Clase</th>
    <th class="manage-column">Peso</th>
    <th class="manage-column">Acciones</th>
  </tfoot>
 </table>
 <div class="card pressthis">
  <p>Informacion que se considere necesaria ...... o derechos de autor de proteccion civil</p>
 </div>
</div>
<?php /*include(plugin_dir_path( __FILE__ )."../cabecera.php"); */ ?>
<!--
<div class="tab-content"> 
 <div class="row">
  <div class="table-responsive">
   <table class="table table-hover ">
	<thead>
	 <tr>
	  <th class="text-center">Código</th>
	  <th class="text-center">Nombre del área </th>
	 </tr>
	</thead>
	<tbody>
	 <tr>
	  <td></td>
	  <td></td>
	  <td>
	   <button type="button" class="btn btn-success editFicha" name="editFicha" id="editFicha" value="">
		<span class="glyphicon glyphicon-pencil"></span>
	   </button>
	   <button type="button" class="btn btn-warning borrarFicha" name="borrarFicha" id="borrarFicha" value="">
		<span class="glyphicon glyphicon-trash"></span>
	   </button>
	  </td>
	 </tr>
	</tbody>	
   </table>
  </div>
 </div>
</div>
-->
<div class='table-responsive'>
        <table class='table table-hover table-bordered'>
         <tr>
          <td>Descripción</td>
          <td><input type=text name=nombre required/></td>
         </tr>
         <tr>
          <td>Idioma</td>
          <td>
           <select multiple>
        <option value="es">Español</option>
        <option value="en">Ingles</option>
        <option value="gr">Aleman</option>
       </select> 
          </td>
         </tr>
         <tr>
          <td>Subir archivo</td>
          <td><input type=file id=pubArchivo name=pubArchivo multiple=multiple required /></td>
         </tr>
         <tr>
          <td>Incio de publicación</td>
          <td>
           <input type='text' name="pubInicio" id='pubInicio' />
            </td>
         </tr>
         <tr>
          <td>Fin de publicación</td>
          <td><input type=text name=pubFin id=pubFin required/></td>
         </tr>
         <tr>
          <td>Acceso</td>
          <td><select><option value=1>Publico</option><option value=0>Privado</option></select></td>
         </tr>
         <tr>
          <td></td>
          <td>
           Guardar herramienta 
           <button type='submit' class='btn btn-success' name=newclase id=newclase value='ok'>
            <span class='glyphicon glyphicon-plus'></span>
           </button>
          </td>
         </tr>
        </table>
       </div>
      </div>