<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback_Practical</title>
</head>

<body>
<script language="JavaScript">

<!--

function ValidateForm(Form)

{

function countSelections(buttonGroup)

{

for (i = 0; i < buttonGroup.length; i++)

{

if (buttonGroup[i].checked) return (true);

}

return (false);

}

//** Other form validation statements **

if (!countSelections(Form.rd1))

{

alert("Input Error: A Field is empty");

return (false);

}

if (!countSelections(Form.rd2))

{

alert("Input Error: A Field is empty");

return (false);

}

if (!countSelections(Form.rd3))

{

alert("Input Error: A Field is empty");

return (false);

}

if (!countSelections(Form.rd4))

{

alert("Input Error: A Field is empty");

return (false);

}
if (!countSelections(Form.rd5))

{

alert("Input Error: A Field is empty");

return (false);

}

return(true);

}

// -->

</script>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post"  onSubmit="return ValidateForm (form1)"  action="Feedbackpg2.php" >

<p>Name of Teacher:
  <label for="teacher_name"></label>
  <input type="text" name="teacher_name" id="teacher_name" />
</p>
<table width="557" border="0">
  <tr>
    <td width="90">Performance Indicator</td>
    <td width="54">Excellent</td>
    <td width="35">Good</td>
    <td width="51">Average</td>
    <td width="27">Poor</td>
  </tr>
  <tr>
    <td>Planned Laboratory instructions including management of practicals</td>
    <td><input type="radio" name="rd1"  value="4" />
      <label for="rd1"></label></td>
    <td><input type="radio" name="rd1"  value="3" />
      <label for="rd1"></label></td>
    <td><input type="radio" name="rd1"  value="2" />
      <label for="rd1"></label></td>
    <td><input type="radio" name="rd1"  value="1" />
      <label for="rd1"></label></td>
  </tr>
  <tr>
    <td>Uniform Coverage of Term work and guidance for writing journals</td>
    <td><input type="radio" name="rd2"  value="4" />
      <label for="rd2"></label></td>
    <td><input type="radio" name="rd2"  value="3" />
      <label for="rd2"></label></td>
    <td><input type="radio" name="rd2"  value="2" />
      <label for="rd2"></label></td>
    <td><input type="radio" name="rd2"  value="1" />
      <label for="rd2"></label></td>
  </tr>
  <tr>
    <td>Checking of journals and macking continious assessment of term work</td>
    <td><input type="radio" name="rd3"  value="4" />
      <label for="rd3"></label></td>
    <td><input type="radio" name="rd3"  value="3" />
      <label for="rd3"></label></td>
    <td><input type="radio" name="rd3"  value="2" />
      <label for="rd3"></label></td>
    <td><input type="radio" name="rd3"  value="1" />
      <label for="rd3"></label></td>
      
  </tr>
  <tr>
    <td>Preparation and displace of Instructional material, charts, models, etc.</td>
    <td><input type="radio" name="rd4"  value="4" />
      <label for="rd4"></label></td>
    <td><input type="radio" name="rd4"  value="3" />
      <label for="rd4"></label></td>
    <td><input type="radio" name="rd4"  value="2" />
      <label for="rd4"></label></td>
    <td><input type="radio" name="rd4"  value="1" />
      <label for="rd4"></label></td>
  </tr>
  <tr>
    <td>Planning and procurement of consumable required for practicals</td>
    <td><input type="radio" name="rd5"  value="4" />
      <label for="rd5"></label></td>
    <td><input type="radio" name="rd5"  value="3" />
      <label for="rd5"></label></td>
    <td><input type="radio" name="rd5"  value="2" />
      <label for="rd5"></label></td>
    <td><input type="radio" name="rd5"  value="1" />
      <label for="rd5"></label></td>
  </tr>
</table>
<p>Suggestions:<textarea name="suggestions" cols="" rows=""></textarea></p>
<input name="submit" type="submit" />

</form>
</body>
</html>
<?php
$rd1=$_POST['rd1'];
$rd2=$_POST['rd2'];
$rd3=$_POST['rd3'];
$rd4=$_POST['rd4'];
$rd5=$_POST['rd5'];
$submit=$_POST['submit'];

if(isset($submit))
{

mysql_connect("localhost","root","") or die("could not connect to database");
mysql_select_db("feedback");
echo "successfully connected!";

$insert_query="insert into feedpract  (planned_lab, uniform_coverage, checking_journals, preparations, planning)
				values ( $rd1, $rd2, $rd3, $rd4, $rd5)";			
mysql_query($insert_query);				
}
?>