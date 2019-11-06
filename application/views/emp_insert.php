<html>
<head>
	<title>Emp Detail</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>
	<h2 align="center">Employee Detail</h2>

<form method="post" id="form" enctype="multipart/form-data">
	<table align="center" border="1">
		<tr>
			<th>First Name</th>
			<td><input type="text" name="f_name"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" name="l_name"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" name="gender" value="male" >Male
				<input type="radio" name="gender" value="female" >Female</td>
		</tr>
		<tr>
			<th>Hobbies</th>
			<td>
				<input type="checkbox" name="hobby[]" value="cricket"/>Cricket
      			<input type="checkbox" name="hobby[]"  value="hockey"/>Hockey
      			<input type="checkbox" name="hobby[]"value="football"/>Football
			</td>
		</tr>
		<tr>
			<th>Country</th>
			<td>
				<select name="country" id="country"><option value="">Select Country</option>
				<?php
				foreach ($country as $row) 
				{
				  echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
				}
				?>
			</select></td> 
		</tr>
			<tr>
			<th>State</th>
			<td><select name="state" id="state"><option value="">Select State</option>
			</select></td> 
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city"></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="image" value="upload"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="submit" id="submit">
				<input type="reset" name="Reset" value="reset">
				<button><a href="<?php echo base_url('employe/index'); ?>">LIST</a></button>
			</td>
		</tr>
	</table>
</form>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
	 	$('#country').change(function(){
		  	var country_id = $('#country').val();
		  	if(country_id != ''){
		   		$.ajax({
		    		url:"<?php echo base_url(); ?>employe/fetchState",
		    		method:"POST",
		    		data:{country_id:country_id},
		    		success:function(data){
		     			$('#state').html(data);
		    		}
		   		});
		  	}
		});
	 });
</script>

<script type="text/javascript">
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z\s]+$/i.test(value);
	}, "Only Character");

	function countryselect(country){
	if(country.value == "Default"){
	country.focus();
	return false;}
	else{return true;}
	}

	function stateselect(state){
	if(state.value == "Default"){
	state.focus();
	return false;}
	else{return true;}
	}

	$(document).ready(function() {
	  $("#form").validate({
	    rules: {
	      f_name : {required: true,lettersonly: true},
	      l_name : {required: true,lettersonly: true},
	      email: {required: true,email: true},
	      country: {required: true},
	      state: {required: true},
	    },
	    messages : {
	      f_name: {required: "<html><body>Only Character<span style='color: red;'>*</span></body></html>"},
	      l_name: {required: "<html><body>Only Character<span style='color: red;'>*</span></body></html>"},
	      email: {required: "<html><body>The email should be '@' <span style='color: red;'>*</span></body></html>"},
	      country: {required: "<html><body>Select Country<span style='color: red;'>*</span></body></html>"},
	      state: {required: "<html><body>Select state<span style='color: red;'>*</span></body></html>"}
	    }
	  });
	});
</script>