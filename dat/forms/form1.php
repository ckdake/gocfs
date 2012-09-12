<?php
	//this is where you layout your input document. 
	//you must have the submit button.
?>
	<table border="0">
		<tr>
			<td>Name of Committee:</td><td><input type="text" name="committeename" size="30" /></td>
		</tr>
		<tr>
                        <td>Street:</td><td><input type="text" name="committeestreet" size="40" /></td>
                </tr>
                <tr>
                        <td>City:</td><td><input type="text" name="committeecity" size="15" /></td>
                </tr>
                <tr>
                        <td>State:</td>
			<td>
<select name="committeestate">
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
                        <td>Zip:</td><td><input type="text" name="committeezip" size="10" /></td>
                </tr>
                <tr>
                        <td>Telephone:</td><td><input type="text" name="committeephone" size="11" /></td>
                </tr>
                <tr>       
                        <td>Date: <br /><br /></td><td><input type="text" name="committeedate" value="YYYY-MM-DD" /><br /><br /></td>
	        </tr>
		<tr>	
			<td>Type:</td>
			<td>
				<select name="committeetype">
					<option value="party">Party Committee</a>
					<option value="finance">Primary Finance Committee</option>
					<option value="action">Political Action Committee</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><br /><br /><b>For Party Committee:</b></td>
		</tr>
		<tr>
			<td>Party Name: </td><td><input type="text" name="partyname" size="15" /></td>
		</tr>
                <tr>
                        <td colspan="2"><br /><br /><b>For Primary Finance Committee:</b></td>
                </tr>
		<tr>
                        <td>Candidate Name: </td>
			<td>
				<select name="financessn">				
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
			<td><select name="financeyear">
				<option value="2004">2004</option>
				</select>
			</td>
                </tr>
                <tr>
                        <td colspan="2"><br /><br /><b>For Political Action Committee:</b></td>
                </tr>
                <tr>
                        <td>Ballot Proposition Number: </td>
			<td>
                                <select name="ballotnumber">
					<option value=""></option>
<?php
                $link = mysql_connect("localhost", "gocfs", "gocfs") or die(mysql_error());
                mysql_select_db("gocfs") or die("Could not select database");
                $query = "SELECT number,description FROM proposition ORDER BY number";
                $result = mysql_query($query) or die(mysql_error());
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                echo "<option value=\"".$line['number']."\">".$line['number'].": ".$line['description']."</option>";
                        }
                } while ($line != null);
                                                                                                                         
                mysql_free_result($result);
                mysql_close($link);
?>
                                </select>
			</td>
                </tr>
		<tr>
			<td>Position: </td>
			<td><select name="position">
				<option value="0"></option>
				<option value="0">Opposing</option>
				<option value="1">Supporting</option>
				</select>
			</td>
		</tr>
                <tr>
                        <td>Election Year: </td>
			<td><select name="ballotyear">
				<option value="2004">2004</option>
			</select></td>
                </tr>
                <tr>
                        <td colspan="2"> <b>AND/OR:</b></td>
                </tr>
                <tr>
                        <td>Candidate Name: </td>
			<td>
                                <select name="politicalcandidatename">
					<option value=""></option>
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
			<td><select name="politicalyear">
				<option value="2004">2004</option>
			</select></td>
                </tr>
<br /><br />
                <tr>
                        <td colspan="2"><br /><br /><b>Treasurer Information:</b></td>
                </tr>
                <tr>
                        <td>First Name: </td><td><input type="text" name="treasfirstname" size="15" /></td>
                </tr>
                <tr>
                        <td>Last Name: </td><td><input type="text" name="treaslastname" size="15" /></td>
                </tr>
                <tr>
                        <td>Street Name: </td><td><input type="text" name="treasstreetname" size="15" /></td>
                </tr>
                <tr>
                        <td>City: </td><td><input type="text" name="treascity" size="15" /></td>
                </tr>
                <tr>
                        <td>State: </td>
			<td>
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
                        <td>Zip: </td><td><input type="text" name="treaszip" size="5" /></td>
                </tr>
                <tr>
                        <td>Telephone: </td><td><input type="text" name="treasphone" size="15" /></td>
                </tr>
                <tr>
                        <td colspan="2"><br /><br /><b>Chairperson Information:</b></td>
                </tr>                                                                                                 
                <tr>
                        <td>First Name: </td><td><input type="text" name="chairfirstname" size="15" /></td>
                </tr>
                <tr>
                        <td>Last Name: </td><td><input type="text" name="chairlastname" size="15" /></td>
                </tr>
                <tr>
                        <td>Street: </td><td><input type="text" name="chairstreet" size="15" /></td>
                </tr>
                <tr>
                        <td>City: </td><td><input type="text" name="chaircity" size="15" /></td>
                </tr>
                <tr>
                        <td>State: </td>
			<td>
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
                        <td>Zip: </td><td><input type="text" name="chairzip" size="5" /></td>
                </tr>
                <tr>
                        <td>Telephone: </td><td><input type="text" name="chairphone" size="15" /></td>
                </tr>
                <tr>
                        <td colspan="2"><br /><br /><b>Bank Information:</b></td>
                </tr>
                <tr>
                        <td>Name: </td><td><input type="text" name="bankname" size="15" /></td>
                </tr>
                <tr>
                        <td>Street: </td><td><input type="text" name="bankstreet" size="15" /></td>
                </tr>
                <tr>
                        <td>City: </td><td><input type="text" name="bankcity" size="15" /></td>
                </tr> 
                <tr>
                        <td>State: </td>
			<td>
<select name="bankstate">
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
                        <td>Zip: </td><td><input type="text" name="bankzip" size="5" /></td>
                </tr>
                <tr>
                        <td>Telephone: </td><td><input type="text" name="bankphone" size="15" /></td>
                </tr>
                <tr>
                        <td>Account Number: </td><td><input type="text" name="accountnumber" size="15" /></td>
                </tr>
		<tr><td colspan="2"><br /><br /></td></tr>
                <tr>
                        <td colspan="2">Assigned Committe ID#: (automatically generated by system)</td>
                </tr>
		<tr>
			<td colspan="2" class="center">
				<input type="submit" class="button" value="Submit Form" name="submit" />
			</td>
		</tr>
	</table>
