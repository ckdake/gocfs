	<table border="0">
                <tr>
                        <td>Committee:</td>
                        <td>
                                <select name="committeeid">
<?php
                $link = mysql_connect("localhost", "gocfs", "gocfs") or die(mysql_error());
                mysql_select_db("gocfs") or die("Could not select database");
                $query = "SELECT committeeID,name FROM committee ORDER BY committeeID";
                $result = mysql_query($query) or die(mysql_error());
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                echo "<option value=\"".$line['committeeID']."\">".$line['committeeID'].": ".$line['name']."</option>";
                        }
                } while ($line != null);
                mysql_close($link);
?>
                                </select>
                        </td>
                </tr>
                <tr>
			<td>Date Paid: </td><td><input type="text" name="paid" value="YYYY-MM-DD" /></td>
		</tr>

		<tr>
			<td>Payee Name:</td><td><input type="text" name="payee" size="30" /></td>
		</tr>
		
		<tr>
			<td>Street:</td><td><input type="text" name="street" size="40" /></td>
		</tr>

		<tr>
			<td>City: </td><td><input type="text" name="city" size="15" /></td>
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
			<td>Description of Payment: </td><td><input type="text" name="description" size="45" /></td>
		</tr>

		<tr>
			<td>Amount Received: </td><td>$<input type="text" name="amount" size="10" /></td>
		</tr>

		<tr>
			<td>Code: </td>
			<td>
				<select name="code">
					<option value="C">C - contributions</option>
					<option value="F">F - fundraising expenditures</option>
					<option value="A">A - advertising expenditures</option>
					<option value="O">O - operation expenditures</option>
				</select>
			</td>
		</tr>

		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="File Payment" name="submit" />
			</td>
		</tr>
	</table>
