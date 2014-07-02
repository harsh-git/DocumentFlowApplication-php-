add constraints beside role like department
forms , tables , master table
create update 

role mapping as per app












<!--
<table class='overview-table'><tr><th><?php echo $app; ?></th></tr>

				<?php foreach ($roles as $key => $role) {
					?>
					<tr><th><?php echo $role; ?></th></tr>
					<?php

					if($role=='pl'){ 
						$location = "create/1/".$app."-".$role;

						?>
						<tr><td><h3><a href=<?php echo $location ;?>Create/Draft</a></h3></td></tr>	
						<?php				
					}
					else{
						$location = "create/1/".$app."-".$role;

						?>
						<tr><td><h3><a href=<?php echo $location ;?>Create/Draft</a></h3></td></tr>					
						<?php
					}
					$str= $str."Previous Stations  ->   ";
					$prev = $appschema->prevStations($app,$role);
					$next = $appschema->nextStations($app,$role);
					$str = $str.returndisparr($prev);
					$str= $str."<br/>Next Stations  ->   ";
					$str = $str.returndisparr($next);
				}
			}
			?></table>
