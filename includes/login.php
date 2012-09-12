<div class="title">GOCFS User Login</div>
<div align="center">
	<form action="process/login.php?a=login" method="post" enctype="multipart/form-data">
	<table border="0">
<?php
	include("includes/message.php");
?>
		<tr>
			<td>username:</td>
			<td><input type="text" class="field" name="username" size="20" /></td>
		</tr>
		<tr>
			<td>password:</td>
			<td><input type="password" class="field" name="password" size="20" /></td>
		</tr>
		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="Log-in" name="submit" />
			</td>
		</tr>
	</table>
	</form>
</div>