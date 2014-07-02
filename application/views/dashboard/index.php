
<div class="content">
	<?php
	
	$appschema = new Appschema();


	$user_roles = $_SESSION['user_roles'];?>



	
	<div class="container_12">
		<center>
			<h2>
				<?php echo $this->msg;     ?>
			</h2>
		</center>


		<div class="clear"></div>


		<?php foreach ($user_roles as $app => $roles) {
				
				if($appschema->app_exists($app) || 1){?>

					<div class="grid_4 prefix_1 suffix_1 " style="margin:0.2em;border:3px solid blue;display:block;padding:1em">
						<h3>

							<?php echo $app; ?>
						</h3>

						<p>Your Roles : <br/></p>
						<ul>
							<?php foreach ($roles as $key => $role) { 
								$operation = 1;
								$url =  URL.$app."app/index/".$role;

								?>

							<li> <a href= <?php echo $url ; ?>><?php echo $role; ?> </a></li>
							<?php } ?>
						</ul>
					</div>
				<?php

				}

        
		}

		?>

	</div>


	







</div>











</div>

