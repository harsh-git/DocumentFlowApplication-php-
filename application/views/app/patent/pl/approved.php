 <script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
 <link rel="stylesheet" href="<?php echo URL; ?>public/css/960.css" />

 <link rel="stylesheet" href="<?php echo URL; ?>public/css/table.css" />
 <div class="container_12">
 	<center>
 		<h2>
 			<!-- <?php echo $this->msg;     ?> -->
 		</h2>
 	</center>


 	<div class="clear"></div>

 	<div class="grid_10">

 		<div id="content" class="grid_5 alpha">



 			<table class="gridtable" id="plpendingtable">
 				<tr><th>Approved Patents</th></tr>
 				<tr><th>&nbsp;</th><th>formid</th>
 				<th>textcontent</th>
 				<th>status</th>

 			</tr>

 			<?php foreach ($this->approved as $key => $patent) {
 				$patent = (array)$patent;
 				?>

 				<tr> 
 					<td><input type='radio' /></td>
 					<td class='qkey'><?php echo $patent['formid'];?></td>
 					<td><?php echo $patent['textcontent'] ;?></td>
 					<td><?php echo $patent['status'] ;?></td>	
 				</tr>
 				<?php 
 			}?>

 			</table>
 		</div>		

	 	<div id="content" class="grid_5 omega">

	 		<table class="gridtable">
	 		


	 		</table>
	 	</div>




 	</div>	    	














</div>		



</div>


<br/>
<br/>
<br/>


<script type="text/javascript">

$("#plpendingtable").find("input[type=radio]").click(function(){
	var row  = $(this).parent().parent();
	console.log($(row).find(".qkey").text());

});


</script>