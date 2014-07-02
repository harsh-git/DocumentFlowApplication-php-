<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URL; ?>public/css/list.css" />
<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.tools.min.js"></script>



<link rel="stylesheet" href="<?php echo URL; ?>public/css/tabs.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/tabs-panes.css" />


<?php 
$forms = array('form1','form20','form3');

?>


	<center>
		<h2 style="">
			<?php echo $this->msg;     ?>
		</h2>
	</center>


	<div class="clear"></div>

	



		<div id="wizard_tabs">
			<!-- tabs -->
			<ul class="tabs">

				<?php foreach ($forms as $key => $form) {
					?>
					<li><a href="#" class="l"><?php echo $form;?>	
					</a></li>
					<?php 
				}?>
			</ul>

			<!-- panes -->


			<div class="panes">
				
				<div>
					
					<form action="" method="post">
						Form ID: :<input class='mandatory' type = 'text' name='elem1' id='elem1'/>

						<label>
							<input id="terms" type="checkbox" style="display:none;"/>

						</label>
					</form>

					<p>
						<button class="next">Next &raquo;</button>
					</p>
				</div>

				<div>
					<h2>Form2 contents here</h2>

					<form action="" method="post">
						Text Content :<input class='mandatory' type = 'text' name='elem2' id='elem2'/>
					</form>
					<p>
						<button class="prev">&laquo; Prev</button>
						<button class="next">Next &raquo;</button>
					</p>
				</div>

				<div>
					<h2>More content here...</h2>
					<p>
						<button class="prev">&laquo; Prev</button>
					</p>


			<iframe src="form1a" name='iframecontent_create' id='iframe_create' iframeborder=1  width='900' height='900'></iframe>


				</div>

			</form>	
			</div>

			

			<input type="button" value="Save" id='form1save'/>
		</div>








</div>



<script type='text/javascript'>
$(document).ready(
	function() {

		var wizard = $("#wizard_tabs");
      	var terms = $("#terms");
	  
    	terms.get(0).checked = false;

	    $("#form1save").click(function(){

	    	var flag = 0 , str = '';
	    	$('.mandatory').each(function(index){



	    		if($(this).val() == ""){

	    			flag=1;
	    			var num = index +1;
	    			str += num.toString() + ".        "+$(".tabs li :eq(" + $(this).index() + ")").text().trim() ;
	    			str += "  ->   "  + $(this).attr('name') + "\n"; 

	    		}


	    	});

	    	if(flag==0){
	    		var form1 = { 'elem1':$("#elem1").val(), 'elem2':$("#elem2").val()};

	    		if(!terms.get(0).checked){
	    			alert('First save - create');
	    		}
	    		else{

	    			alert('save - update');
	    		}




//creating post bundle       :(   



	    		$.post('../../pl/create',$('form').serialize(),function(data){
	    			var url = data.split('*')[1];
	    			console.log(url);

	    			window.top.location.reload();


	    		});
	    		terms.get(0).checked = true;

	    		return true;

	    	}
	    	else{

	    		alert("Following fields are mandatory :\n\n"+str);
	    		return false;
	    	}


	    });

        // enable tabs that are contained within the wizard
        $("ul.tabs", wizard).tabs("div.panes > div", function(event, index) {

		        	/* now we are inside the onBeforeClick event */

		      // ensure that the "terms" checkbox is checked.
		      
		     /* if (index > 0 && !terms.get(0).checked)  {
		      terms.parent().addClass("error");

		      // when false is returned, the user cannot advance to the next tab
		      return false;
		      }

		      */
		      // everything is ok. remove possible red highlight from the terms
		      terms.parent().removeClass("error");
  		});

        // get handle to the tabs API
        var api = $("ul.tabs", wizard).data("tabs");

      // "next tab" button
		$("button.next", wizard).click(function() {
			api.next();
		});

		// "previous tab" button
		$("button.prev", wizard).click(function() {
			api.prev();
		});
  });
</script>


<br/>
<br/>
<br/>
