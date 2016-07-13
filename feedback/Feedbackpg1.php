<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback_Theory</title>
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
<form id="form1" name="form1" method="post"  onSubmit="return ValidateForm (form1)"  action="Feedbackpg1.php" >

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
    <td>Planning of Lessons</td>
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
    <td>Effective communication of subject matter and clarity of speech</td>
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
    <td>Management of lecture and class control</td>
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
    <td>Involvement of students in learning process</td>
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
    <td>Use of media such as charts, models, transparencies, OHP, VCR, TV</td>
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

$insert_query="insert into feedtheory  (planning_lessons, effective_communication, management_lecture, involvement_student, use_of_media)
				values ( $rd1, $rd2, $rd3, $rd4, $rd5)";			
mysql_query($insert_query);				
}
?>