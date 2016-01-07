<?php
 wp_enqueue_script('jquery-ui-datepicker');
 wp_enqueue_script('jquery-ui');//
 wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/ui-lightness/jquery-ui.css');
 global $wpdb;
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
<script type="text/javascript">
 $(document).ready(function(){
  $(".parametrosDiv").hide();
  $(".show_hide").show();
  $('.show_hide').click(function(){
   $(".parametrosDiv").slideToggle();
  });
 });
 $(function() {
    $( "#tabs" ).tabs();
  }); 
</script>

<a href="#" class="show_hide">Buscar herramienta</a><br />
<div class="parametrosDiv">
 <div id="tabs">
  <ul>
    <li><a href="#tabs-1"><span class="breadcrumb-current">Generales</span></a></li>
    <li><a href="#tabs-2">Componente</a></li>
    <li><a href="#tabs-3">Clasificación y ambito</a></li>
  </ul>
  <div id="tabs-1">
    			<div class='table-responsive'>
				<table class='table table-hover table-bordered'>
					<tr>
						<th>País
						</th>
						<td>
							<select  name=pais>
													  <option>Afganistán</option> 
                      <option>Albania</option> 
                      <option>Alemania</option> 
                      <option>Andorra</option> 
                      <option>Angola</option> 
                      <option>Anguilla</option> 
                      <option>Antártida</option> 
                      <option>Antigua y Barbuda</option> 
                      <option>Antillas Holandesas</option> 
                      <option>Arabia Saudí</option> 
                      <option>Argelia</option> 
                      <option>Argentina</option> 
                      <option>Armenia</option> 
                      <option>Aruba</option> 
                      <option>Australia</option> 
                      <option>Austria</option>  
                      <option>Azerbaiyán</option>  
                      <option>Bahamas</option>  
                      <option>Bahrein</option>  
                      <option>Bangladesh</option>  
                      <option>Barbados</option>  
                      <option>Bélgica</option>  
                      <option>Belice</option>  
                      <option>Benin</option>  
                      <option>Bermudas</option>  
                      <option>Bielorrusia</option>  
                      <option>Birmania</option>  
                      <option>Bolivia</option>  
                      <option>Bosnia y Herzegovina</option>  
                      <option>Botswana</option>  
                      <option>Brasil</option>  
                      <option>Brunei</option>  
                      <option>Bulgaria</option>  
                      <option>Burkina Faso</option>  
                      <option>Burundi</option>  
                      <option>Bután</option>  
                      <option>Cabo Verde</option>  
                      <option>Camboya</option>  
                      <option>Camerún</option>  
                      <option>Canadá</option>  
                      <option>Chad</option>  
                      <option>Chile</option>  
                      <option>China</option>  
                      <option>Chipre</option>  
                      <option>Ciudad del Vaticano (Santa Sede)</option>  
                      <option>Colombia</option>  
                      <option>Comores</option>  
                      <option>Congo</option>  
                      <option>Congo, República Democrática del</option>  
                      <option>Corea</option>  
                      <option>Corea del Norte</option>  
                      <option>Costa de Marfíl</option>  
                      <option>Costa Rica</option>  
                      <option>Croacia (Hrvatska)</option>  
                      <option>Cuba</option>  
                      <option>Dinamarca</option>  
                      <option>Djibouti</option>  
                      <option>Dominica</option>  
                      <option>Ecuador</option>  
                      <option>Egipto</option>  
                      <option selected>El Salvador</option>  
                      <option>Emiratos Árabes Unidos</option>  
                      <option>Eritrea</option>  
                      <option>Eslovenia</option>  
                      <option>España</option>  
                      <option>Estados Unidos</option>  
                      <option>Estonia</option>  
                      <option>Etiopía</option>  
                      <option>Fiji</option>  
                      <option>Filipinas</option>  
                      <option>Finlandia</option>  
                      <option>Francia</option>  
                      <option>Gabón</option>  
                      <option>Gambia</option>  
                      <option>Georgia</option>  
                      <option>Ghana</option>  
                      <option>Gibraltar</option>  
                      <option>Granada</option>  
                      <option>Grecia</option>  
                      <option>Groenlandia</option>  
                      <option>Guadalupe</option>  
                      <option>Guam</option>  
                      <option>Guatemala</option>  
                      <option>Guayana</option>  
                      <option>Guayana Francesa</option>  
                      <option>Guinea</option>  
                      <option>Guinea Ecuatorial</option>  
                      <option>Guinea-Bissau</option>  
                      <option>Haití</option>  
                      <option>Honduras</option>  
                      <option>Hungría</option>  
                      <option>India</option>  
                      <option>Indonesia</option>  
                      <option>Irak</option>  
                      <option>Irán</option>  
                      <option>Irlanda</option>  
                      <option>Isla Bouvet</option>  
                      <option>Isla de Christmas</option>  
                      <option>Islandia</option>  
                      <option>Islas Caimán</option>  
                      <option>Islas Cook</option>  
                      <option>Islas de Cocos o Keeling</option>  
                      <option>Islas Faroe</option>  
                      <option>Islas Heard y McDonald</option>  
                      <option>Islas Malvinas</option>  
                      <option>Islas Marianas del Norte</option>  
                      <option>Islas Marshall</option>  
                      <option>Islas menores de Estados Unidos</option>  
                      <option>Islas Palau</option>  
                      <option>Islas Salomón</option>  
                      <option>Islas Svalbard y Jan Mayen</option>  
                      <option>Islas Tokelau</option>  
                      <option>Islas Turks y Caicos</option>  
                      <option>Islas Vírgenes (EE.UU.)</option>  
                      <option>Islas Vírgenes (Reino Unido)</option>  
                      <option>Islas Wallis y Futuna</option>  
                      <option>Israel</option>  
                      <option>Italia</option>  
                      <option>Jamaica</option>  
                      <option>Japón</option>  
                      <option>Jordania</option>  
                      <option>Kazajistán</option>  
                      <option>Kenia</option>  
                      <option>Kirguizistán</option>  
                      <option>Kiribati</option>  
                      <option>Kuwait</option>  
                      <option>Laos</option>  
                      <option>Lesotho</option>  
                      <option>Letonia</option>  
                      <option>Líbano</option>  
                      <option>Liberia</option>  
                      <option>Libia</option>  
                      <option>Liechtenstein</option>  
                      <option>Lituania</option>  
                      <option>Luxemburgo</option>  
                      <option>Macedonia, Ex-República Yugoslava de</option>  
                      <option>Madagascar</option>  
                      <option>Malasia</option>  
                      <option>Malawi</option>  
                      <option>Maldivas</option>  
                      <option>Malí</option>  
                      <option>Malta</option>  
                      <option>Marruecos</option>  
                      <option>Martinica</option>  
                      <option>Mauricio</option>  
                      <option>Mauritania</option>  
                      <option>Mayotte</option>  
                      <option>México</option>  
                      <option>Micronesia</option>  
                      <option>Moldavia</option>  
                      <option>Mónaco</option>  
                      <option>Mongolia</option>  
                      <option>Montserrat</option>  
                      <option>Mozambique</option>  
                      <option>Namibia</option>  
                      <option>Nauru</option>  
                      <option>Nepal</option>  
                      <option>Nicaragua</option>  
                      <option>Níger</option>  
                      <option>Nigeria</option>  
                      <option>Niue</option>  
                      <option>Norfolk</option>  
                      <option>Noruega</option>  
                      <option>Nueva Caledonia</option>  
                      <option>Nueva Zelanda</option>  
                      <option>Omán</option>  
                      <option>Países Bajos</option>  
                      <option>Panamá</option>  
                      <option>Papúa Nueva Guinea</option>  
                      <option>Paquistán</option>  
                      <option>Paraguay</option>  
                      <option>Perú</option>  
                      <option>Pitcairn</option>  
                      <option>Polinesia Francesa</option>  
                      <option>Polonia</option>  
                      <option>Portugal</option>  
                      <option>Puerto Rico</option>  
                      <option>Qatar</option>  
                      <option>Reino Unido</option>  
                      <option>República Centroafricana</option>  
                      <option>República Checa</option>  
                      <option>República de Sudáfrica</option>  
                      <option>República Dominicana</option>  
                      <option>República Eslovaca</option>  
                      <option>Reunión</option>  
                      <option>Ruanda</option>  
                      <option>Rumania</option>  
                      <option>Rusia</option>  
                      <option>Sahara Occidental</option>  
                      <option>Saint Kitts y Nevis</option>  
                      <option>Samoa</option>  
                      <option>Samoa Americana</option>  
                      <option>San Marino</option>  
                      <option>San Vicente y Granadinas</option>  
                      <option>Santa Helena</option>  
                      <option>Santa Lucía</option>  
                      <option>Santo Tomé y Príncipe</option>  
                      <option>Senegal</option>  
                      <option>Seychelles</option>  
                      <option>Sierra Leona</option>  
                      <option>Singapur</option>  
                      <option>Siria</option>  
                      <option>Somalia</option>  
                      <option>Sri Lanka</option>  
                      <option>St. Pierre y Miquelon</option>  
                      <option>Suazilandia</option>  
                      <option>Sudán</option>  
                      <option>Suecia</option>  
                      <option>Suiza</option>  
                      <option>Surinam</option>  
                      <option>Tailandia</option>  
                      <option>Taiwán</option>  
                      <option>Tanzania</option>  
                      <option>Tayikistán</option>  
                      <option>Territorios franceses del Sur</option>  
                      <option>Timor Oriental</option>  
                      <option>Togo</option>  
                      <option>Tonga</option>  
                      <option>Trinidad y Tobago</option>  
                      <option>Túnez</option>  
                      <option>Turkmenistán</option>  
                      <option>Turquía</option>  
                      <option>Tuvalu</option>  
                      <option>Ucrania</option>  
                      <option>Uganda</option>  
                      <option>Uruguay</option>  
                      <option>Uzbekistán</option>  
                      <option>Vanuatu</option>  
                      <option>Venezuela</option>  
                      <option>Vietnam</option>  
                      <option>Yemen</option>  
                      <option>Yugoslavia</option>  
                      <option>Zambia</option>  
                      <option>Zimbabue</option> 	
							</select>
						</td>
					</tr>
					<tr>
						<th>
							Institución o persona que elaboró la herramienta
						</th>
						<td>
							<div id=selectinstituciones>
							<select name=idinstitucionelaboro id=idinstitucionelaboro>
								<?php
									 foreach ($instituciones as $reg) {
										echo "<option value=".$reg->idinstitucion.">".$reg->nombre."</option>";
									} 
								?>
							</select>
							</div>

						</td>
					</tr>
					<tr>
						<th>
							Institución o persona que presenta la herramienta
						</th>
						<td>
							<div id=selectinstituciones>
								<select name=institucionpresenta id=institucionpresenta>
								<?php 
										foreach ($instituciones as $reg) {
											echo "<option value=".$reg->idinstitucion.">".$reg->nombre."</option>";
										} 
									?>
								</select>
							</div>
              
						</td>
					</tr>
					<tr>
						<th colspan=2 align=center>
							Marque en la casilla el área y componente a la que pertenece la herramienta
						</th>
					</tr>
				    <tr>
				    	<td colspan=2 align=center>
				    		<table class='table'>
				    			<tr class='success'>
				    				<?php 
				    				$z=1;
				    				
				    				$opcionesComp=array();
				    					foreach ($areas as $reg) {
				    					$grupo="grupo".$z;
				    				?>
				    				<th class='text-center'><?php echo $reg->nombre;?>
				    								<?php
				    								
				    								$componentes=$wpdb->get_results($wpdb->prepare( 
				    									"select dgpc_componente.idcomponente,dgpc_componente.nombre from dgpc_componente 
				    									 where dgpc_componente.idarea=%d order by dgpc_componente.nombre" , $reg->idarea)    
														);

				    								foreach ($componentes as $c) {
				    										if(isset($opcionesComp[$grupo])){
				    											$opcionesComp[$grupo].="<input type=checkbox name=componente[] value='". $c->idcomponente. "'>".$c->nombre."<br>";
				    										}else{
				    											$opcionesComp[$grupo]="<input type=checkbox name=componente[] value='". $c->idcomponente. "'>".$c->nombre."<br>";
				    										}
				    									}	
				    								?>	

				    					</th>
				    				<?php
				    					$z++;
				    				 }?>
				    			</tr>
				    			<tr>
				    				<?php
				    				
				    					foreach ($opcionesComp as $op) {
				    						echo "<td>$op</td>";
				    					}

				    				?>
				    			</tr>	 
				    		</table>
				    	</td>
				    </tr>
				</table>
	    	</div>
  </div>
  <div id="tabs-2">
    <div class='table-responsive'>
		<table class='table table-bordered table-hover'>
				<tr class=success>
					<th class='text-center' colspan=6> TIPO DE HERRAMIENTA </th>
				</tr>
				<tr>
					<td colspan=6>
						<?php
							$col=ceil(count($tipos)/3);
							$cuenta=0;
						?>
							<table class='table table-bordered table-hover'>
							<tr>	
							<?php
							
							foreach ($tipos as $t) {
								if($cuenta%3==0){
									if($cuenta==0){
							 			echo "<td colspan=$col>
							 			<input type=checkbox name=tipo[] value=".$t->idtipo.">".$t->nombre."</td>";
							 		}else{
							 			echo"<tr><td colspan=$col>
							 			<input type=checkbox name=tipo[] value=".$t->idtipo.">".$t->nombre."</td>";
							 		}
							 	}else{
							 		echo "<td colspan=$col><input type=checkbox name=tipo[] value=".$t->idtipo.">".$t->nombre."</td>";
							 	}	
							 	$cuenta++;	
							}
					?>
					</tr>
					</table>
				</td>
				</tr>
				<tr class=success>
					<th class='text-center' colspan=6> CLASE DE HERRAMIENTA </th>
				</tr>
				<tr>
				 <td colspan="6">
					<?php
							$col=ceil(count($clases)/3);
							$cuenta=0;
						?>
						<table class='table table-bordered table-hover'>
						<tr>	
							<?php
								foreach ($clases as $c) {
									if($cuenta%3==0){
											if($cuenta==0){
												echo"<td colspan=$col>
												<input type=checkbox name=clase[] value=".$c->idclase.">".$c->nombre."</td>";
											}else{
												echo"<tr><td colspan=$col>
												<input type=checkbox name=clase[] value=".$c->idclase.">".$c->nombre."</td>";
											}
									}else{
										echo "<td colspan=$col><input type=checkbox name=clase[] value=".$c->idclase.">".$c->nombre."</td>";
									}	
									$cuenta++;		
								}
							?>
						</tr>
						</table>	
				 </td>	
				</tr>
				<tr class=success>
					<th class='text-center' colspan=6>
						ÁMBITO DE APLICACIÓN
					</th>
				</tr>
				<tr>
					<td colspan="6">
						<?php
							$col=ceil(count($ambitos)/3);
							$cuenta=0;
						?>
						<table class='table table-bordered table-hover'>
							<tr>	
						<?php
							foreach ($ambitos as $a) {
								if($cuenta%3==0){
									if($cuenta==0){
										echo"
										<td colspan=$col>
										<input type=checkbox name=ambito[] value=".$a->idambito.">".$a->nombre."</td>";
									}else{
										echo"<tr><td colspan=$col>
										<input type=checkbox name=ambito[] value=".$a->idambito.">".$a->nombre."</td>";
									}
									

								}else{
								echo "<td colspan=$col><input type=checkbox name=ambito[] value=".$a->idambito.">".$a->nombre."</td>";

							}
							$cuenta++;
						}	
						?>
						</tr>
						</table>				
					</td>
	  			</tr>
			</table>
    </div>
  </div>
  <div id="tabs-3">
    <div class='table-responsive'>
		<table class='table table-bordered table-hover'>
				<tr class=success>
					<th class='text-center' colspan=6>QUÉ GRUPOS VULNERABLES AFECTA</th>
				</tr>
				<tr>
				 <td colspan=6>
				 	<?php
							$col=ceil(count($grupos)/3);
							$cuenta=0;
						?>
						<table class='table table-bordered table-hover'>
							<tr>	
								<?php
									foreach ($grupos as $g) {
										if($cuenta%3==0){
											if($cuenta==0){
											echo"
												<td colspan=$col>
												<input type=checkbox name=grupo[] value=".$g->idgrupo.">".$g->nombre."</td>";
											}else{
												echo"
													<tr><td colspan=$col>
													<input type=checkbox name=grupo[] value=".$g->idgrupo.">".$g->nombre."</td>";
											}
										}else{
											echo "<td colspan=$col><input type=checkbox name=grupo[] value=".$g->idgrupo.">".$g->nombre."</td>";
										}
										$cuenta++;		
									}
								?>
							</tr>
						</table>		
				 </td>	
				</tr>
			</table>
    </div>
  </div>
 </div>
</div>
<script type="text/javascript">
var selectActivo='';
jQuery(document).ready(function() {
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 changeMonth: true,
 changeYear: true, 
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
    $(".date-picker").datepicker();

//funcion ajax
    $('#addinstitucion').on('click', function(){
        $('#ModalAdd').modal();
        selectActivo=1;

      });
    $('#addinstitucion2').on('click', function(){
    $('#ModalAdd').modal();
      selectActivo=2;
      });
        
    $('#saveinstitucion').on('click', function(){
        registrarInstitucion();
         $('#ModalAdd').modal('hide');

    });   
  function getInstituciones(nombreIns,selectName){

  $.post( 'admin-ajax.php', {action: 'get_instituciones'}, function(data)
        {
          var q = data.length;
          
            if ( q > 0 ) {
               
                $(selectName).html('');
              for ( var i = 0; i < q; i++ )
                {
                 
                  if(selectName!=null){
                      if(nombreIns==data[i].nombre){
                           $(selectName).append("<option selected value="+data[i].value+">"+data[i].nombre+"</option>");
                      }else{
                           $(selectName).append("<option value="+data[i].value+">"+data[i].nombre+"</option>");
                      }
                  }
                }
            } 
        }, 'json');
  }

  function registrarInstitucion(){
      $.post( 'admin-ajax.php', {action: 'insert_institucion',nombre: $('#nombreinstitucion').val()}, function(data)
        {
          var q = data.length;
            if ( q > 0 ) {
              if(selectActivo==1){
               getInstituciones($('#nombreinstitucion').val(),'#idinstitucionelaboro');
              }else{
               getInstituciones($('#nombreinstitucion').val(),'#institucionpresenta');
              }
              
            } 
        }, 'json');
  }    
  
  getInstituciones(null,'#idinstitucionelaboro');
  getInstituciones(null,'#institucionpresenta');
});
</script>
