<?php
include('cabecera.php');
echo "<b>Ficha de recolección de información de herramienas desarrolladas para la gestión integral de riesgos.</b>";	    
       /*echo" <h1>Hello World!</h1>
        <h2 class='nav-tab-wrapper'>
        <div class='nav-tab' href=''>Datos personales</div>

        <a class='nav-tab nav-tab-active' href=''>General</a>
        <a class='nav-tab' href=''>Footer</a>
       </h2>"; */


echo "
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
	    	<span class='glyphicon glyphicon-option-vertical' aria-hidden='true'></span>Settings</a>
	    </li>
	  </ul>
	<div class='tab-content'>
	    <div role='tabpanel' class='tab-pane active' id='generales'>
			<div class='table-responsive'>
				<table class='table table-hover table-bordered'>
					<tr>
						<th>Nombre de la herramienta</th>
						<td>
							<input type=text name=nombre required size=35>
						</td>
					</tr>
					<tr>
						<th>Objetivo de la herramienta
						</th>
						<td>
							<input type=text name=nombre required size=35>
						</td>
					</tr>
					<tr>
						<th>
							Institución o persona que elaboró la herramienta
						</th>
						<td>
							<input type=text name=nombre required size=35>
						</td>
					</tr>
					<tr>
						<th>
							Lugar y Fecha de elaboración
						</th>
						<td>
							<input type=text name=nombre required size=35>
							<input type=date name=fechaelaboracion required>
						</td>
					</tr>
					<tr>
						<th>
							Lugar y Fecha de actualización
						</th>
						<td>
							<input type=text name=lugar required size=35>
							<input type=date name=fechaactualizacion required>
						</td>
					</tr>
					<tr>
						<th>
							Institución o persona que presenta la herramienta
						</th>
						<td>
							<input type=text name=nombre required size=35>
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
				    				<th class='text-center'>ANÁLISIS DE RIESGO</th>
				    				<th class='text-center'>REDUCCIÓN DE RIESGOS</th>
				    				<th class='text-center'>MANEJO DE EVENTOS ADVERSOS</th>
				    				<th class='text-center'>RECUPERACIÓN</th>
				    				<th class='text-center'>OTROS</th>
				    			</tr>
				    			<tr>
				    				<td>
				    					<input type=checkbox name='estudioAmenaza'>Estudio de amenazas <br>
				    					<input type=checkbox name='analisisVulnerabilidad'>Análisis de vulnerabilidades
				    				</td>
				    				<td>
				    					<input type=checkbox name='prevencion'>Prevención</br>
				    					<input type=checkbox name='mitigacion'>Mitigación
				    				</td>
				    				<td>
				    					<input type=checkbox name='alerta'>Alerta</br>
				    					<input type=checkbox name='preparacion'>Preparación</br>
				    					<input type=checkbox name='respuesta'>Respuesta
				    				</td>
				    				<td>
				    					<input type=checkbox name='rehabiltacion'>Rehabilitación</br>
				    					<input type=checkbox name='reconstruccion'>Reconstrucción
				    				</td>
				    				<td>
				    					<textarea cols=25 rows=4></textarea>
				    				</td>
				    			</tr>	 
				    		</table>
				    	</td>
				    </tr>
				</table>
	    	</div>
		</div>
	    <div role='tabpanel' class='tab-pane' id='clasificacion'>
	    	<div class=table-responsive>
			<table class='table table-bordered table-hover'>
				<tr class=success>
					<th class='text-center' colspan=6> TIPO DE HERRAMIENTA </th>
				</tr>
				<tr>
					<td>Capacitación <input type=checkbox name='capacitacion'></td>
					<td>Consulta <input type=checkbox name='consulta'></td>
					<td>Audio <input type=checkbox name='audio'></td>
					<td>Video <input type=checkbox name='video'></td>
					<td>Planes <input type=checkbox name='planes'></td>
					<td>Normativa Legal <input type=checkbox name='normativa'></td>
				</tr>
				<tr class=success>
					<th class='text-center' colspan=6> CLASE DE HERRAMIENTA </th>
				</tr>
				<tr>
					<td colspan=2>Técnico <input type=checkbox name='tecnico'></td> 
					<td colspan=2>Técnico – Científico <input type=checkbox name='tecnico_cientifico'></td>
					<td colspan=2>Educativo <input type=checkbox name='educativo'></td>
				</tr>
				<tr class=success>
					<th class='text-center' colspan=6>
						ÁMBITO DE APLICACIÓN
					</th>
				</tr>
				<tr>
					<td colspan=2>		 
						<input type=checkbox name='tecnico_cientifico'>Comisión Nacional de Protección Civil
						</br>
						<input type=checkbox name='tecnico_cientifico'>Comisión Comunal de Protección Civil
						</br>
						<input type=checkbox name='tecnico_cientifico'>Centros  Educativos  (Públicos  y Privados)
					</td>
					<td colspan=2>
						<input type=checkbox name='tecnico_cientifico'>Comisión  Departamental  de Protección Civil
						</br>
						<input type=checkbox name='tecnico_cientifico'>Comisiones Técnicas Sectoriales
						</br>
						<input type=checkbox name='tecnico_cientifico'>Instituciones Públicas y Privadas					
					</td>
					<td colspan=2>
						<input type=checkbox name='tecnico_cientifico'>Comisión Municipal de Protección Civil
						</br>
						<input type=checkbox name='tecnico_cientifico'>Dirección General de Protección Civil
						</br>
						<input type=checkbox name='tecnico_cientifico'>Otros (especifique)
						</br>
						<input type=text name=otros> 						
					</td>
	  			</tr>
			</table>
			</div>
		</div>
	    <div role='tabpanel' class='tab-pane' id='mecanismos'>..lllll.</div>
	    <div role='tabpanel' class='tab-pane' id='settings'>.mnmnmn..</div>
	</div>
</div>
";
?>