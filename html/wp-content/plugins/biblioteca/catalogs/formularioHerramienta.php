<?php
include('cabecera.php');
echo "<b>Ficha de recolección de información de herramienas desarrolladas para la gestión integral de riesgos.</b>";	    
global $wpdb;
$instituciones=$wpdb->get_results( 
		"select dgpc_institucion.idinstitucion,dgpc_institucion.nombre from dgpc_institucion order by dgpc_institucion.nombre"    
		);
$areas=$wpdb->get_results( 
		"select distinct dgpc_area.idarea,dgpc_area.nombre from dgpc_area inner join dgpc_componente on dgpc_area.idarea=dgpc_componente.idarea  order by dgpc_area.nombre"    
		);
$tipos=$wpdb->get_results( 
		"select  dgpc_tipoherramienta.idtipo,dgpc_tipoherramienta.nombre from dgpc_tipoherramienta  order by dgpc_tipoherramienta.nombre"    
		);
$clases=$wpdb->get_results( 
		"select  dgpc_claseherramienta.idclase,dgpc_claseherramienta.nombre from dgpc_claseherramienta  order by dgpc_claseherramienta.nombre"    
		);
$ambitos=$wpdb->get_results( 
		"select  dgpc_ambitoaplicacion.idambito,dgpc_ambitoaplicacion.nombre from dgpc_ambitoaplicacion  order by dgpc_ambitoaplicacion.nombre"    
		);
$mecanismos=$wpdb->get_results( 
		"select  dgpc_criteriovalidacion.idcriterio,dgpc_criteriovalidacion.nombre from dgpc_criteriovalidacion  order by dgpc_criteriovalidacion.idcriterio"    
		);
$grupos=$wpdb->get_results( 
		"select  dgpc_grupovulnerable.idgrupo,dgpc_grupovulnerable.nombre from dgpc_grupovulnerable  order by dgpc_grupovulnerable.nombre"    
		);
$incluye=$wpdb->get_results( 
		"select  dgpc_itemincluye.iditem,dgpc_itemincluye.nombre from dgpc_itemincluye  order by dgpc_itemincluye.nombre"    
		);
$preguntas=$wpdb->get_results( 
		"select  dgpc_preguntas.idpregunta,dgpc_preguntas.pregunta from dgpc_preguntas  order by dgpc_preguntas.idpregunta"    
		);
/*$contactos=$wpdb->get_results( 
		"select  * from dgpc_contacto  order by dgpc_contacto.nombre"    
		);
*/
?>
<?php
if(isset($_POST["newherramienta"])){
	$nombre=$_POST["nombre"];
	$objetivo=$_POST["objetivo"];	
	$idinstitucionelaboro=$_POST["idinstitucionelaboro"];
	$lugarelaboracion=$_POST["lugarelaboracion"];
	$fechaelaboracion=$_POST["fechaelaboracion"];
	$lugaractualizacion=$_POST["lugaractualizacion"];
	$fechaactualizacion=$_POST["fechaactualizacion"];
	$idinstitucionpresenta=$_POST["institucionpresenta"];
	$pais=$_POST["pais"];
	//Asumiendo que son excluyentes
	$idcomponente=$_POST["componente"][0];
	$idtipoherramienta=$_POST["tipo"][0];
	$idclaseherramienta=$_POST["clase"][0];

$r=$wpdb->query(
			$wpdb->prepare(
				"INSERT INTO  dgpc_herramienta ( nombre ,  objetivo , 
					 idinstitucionelaboro ,  lugarelaboracion ,  fechaelaboracion , 
					 lugaractualizacion ,  fechaactualizacion ,  idinstitucionpresenta , 
					 idcomponente ,  idtipoherramienta ,  idclaseherramienta , pais ) 
				VALUES (%s,%s,%d,%s,%s,%s,%s,%d,%d,%d,%d,%s)"
				,$nombre,$objetivo,$idinstitucionelaboro,$lugarelaboracion,$fechaelaboracion,
				$lugaractualizacion,$fechaactualizacion,$idinstitucionpresenta,$idcomponente,
				$idtipoherramienta,$idclaseherramienta,$pais
				)
		);
	if($r==1){
		echo "
		<div>
  			<div class='alert alert-success'>
    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    			<strong>Registro almacenado correctamente!</strong> 
    			
  			</div>
		</div>
	";
	}else{
		echo "
		<div>
  			<div class='alert alert-warning'>
    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    			<strong>Se ha producido un error al intentar almacenar, compruebe los datos</strong> 
    			
  			</div>
		</div>
	";
	}
	
}
?>
<form method="post"name=registroh id=registroh>
<div>
  	<!-- Nav tabs -->
	  <ul class='nav nav-tabs' role='tablist' id='myTabs'>
	    <li role='presentation' class='active'>
	    	<a href='#generales' aria-controls='generales' role='tab' data-toggle='tab'>
	    	<span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span>Generales</a>
	    </li>
	    <li role='presentation'>
	    	<a href='#clasificacion' aria-controls='clasificacion' role='tab' data-toggle='tab'>
	    	<span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span>Clasificación y ámbito de aplicación</a>
	    </li>
	    <li role='presentation'>
	    	<a href='#mecanismos' aria-controls='mecanismos' role='tab' data-toggle='tab'>
	    	<span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span>Validación / Prueba de la Herramienta</a>
	    </li>
	    <li role='presentation'>
	    	<a href='#settings' aria-controls='settings' role='tab' data-toggle='tab'>
	    	<span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span>¿Cómo?</a>
	    </li>
	     
	  </ul>
	<div class='tab-content'>
	    <div role='tabpanel' class='tab-pane active' id='generales'>
			<div class='table-responsive'>
				<table class='table table-hover table-bordered'>
					<tr>
						<th>Nombre de la herramienta</th>
						<td>
							<input type=text name=nombre id=nombre  size=35>
						</td>
					</tr>
					<tr>
						<th>Objetivo de la herramienta
						</th>
						<td>
							<input type=text name=objetivo  size=35>
						</td>
					</tr>
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
							<select name=idinstitucionelaboro>
								<?php
									foreach ($instituciones as $reg) {
										echo "<option value=".$reg->idinstitucion.">".$reg->nombre."</option>";
									}
								?>
							</select>
							<!--
							<button type=button class='btn btn-success'>
								<span class='glyphicon glyphicon-search'></span>
							</button>-->
							</div>

						</td>
					</tr>
					<tr>
						<th>
							Lugar y Fecha de elaboración
						</th>
						<td>
							<input type=text name=lugarelaboracion  size=35>
							<label for="fechaelaboracion" class="btn"><span class="glyphicon glyphicon-calendar"></span>
							 </label>
							<input id="fechaelaboracion" name=fechaelaboracion type="text" class="date-picker" size=9  />	       
						</td>
					</tr>
					<tr>
						<th>
							Lugar y Fecha de actualización
						</th>
						<td>
							<input type=text name=lugaractualizacion   size=35>
							<label for="fechaactualizacion" class="btn"><span class="glyphicon glyphicon-calendar"></span>
							 </label>
							<input id="fechaactualizacion" name=fechaactualizacion type="text" class="date-picker" size=9   />
						</td>
					</tr>
					<tr>
						<th>
							Institución o persona que presenta la herramienta
						</th>
						<td>
							<div id=selectinstituciones>
								<select name=institucionpresenta>
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
				    				$opcionesComp;
                                    $z=1;

				    					foreach ($areas as $reg) {
                                            $grupo="grupo".$z;
				    				?>
				    				<th class='text-left'><?php echo $reg->nombre;?>
				    								<?php
				    								
				    								$componentes=$wpdb->get_results($wpdb->prepare( 
				    									"select dgpc_componente.idcomponente,dgpc_componente.nombre from dgpc_componente 
				    									 where dgpc_componente.idarea=%d order by dgpc_componente.nombre" , $reg->idarea)    
														);
				    								foreach ($componentes as $c) {
                                                        if(isset($opcionesComp[$grupo])) {
                                                            $opcionesComp[$grupo] .= "<input type=checkbox name=componente[] value='" . $c->idcomponente . "'>" . $c->nombre . "<br>";
                                                        }else{
                                                            $opcionesComp[$grupo] = "<input type=checkbox name=componente[] value='" . $c->idcomponente . "'>" . $c->nombre . "<br>";
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
	    	
	    <div role='tabpanel' class='tab-pane' id='clasificacion'>
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
							 			<input type=checkbox name=tipo[] value=".$t->idtipo.">".$t->nombre."<br>";
							 		}else{
							 			echo"</td><td colspan=$col>
							 			<input type=checkbox name=tipo[] value=".$t->idtipo.">".$t->nombre."<br>";
							 		}
							 	}else{
							 		echo "<input type=checkbox name=tipo[] value=".$t->idtipo.">".$t->nombre."<br>";
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
												<input type=checkbox name=clase[] value=".$c->idclase.">".$c->nombre."<br>";
											}else{
												echo"</td><td colspan=$col>
												<input type=checkbox name=clase[] value=".$c->idclase.">".$c->nombre."<br>";
											}
									}else{
										echo "<input type=checkbox name=clase[] value=".$c->idclase.">".$c->nombre."<br>";
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
										<input type=checkbox name=ambito[] value=".$a->idambito.">".$a->nombre."<br>";
									}else{
										echo"
										</td><td colspan=$col>
										<input type=checkbox name=ambito[] value=".$a->idambito.">".$a->nombre."<br>";
									}
									

								}else{
								echo "<input type=checkbox name=ambito[] value=".$a->idambito.">".$a->nombre."<br>";

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
	    <div role='tabpanel' class='tab-pane' id='mecanismos'>
	    	<div class=table-responsive>
			<table class='table table-bordered table-hover'>
				<tr class=success>
					<th class='text-center' colspan=6> MECANISMOS DE VALIDACIÓN O PRUEBA DE LA HERRAMIENTA</th>
				</tr>
				<?php
						foreach ($mecanismos as $m) {
							echo "<tr><td colspan=2>".$m->nombre."</td>";
							echo "<td colspan=4>
							<input type=hidden name=mecanismoid[] value=".$m->idcriterio.">
							<textarea name=mecanismorespuesta[]   cols=65 rows=3></textarea></td></tr>";
						}
					?>
				
				
				<tr class=success>
					<th class='text-center' colspan=6>Que grupos vulnerables afecta</th>
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
												<input type=checkbox name=grupo[] value=".$g->idgrupo.">".$g->nombre."<br>";
											}else{
												echo"
													</td><td colspan=$col>
													<input type=checkbox name=grupo[] value=".$g->idgrupo.">".$g->nombre."<br>";
											}
										}else{
											echo "<input type=checkbox name=grupo[] value=".$g->idgrupo.">".$g->nombre."<br>";
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
						LA HERRAMIENTA INCLUYE
					</th>
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
										foreach ($incluye as $i) {
											if($cuenta%3==0){
												if($cuenta==0){
													echo"
														<td colspan=$col>
														<input type=checkbox name=incluye[] value=".$i->iditem.">".$i->nombre."<br>";
												}else{
													echo"
													</td><td colspan=$col>
													<input type=checkbox name=incluye[] value=".$i->iditem.">".$i->nombre."<br>";
												}
											}else{
												echo "<input type=checkbox name=incluye[] value=".$i->iditem.">".$i->nombre."<br>";
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

	    <div role='tabpanel' class='tab-pane' id='settings'>
	    <table class='table table-bordered table-hover'>
	     	
	  				
	  				<?php 
	  					foreach ($preguntas as $p) {
	  						echo "<tr><td colspan=6>".$p->pregunta."</td></tr>
	  						<tr><td colspan=6><textarea name=pregunta[] cols=128 rows=4></textarea></td></tr>";
	  					}
	  				?>	
	  			<!--<tr>
	  				<td colspan="6">
	  				Contacto:
	  					<select name=contacto>
	  						<?php
	  							/*foreach ($contactos as $con) {
	  								echo"<option value=".$con->idcontacto.">".$con->nombre. "&nbsp;". $con->cargo."</option";
	  							}*/
	  						?>

	  					</select>
	  				</td>
	  			</tr>-->
	
	  				<tr><td><div class='form-group col-md-5'>Datos del Contacto</div>
	  				<div class=clear></div>
							 <div class='form-group col-md-5'>
					    	 	<label for=newnombrecontacto>Nombre</label>
					    	 	<input type=hidden name=tab id=tab value='contacto'>		
					    		<input type=text name=newnombrecontacto id=newnombrecontacto class='form-control'  > 
					        </div>
					        <div class='form-group col-md-4'>
					        	<label for=newcargocontacto>Cargo</label>
					        	<input type=text name=newcargocontacto id=newcargocontacto class='form-control'  > 
					        </div>
					        <div class='form-group col-md-2'>
					        	<label for=newtelefonocontacto>Teléfono</label>
					        	<input type=text name=newtelefonocontacto id=newtelefonocontacto class='form-control'  > 
					        </div>
					        <div class='form-group col-md-6'>
					        	<label for=newemailcontacto>Correo electrónico</label>
					        	<input type=email name=newemailcontacto id=newemailcontacto class='form-control'  > 
					        </div>
					        <div class='form-group col-md-6'>
					        	<label for=newwebsitecontacto>Dirección de sitio web</label>
					        	<input type=url name=newwebsitecontacto id=newwebsitecontacto class='form-control'  > 
					        </div>
					        <div class='form-group col-md-1'>
								<button type='submit' class='btn btn-success' name=newherramienta id=newherramienta value='ok'>
									<span class='glyphicon glyphicon-plus'></span>Guardar datos de Herramienta
								</button>
							</div>
						</td>		  			
	  				</tr>
	     </table>
		</div>

</div>
</form>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('#pubInicio').datepicker({
        dateFormat : 'yy-mm-dd',
        showOn: "button",
        minDate: new Date(),
		buttonImage: "images/date-button.gif",
		buttonImageOnly: true,
		buttonText: "Fecha de inicio"
    });
    jQuery('#pubFin').datepicker({
        dateFormat : 'yy-mm-dd',
        showOn: "button",
		buttonImage: "images/date-button.gif",
		buttonImageOnly: true,
		buttonText: "Fecha de fin de publicacion",
		minDate: $("#pubInicio").datepicker("getDate")

    });

    $(".date-picker").datepicker({dateFormat:'yy-mm-dd'});


});
</script>

