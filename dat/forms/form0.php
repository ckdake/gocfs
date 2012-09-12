<?php
	//this is where you layout your input document. 
	//you must have the submit button.
?>
	
	<table border="0">
		<tr>
			<td>SSN:</td><td><input type="text" name="ssn" size="30" /></td>
		</tr>
		<tr>
			<td>First Name:</td><td><input type="text" name="firstname" size="30" /></td>
		</tr>
		<tr>
			<td>Last Name:</td><td><input type="text" name="lastname" size="30" /></td>
		</tr>
		<tr>
			<td>Home Phone:</td><td><input type="text" name="homephone" size="20" /></td>
		</tr>
		<tr>
			<td>Street:</td><td><input type="text" name="street" size="40" /></td>
		</tr>
		<tr>
			<td>City: </td><td><input type="text" name="city" size="40" /></td>
		</tr>
		<tr>
			<td>State: </td>
			<td>
<select name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA" selected>Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
			</td>
		</tr>
		<tr>
			<td>Zip: </td><td><input type="text" name="zip" size="10" /></td>
		</tr>
		<tr>
			<td>Office Sought: </td>
			<td>
				<select name="office">
<?php			
		$link = mysql_connect("localhost", "gocfs", "gocfs") or die(mysql_error());
		mysql_select_db("gocfs") or die("Could not select database");
		$query = "SELECT name FROM office ORDER BY name";
		$result = mysql_query($query) or die(mysql_error());
		do {
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line != null) {
				echo "<option value=\"".$line['name']."\">".$line['name']."</option>";
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
			<td><select name="electionyear"/>
					<option value="2004">2004</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Party: </td>
			<td>
				<select name="party">
<?php
                $link = mysql_connect("localhost", "gocfs", "gocfs") or die(mysql_error());
                mysql_select_db("gocfs") or die("Could not select database");
                $query = "SELECT * FROM party_committee ORDER BY partyName";
                $result = mysql_query($query) or die(mysql_error());
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                echo "<option value=\"".$line['committeeID']."\">".$line['partyName']."</option>";
                        }
                } while ($line != null);
                                                                                                                      
                mysql_free_result($result);
                mysql_close($link);
?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Date filed: </td><td><input type="text" name="datefiled" value="YYYY-MM-DD" /></td>
		</tr>
		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="File Candidate" name="submit" />
			</td>
		</tr>
	</table>
