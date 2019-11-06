<!DOCTYPE html>
<html>
<head>
	<title>Student Detail</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
	<h2 align="center">Update EMP Details</h2>
		
<form method="post" id="form" enctype="multipart/form-data">
	<table align="center" border="1">
		<?php
		// base_url("employe/UpdateData/{$employee->id}");
		?>
		<tr>
			<th>First Name</th>
			<td><input type="text" name="f_name" value="<?php echo $employee->f_name ?>"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" name="l_name" value="<?php echo $employee->l_name ?>"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email" value="<?php echo $employee->email ?>"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" name="gender" value="male" <?php if ($employee->gender =='male'){echo "checked";}?> >Male
				<input type="radio" name="gender" value="female" <?php if ($employee->gender =='female'){echo "checked";}?> >Female</td>
		</tr>
		<tr>
			<th>Hobbies</th>
			<?php
				$chk = $employee->hobby;
				$hob = explode(",",$chk);
			?>
			<td>
				<input type="checkbox" name="hobby[]" value="cricket" <?php if (in_array("cricket", $hob)) {echo "checked";} ?> />Cricket
      			<input type="checkbox" name="hobby[]"  value="hockey" <?php if (in_array("hockey",$hob)) {echo "checked";} ?>/>Hockey
      			<input type="checkbox" name="hobby[]"value="football" <?php if (in_array("football",$hob)) {echo "checked";} ?> />Football
			</td>
		</tr>
		<tr>
			<th>Country</th>
			<td>
				<select name="country" id="country"><option value="">Select Country</option>
				<?php
				foreach ($country as $row) { ?>
					<option <?php if($employee->country_id == $row->country_id){ echo "selected"; } ?> value="<?php echo $row->country_id; ?>"><?php echo $row->country_name; ?></option>
				<?php } ?>
				</select></td> 
		</tr>
			<tr>
			<th>State</th>
			<td><select name="state" id="state"><option value="">Select State</option>
				<?php
				foreach ($state as $state) { ?>
					<option <?php if($employee->state_id == $state->state_id){ echo "selected"; } ?> value="<?php echo $state->state_id; ?>"><?php echo $state->state_name; ?></option>
				<?php } ?>
				?>
			</select></td> 
		</tr> 
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value="<?php echo $employee->city?>"></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="image" value="upload">
			    <img src="<?php echo base_url('uploads/images') . '/' . $employee->image;?>" width="40" height="40" style="margin: 0px 0px -7px -29px;"/>
			    <input type="hidden" name="image1" value="<?php echo $employee->image?>">
			</td>

		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="update" value="Update">
				<button><a href="<?php echo base_url('employe/index'); ?>" style="color: unset;text-decoration: none;">LIST</a></button>
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
			    		url:"<?php echo base_url();?>employe/fetchState",
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
