<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo URL; ?>public/js/gridviewScroll.min.js"></script> 




<link rel="stylesheet" href="<?php echo URL; ?>public/css/960.css" />

<link rel="stylesheet" href="<?php echo URL; ?>public/css/table.css" />
<div class="container_12">
 	<center>
 		<h2>
 			<!-- <?php echo $this->msg;     ?> -->
 		</h2>
 	</center>


 	<div class="clear"></div>


 	<div id="plpendinglistofdocs" class="grid_12" style="display:block;border:2px solid grey;height:25%;width:90%;overflow-y:scroll;">


 		<table class="gridtable" id="plpendingtable" cellspacing="0" style="width: 100%; border-collapse: collapse;" >
		   	<tr class="GridviewScrollHeader"><th>Pending Patents</th>
			<td>&nbsp;</td><td>&nbsp;</td><th>formid</th>
			<th>textcontent</th>
			<th>status</th>
			</tr>

	 		<?php foreach ($this->pending as $key => $patent) {
		 			$patent = (array)$patent;
		 			?>

    				<tr class="GridviewScrollItem"> 
		 				<td>&nbsp;</td><td>&nbsp;</td><td><input type='radio' name='radioplpending' /></td>
		 				<td class='qkey'><a href='#'><?php echo $patent['formid'];?></a></td>
		 				<td><?php echo $patent['textcontent'] ;?></td>
		 				<td><?php echo $patent['status'] ;?></td>	
		 			</tr>
		 			<?php 
		 		}?>
				</tbody>
 			</table>
	</div>		
 	<div class="clear"></div>
 	<div class="grid_12"><hr></div>
 	<div class="clear"></div>

 	<div id="comments" class="grid_12" style="background-color:#CCC;display:none;border:2px solid grey;height:10%;width:90%;overflow-y:scroll;">

 		<table class="gridtable">
 			<tr><td>userid</td><td>6271828</td></tr>
 			<tr><td>Timestamp:</td><td>123123 2 3 14</td></tr>
 			<tr><td>Comment:</td><td> Submitted for your approval please</td></tr>
 			
 		</table>

 		<table class="gridtable">
 			<tr><td>userid</td><td>6271828</td></tr>
 			<tr><td>Timestamp:</td><td>123123 2 3 14</td></tr>
 			<tr><td>Comment:</td><td> Submitted for your approval please</td></tr>
 			
 		</table>


 		
	</div>	

	<div class="clear"></div>
 	
 	<div id="newcomment" class="grid_12" style="background-color:#CCC;display:none;border:2px solid grey;height:5%;width:90%;overflow-y:scroll;">
 		<center><textarea rows="2" cols="100" style="resize:none;">



 		</textarea>
 		</center>
	</div>	

 	<div class="clear"></div>
 	

	 
     <br/><br/>
	 <div class="grid_12" id="station" style="display:none;">

	 	<div class="grid_5 alpha" style="background-color:red;border:0px solid red;">

	 	<?php if(sizeof($this->prevstations)>0){ ?>
	 	<table class="gridtable">
	 		<tr><th>Review</th></tr>
	 		<tr>
	 		<?php foreach ($this->prevstations as $key => $prevstation) {
	 			?>
	 			<td class='movement'><a href='#' ><?php echo strtoupper($prevstation); ?></a></td>

	 			<?php

	 		} ?></tr>

	 	</table>
	 	<?php } ?>

	 	</div>


	 	<div class="grid_5 omega" style="background-color:green;border:0px solid green;" >
	 	<table class="gridtable" >
	 		<tr><th>Forward >>>></th></tr>
	 		<tr>
	 		<?php foreach ($this->nextstations as $key => $nextstation) {
	 			?>
	 			<td class='movement' ><a href='#' ><?php echo strtoupper($nextstation); ?></a></td>

	 			<?php

	 		} ?></tr>
	 	</table>
	 	</div>

	 	
	 </div>



















</div>		



</div>


<br/>
<br/>
<br/>

<p id="hidden_documentselected" style="display:none"></p>


<script type="text/javascript">

  $(document).ready(function () { 
        gridviewScroll(); 
    }); 
    function gridviewScroll() { 
        $('#plpendingtable').gridviewScroll({ 
            width: 660, 
            height: 200 
        }); 
    } 

$("#plpendingtable").find("input[type=radio]").click(function(){



	var row  = $(this).parent().parent().parent().find(".qkey");
	
	$("#hidden_documentselected").text($(row).text());
	$("#comments").show();
	$("#newcomment").show();
	$("#station").show();


});


$('.movement').click(function(){
	var station = $(this).find('a').text();
	var documentselected = $("#hidden_documentselected").text();

	console.log(documentselected);
	if(documentselected==""){
		alert("Please select a document");

	}
	else{
		var accepted = confirm("Are you sure you want to sent the document "+ documentselected + " to "+ station.toUpperCase());
		if(accepted){
			alert("document sent");
			location.reload();


		}
	}
	
	
});

</script>