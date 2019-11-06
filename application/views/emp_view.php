<!DOCTYPE html>
<html>
<head>
	<title> Student Detail</title>
</head>
<body>
	<h2 align="center">Get EMP Detail</h2>
<form method="post">
	<table align="center" border="1">
		<tr class="heading">
			<th>FirstName</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Hobbies</th>
			<th>Country</th>
			<th>State</th>
			<th>City</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		<tbody>
			<?php if (count($employee) ); ?>
			<?php foreach( $employee as $getdata) { ?>
				<tr>
					<td><?php echo $getdata->f_name; ?></td>
					<td><?php echo $getdata->l_name; ?></td>
					<td><?php echo $getdata->email; ?></td>
					<td><?php echo $getdata->gender; ?></td>
					<td><?php echo $getdata->hobby; ?></td>
					<td><?php echo $getdata->country_id; ?></td>
					<td><?php echo $getdata->state_id; ?></td>
					<td><?php echo $getdata->city; ?></td>
					<td><img src="<?php echo base_url('uploads/images') . '/' . $getdata->image;?>" width="50" height="50" /></td>
					<td>
					<button class="delete1">
						<a class="delete" href="<?php echo base_url('employe/Delete').'/'.$getdata->id; ?>" style="color:unset; text-decoration: none;" onclick="return confirm('Are You Sure?')">Delete</a>
					</button>
					<button class="update1">
						<a class="update" href="<?php echo base_url('employe/UpdateData').'/'.$getdata->id; ?>" style="color:unset; text-decoration: none;">Update</a>
					</button>
				</td>
				</tr>	
			<?php } ?>
		<tr><td colspan="10" align="center">
			<button class="sub">
			  <a class="add" href="<?php echo base_url('employe/AddnewEMP'); ?>" style="color: unset; text-decoration: none; "/>Add New Employee
			</button></td>
		</tr>
		</tbody>
	</table>
</form>
</body>
</html>

<style>
	a.add:hover, a.add:active {font-size: 110%;}
	/*a.delete:hover, a.delete:active {font-size: 105%;}
	a.update:hover, a.update:active {font-size: 110%;}*/
</style>
<style>
.delete1 {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 9px 20px;
  text-align: center;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;
}
.update1 {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 9px 20px;
  text-align: center;
  display: inline-block;
  font-size: 13px;
  margin: 4px 2px;
  cursor: pointer;
}
.sub {
  background-color: #f44336;;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
  .heading {
  background-color: #000000;
  color: white;
  }
</style>