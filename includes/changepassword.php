<div class="title">Change Password</div>
<div align="center">
	<form action="process/admin.php?a=passwd" method="post" enctype="multipart/form-data">
	<table border="0">

<?php
	include("includes/message.php");
?>


		<tr>
			<td>username:</td>
			<td><?php echo get_session('modifying') ?></td>
		</tr>
		<tr>
			<td>password:</td>
			<td><input type="password" class="field" name="p1" size="20" /></td>
		</tr>
		<tr>
			<td>confirm:</td>
			<td><input type="password" class="field" name="p2" size="20" /></td>
		</tr>
		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="change password" name="submit" />
			</td>
		</tr>
	</table>
	</form>
</div>