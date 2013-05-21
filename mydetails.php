<?php if(isset($_SESSION['customer'])){?>
<h3>My Details</h3>
<table>
	<tr>
		<td align="right"><b>First Name</b></td>
		<td onMouseOver="showEdit(this)" onMouseOut="hideEdit(this)"><span id="21"><?php echo $_SESSION['customer']['fname'];?></span> 
			<a href="#" name="off" class="button small grey edit" onclick="editDetails(this)">edit</a></td>
	</tr>
	<tr>
		<td align="right"><b>Last Name</b></td>
		<td onMouseOver="showEdit(this)" onMouseOut="hideEdit(this)"><span id="22"><?php echo $_SESSION['customer']['lname'];?></span> 
			<a href="#" name="off" class="button small grey edit" onclick="editDetails(this)">edit</a></td>
	</tr>
	<tr>
		<td align="right"><b>Address</b></td>
		<td onMouseOver="showEdit(this)" onMouseOut="hideEdit(this)"><span id="23"><?php echo $_SESSION['customer']['address'];?></span> 
			<a href="#" name="off" class="button small grey edit" onclick="editDetails(this)">edit</a></td>
	</tr>
	<tr>
		<td align="right"><b>Phone</b></td>
		<td onMouseOver="showEdit(this)" onMouseOut="hideEdit(this)"><span id="24"><?php echo $_SESSION['customer']['phone'];?></span> 
			<a href="#" name="off" class="button small grey edit" onclick="editDetails(this)">edit</a></td>
	</table>
	<table></tr>
		<tr><td><a class="button green large" href="#" onclick="saveChanges(); return false">Save</a></td>
		<td><a class="button red large" href="#" onclick="discardChanges(); return false">Discard</a></td>
	</tr></table>


<?php }else echo "Session expired.";?>