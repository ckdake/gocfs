	</tr>
	<tr>
		<td colspan="2">
			<br />
			<div class="footer">
				A CS4400 Project for Spring Semester 2004<br />
				Chris Kelly, Rebecca Stark, Katherine Daniel<br />
<?php if (auth()) { ?>
				<a href="setup/setup.sql">SQL setup commands</a> - 
				<a href="setup/indexes.txt">About Indexing</a><br />
				Database Dump ( <a href="setup/xmldmp.php">XML</a> / 
				<a href="setup/htmldmp.php">HTML</a> )<br />
<?php
	include("includes/debug.php");
	}
?>

			</div>
		</td>
	</tr>
</table>
</div>
</body>
</html>
