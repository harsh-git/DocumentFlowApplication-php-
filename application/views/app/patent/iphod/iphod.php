<div class="container_12">
		<center>
			<h2>
				<?php echo $this->msg;     ?>
			</h2>
		</center>


		<div class="clear"></div>

		<div class="grid_12 ">

		<div class="grid_3 alpha pull_1">
			<li><a href='iphod/left' target='iframecontent'>Pending ( <b><?php echo $this->pending; ?>  </b>)</a></li>
			<li><a href='iphod/approved' target='iframecontent'> Approved ( <b><?php echo $this->approved; ?>  </b>)</a></li>
		

		</div>		


		<div id="iframe_iphod" class="grid_8 prefix_1 omega pull_3">
			
			<iframe src="iphod/left" name='iframecontent' id='iframe_home' iframeborder=1  scrolling="no" width='900' height='900'></iframe>
		</div>		


		</div>



</div>


<br/>
<br/>
<br/>


<script type='text/javascript'>

$("#iframe_home").css({"border":"3px solid blue","overflow-x":"hidden","scrolling":"no"});



</script>