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
