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
