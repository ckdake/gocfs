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
                                                                            
                mysql_free_result($result);
                mysql_close($link);
?>
                                </select>
			</td>
		</tr>

                <tr>
                        <td>Change Treasurer Information:</td>
			<td>
				<select name="changetreas">
                                        <option value="yes">Change</option>
                                        <option value="no" selected>Don't Change</option>
                                </select>

			</td>
                </tr>

		<tr>       
                        <td>First Name: </td><td><input type="text" name="treasfirst" size="15" /></td>
                </tr>

                <tr>       
                        <td>Last Name: </td><td><input type="text" name="treaslast" size="15" /></td>
                </tr>

		<tr>
                        <td>Street:</td><td><input type="text" name="treasstreet" size="40" /></td>
                </tr>

                <tr>
                        <td>City:</td><td><input type="text" name="treascity" size="15" /></td>
                </tr>
                <tr>
                        <td>State:</td><td>
<select name="treasstate">
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
                        <td>Zip:</td><td><input type="text" name="treaszip" size="10" /></td>
                </tr>
                <tr>
                        <td>Telephone:</td><td><input type="text" name="treasphone" size="11" /></td>
                </tr>
                
		<tr>
			<td>Change Chairperson Information:</td>
			<td><select name="changechair">
					<option value="yes">Change</option>
					<option value="no" selected>Don't Change</option>
				</select>	
			</td>
		</tr>

		<tr>       
                        <td>First Name: </td><td><input type="text" name="chairfirst" size="15" /></td>
                </tr>

                <tr>       
                        <td>Last Name: </td><td><input type="text" name="chairlast" size="15" /></td>
                </tr>

		<tr>
                        <td>Street:</td><td><input type="text" name="chairstreet" size="40" /></td>
                </tr>

                <tr>
                        <td>City:</td><td><input type="text" name="chaircity" size="15" /></td>
                </tr>
                <tr>
                        <td>State:</td><td>
<select name="chairstate">
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
                        <td>Zip:</td><td><input type="text" name="chairzip" size="10" /></td>
                </tr>
                <tr>
                        <td>Telephone:</td><td><input type="text" name="chairphone" size="11" /></td>
                </tr>
		
		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="Update Information" name="submit" />
			</td>
		</tr>
	</table>
