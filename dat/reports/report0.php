	<table border="0">
		<tr>
			<td>From Date: </td><td><input type="text" name="from" value="YYYY-MM-DD" /></td>
		</tr>
		<tr>
			<td>Through Date: </td><td><input type="text" name="to" value="YYYY-MM-DD" /></td>
		</tr>
                <tr>
                        <td>Candidate Name: </td>
                        <td>
                                <select name="candidate">
<?php
                $link = mysql_connect("localhost", "gocfs", "gocfs") or die(mysql_error());
                mysql_select_db("gocfs") or die("Could not select database");
                $query = "SELECT ssn,firstname,lastname FROM candidate ORDER BY lastname,firstname";
                $result = mysql_query($query) or die(mysql_error());
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                echo "<option value=\"".$line['ssn']."\">".$line['firstname']." ".$line['lastname']."</option>";
                        }
                } while ($line != null);
          
                mysql_free_result($result);
                mysql_close($link);
?>
                                </select>
                        </td>
                </tr>
                <tr>
                        <td>Election Year: </td>
                        <td><select name="year">
                                <option value="2004">2004</option>
                                </select>
                        </td>
                </tr>		
		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="Generate Report" name="submit" />
			</td>
		</tr>
	</table>
