<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
<link rel="stylesheet" type="text/css" href="calendar.css" />
<script type="text/javascript" src="calendar.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("feedback");
$opt_fac="";
$opt_subj="";
$query_fac=mysql_query("SELECT teacher_name FROM teacher");
while($row_fac=mysql_fetch_array($query_fac))
{
	$fac_name=$row_fac['teacher_name'];
	$opt_fac.="<option value=\"$fac_name\">".$fac_name;
}
$query_subj=mysql_query("SELECT subject_name FROM subjects");
while($row_subj=mysql_fetch_array($query_subj))
{
	$subj_name=$row_subj['subject_name'];
	$val_sub=$subj_name;
	$val_sub.=0;	
	$opt_subj.="<option value=\"$subj_name\">".$subj_name;
}
?>
<script type="text/javascript">
function enable()
{
	if(document.feedform.lec.options[document.feedform.lec.selectedIndex].value=="theory")
	{	
	window.scroll(0,0);
	var j;
	for(j=0;j<document.feedform.rd1.length;j++)
	{
		document.feedform.rd1[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd2.length;j++)
	{
		document.feedform.rd2[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd3.length;j++)
	{
		document.feedform.rd3[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd4.length;j++)
	{
		document.feedform.rd4[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd5.length;j++)
	{
		document.feedform.rd5[j].disabled=false;
	}
	document.feedform.suggestions.disabled=false;
	document.feedform.submit.disabled=false;

	for(j=0;j<document.feedform.rd6.length;j++)
	{
		document.feedform.rd6[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd7.length;j++)
	{
		document.feedform.rd7[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd8.length;j++)
	{
		document.feedform.rd8[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd9.length;j++)
	{
		document.feedform.rd9[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd10.length;j++)
	{
		document.feedform.rd10[j].disabled=true;
	}
	document.feedform.suggestion_lab.disabled=true;
	document.feedform.submit1.disabled=true;
	}
	else if(document.feedform.lec.options[document.feedform.lec.selectedIndex].value=="lab")
	{
	window.scroll(0,400);
	var j;
	for(j=0;j<document.feedform.rd1.length;j++)
	{
		document.feedform.rd1[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd2.length;j++)
	{
		document.feedform.rd2[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd3.length;j++)
	{
		document.feedform.rd3[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd4.length;j++)
	{
		document.feedform.rd4[j].disabled=true;
	}
	for(j=0;j<document.feedform.rd5.length;j++)
	{
		document.feedform.rd5[j].disabled=true;
	}
	document.feedform.suggestions.disabled=true;
	document.feedform.submit.disabled=true;

for(j=0;j<document.feedform.rd6.length;j++)
	{
		document.feedform.rd6[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd7.length;j++)
	{
		document.feedform.rd7[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd8.length;j++)
	{
		document.feedform.rd8[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd9.length;j++)
	{
		document.feedform.rd9[j].disabled=false;
	}
	for(j=0;j<document.feedform.rd10.length;j++)
	{
		document.feedform.rd10[j].disabled=false;
	}
	document.feedform.suggestion_lab.disabled=false;
	document.feedform.submit1.disabled=false;
	
	}
	else
	{
		window.scroll(0,0);
		var j;
		for(j=0;j<document.feedform.rd1.length;j++)
		{
			document.feedform.rd1[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd2.length;j++)
		{
			document.feedform.rd2[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd3.length;j++)
		{
			document.feedform.rd3[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd4.length;j++)
		{
			document.feedform.rd4[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd5.length;j++)
		{
			document.feedform.rd5[j].disabled=false;
		}
		document.feedform.suggestions.disabled=false;
		document.feedform.submit.disabled=false;

		for(j=0;j<document.feedform.rd6.length;j++)
		{
			document.feedform.rd6[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd7.length;j++)
		{
			document.feedform.rd7[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd8.length;j++)
		{
			document.feedform.rd8[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd9.length;j++)
		{
			document.feedform.rd9[j].disabled=false;
		}
		for(j=0;j<document.feedform.rd10.length;j++)
		{
			document.feedform.rd10[j].disabled=false;
		}
		document.feedform.suggestion_lab.disabled=false;
		document.feedform.submit1.disabled=false;
	}
}

</script>
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
	if(document.feedform.lec.options[document.feedform.lec.selectedIndex].value=="theory")
	{
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
	}
	else
	{
//** Other form validation statements **
if (!countSelections(Form.rd6))
{
alert("Input Error: A Field is empty");
return (false);
}
if (!countSelections(Form.rd7))
{
alert("Input Error: A Field is empty");
return (false);
}
if (!countSelections(Form.rd8))
{
alert("Input Error: A Field is empty");
return (false);
}
if (!countSelections(Form.rd9))
{
alert("Input Error: A Field is empty");
return (false);
}
if (!countSelections(Form.rd10))
{
alert("Input Error: A Field is empty");
return (false);
}
}
	
return(true);
}
// -->
</script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="feedform" name="feedform" method="post" onSubmit="ValidateForm()"action="feedback.php" >
<table>
<tr>
<td>Date : </td><td><span id="sprytextfield1">
<input type="text" name="date" id="date" value="<? echo date("Y-m-d")?>" />
<span class="textfieldRequiredMsg">A value is required.</span></span>
<td>(Click on TEXTBOX to change the Date!)</td>
<script type="text/javascript">
  	calendar.set("date");
</script></td>
</tr>
<tr>
<td>Teacher : </td><td><span id="spryselect1">
  <select name="teacher">
    <option value="">Select</option>
    <?=$opt_fac?>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span><br/></td>
</tr>
<tr>
<td>Trim : </td><td><span id="spryselect2">
  <select name="trim">
    <option value="">Select</option>
    <option value="01">1</option>
    <option value="02">2</option>
    <option value="03">3</option>
    <option value="04">4</option>
    <option value="05">5</option>
    <option value="06">6</option>
    <option value="07">7</option>
    <option value="08">8</option>
    <option value="09">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
<td>Subject : </td><td><span id="spryselect3">
  <select name="subject">
    <option value="">Select</option>
    <?=$opt_subj?>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
<td>Course : </td><td><span id="spryselect4">
  <select name="course">
    <option value="">Select</option>
    <option value="Btech">B.Tech</option>
    <option value="MCAbb">MCA</option>
    <option value="MBAbb">MBA</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
<td>Branch : </td><td><span id="spryselect5">
  <select name="branch">
    <option value="">Select</option>
    <option value="civl">Civil</option>
    <option value="comp">Computer</option>
    <option value="elex">ELEX</option>
    <option value="extc">EXTC</option>
    <option value="it00">IT</option>
    <option value="mech">Mechanical</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td></tr>
<tr>
<td>Lecture Type : </td><td><span id="spryselect6">
  <select name="lec" onchange="enable()">
    <option value="">Select</option>
    <option value="theory">Theory</option>
    <option value="lab">Practical</option>
    <option value="both">Both</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td></tr>
</table>
<br />
<strong><u>Theory</u></strong>
<br />
<br />
<table width="557" border="0">
  <tr bgcolor="#FFFFCC">
    <td width="90">Performance Indicator</td>
    <td width="54">Excellent</td>
    <td width="35">Good</td>
    <td width="51">Average</td>
    <td width="27">Poor</td>
  </tr>
  <tr>
    <td>Planning of Lessons</td>
    <td>
     <input type="radio" name="rd1" id="rd1"  value="4" disabled="disabled"/>
      <label for="rd1"></label></td>
    <td><input type="radio" name="rd1" id="rd1"  value="3" disabled="disabled"/>
      <label for="rd1"></label></td>
    <td><input type="radio" name="rd1" id="rd1"  value="2" disabled="disabled"/>
      <label for="rd1"></label></td>
    <td><input type="radio" name="rd1" id="rd1"  value="1" disabled="disabled"/>
      <label for="rd1"></label></td>
    </tr>
     
  <tr bgcolor="#FFFFCC">
    <td>Effective communication of subject matter and clarity of speech</td>
    <td><input type="radio" name="rd2" id="rd2" value="4" disabled="disabled"/>
      <label for="rd2"></label></td>
    <td><input type="radio" name="rd2" id="rd2" value="3" disabled="disabled"/>
      <label for="rd2"></label></td>
    <td><input type="radio" name="rd2" id="rd2"  value="2" disabled="disabled"/>
      <label for="rd2"></label></td>
    <td><input type="radio" name="rd2" id="rd2" value="1" disabled="disabled"/>
      <label for="rd2"></label></td>
  </tr>
  <tr>
    <td>Management of lecture and class control</td>
    <td><input type="radio" name="rd3" id="rd3"  value="4" disabled="disabled"/>
      <label for="rd3"></label></td>
    <td><input type="radio" name="rd3" id="rd3"  value="3" disabled="disabled"/>
      <label for="rd3"></label></td>
    <td><input type="radio" name="rd3" id="rd3"  value="2" disabled="disabled"/>
      <label for="rd3"></label></td>
    <td><input type="radio" name="rd3" id="rd3" value="1" disabled="disabled"/>
      <label for="rd3"></label></td>
      
  </tr>
  <tr bgcolor="#FFFFCC">
    <td>Involvement of students in learning process</td>
    <td><input type="radio" name="rd4" id="rd4" value="4" disabled="disabled"/>
      <label for="rd4"></label></td>
    <td><input type="radio" name="rd4" id="rd4"  value="3" disabled="disabled"/>
      <label for="rd4"></label></td>
    <td><input type="radio" name="rd4" id="rd4" value="2" disabled="disabled"/>
      <label for="rd4"></label></td>
    <td><input type="radio" name="rd4" id="rd4"  value="1" disabled="disabled"/>
      <label for="rd4"></label></td>
  </tr>
  <tr>
    <td>Use of media such as charts, models, transparencies, OHP, VCR, TV</td>
    <td><input type="radio" name="rd5" id="rd5" value="4" disabled="disabled"/>
      <label for="rd5"></label></td>
    <td><input type="radio" name="rd5" id="rd5" value="3" disabled="disabled"/>
      <label for="rd5"></label></td>
    <td><input type="radio" name="rd5" id="rd5" value="2" disabled="disabled"/>
      <label for="rd5"></label></td>
    <td><input type="radio" name="rd5" id="rd5" value="1" disabled="disabled"/>
      <label for="rd5"></label></td>
  </tr>
</table>
<p>Suggestions:<textarea name="suggestions" cols="" rows="" disabled="disabled"></textarea></p>
<input name="submit" type="submit" disabled="disabled"/>
<br /><br/>
<strong><u>Lab</u></strong>
<br /><br />
<table width="557" border="0">
  <tr bgcolor="#FFFFCC">
    <td width="90">Performance Indicator</td>
    <td width="54">Excellent</td>
    <td width="35">Good</td>
    <td width="51">Average</td>
    <td width="27">Poor</td>
  </tr>
  <tr>
<td>Planned Laboratory instructions including management of practicals</td>
    <td><input type="radio" name="rd6" id="rd6" value="4" disabled="disabled"/>
      <label for="rd6"></label></td>
    <td><input type="radio" name="rd6" id="rd6" value="3" disabled="disabled"/>
      <label for="rd6"></label></td>
    <td><input type="radio" name="rd6" id="rd6" value="2" disabled="disabled"/>
      <label for="rd6"></label></td>
    <td><input type="radio" name="rd6" id="rd6" value="1" disabled="disabled"/>
      <label for="rd6"></label></td>

  </tr>
  <tr bgcolor="#FFFFCC">
    <td>Uniform Coverage of Term work and guidance for writing journals</td>
    <td><input type="radio" name="rd7" id="rd7" value="4" disabled="disabled"/>
      <label for="rd7"></label></td>
    <td><input type="radio" name="rd7" id="rd7" value="3" disabled="disabled"/>
      <label for="rd7"></label></td>
    <td><input type="radio" name="rd7" id="rd7" value="2" disabled="disabled"/>
      <label for="rd7"></label></td>
    <td><input type="radio" name="rd7" id="rd7" value="1" disabled="disabled"/>
      <label for="rd7"></label></td>

  </tr>
  <tr>
    <td>Checking of journals and making continious assessment of term work</td>
    <td><input type="radio" name="rd8" id="rd8" value="4" disabled="disabled"/>
      <label for="rd8"></label></td>
    <td><input type="radio" name="rd8" id="rd8" value="3" disabled="disabled"/>
      <label for="rd8"></label></td>
    <td><input type="radio" name="rd8" id="rd8" value="2" disabled="disabled"/>
      <label for="rd8"></label></td>
    <td><input type="radio" name="rd8" id="rd8" value="1" disabled="disabled"/>
      <label for="rd8"></label></td>
      
  </tr>
  <tr bgcolor="#FFFFCC">
    <td>Preparation and displace of Instructional material, charts, models, etc.</td>
    <td><input type="radio" name="rd9" id="rd9" value="4" disabled="disabled"/>
      <label for="rd9"></label></td>
    <td><input type="radio" name="rd9" id="rd9" value="3" disabled="disabled"/>
      <label for="rd9"></label></td>
    <td><input type="radio" name="rd9" id="rd9" value="2" disabled="disabled"/>
      <label for="rd9"></label></td>
    <td><input type="radio" name="rd9" id="rd9" value="1" disabled="disabled"/>
      <label for="rd9"></label></td>

  </tr>
  <tr>
    <td>Planning and procurement of consumable required for practicals</td>
    <td><input type="radio" name="rd10" id="rd10" value="4" disabled="disabled"/>
      <label for="rd10"></label></td>
    <td><input type="radio" name="rd10" id="rd10" value="3" disabled="disabled"/>
      <label for="rd10"></label></td>
    <td><input type="radio" name="rd10" id="rd10" value="2" disabled="disabled"/>
      <label for="rd10"></label></td>
    <td><input type="radio" name="rd10" id="rd10" value="1" disabled="disabled"/>
      <label for="rd10"></label></td>

  </tr>
</table>
<p>Suggestions:<textarea name="suggestion_lab" cols="" rows="" disabled="disabled"></textarea></p>
<input name="submit1" type="submit" disabled="disabled"/>

</form>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur"]});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["blur"]});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
if(isset($_POST['submit'])|isset($_POST['submit1']))
{
	$uid="";
	$uid.=substr($_POST['teacher'],0,3);
	$uid.=$_POST['trim'];
	$uid.=substr($_POST['subject'],0,3);
	$uid.=$_POST['course'];
	$uid.=$_POST['branch'];
	$uid.=substr($_POST['date'],0,4);
	session_start();
	$_SESSION['uid']=$uid;
	if(strlen($uid)!=21)
	{
	echo "<script>alert('Please Fill all the details!')</script>";
	}
	else
	{
	if($_POST['lec']=='theory')
	{
		$rd1=$_POST['rd1'];
		$rd2=$_POST['rd2'];
		$rd3=$_POST['rd3'];
		$rd4=$_POST['rd4'];
		$rd5=$_POST['rd5'];
		$sugg=$_POST['suggestions'];
	
		$insert_query="insert into feedtheory  (unique_code,planning_lessons, effective_communication, management_lecture, involvement_student, use_of_media,comments)
				values ('$uid', '$rd1', '$rd2', '$rd3', '$rd4', '$rd5','$sugg')";			
		$r=mysql_query($insert_query);	
		if($r==FALSE)
		{
			echo "<script>alert('An Error Occured!')</script>";
		}
		else
		{
			echo "<script>alert('successful update!')</script>";		
		}
	}
	else
	{
		$rd1=$_POST['rd6'];
		$rd2=$_POST['rd7'];
		$rd3=$_POST['rd8'];
		$rd4=$_POST['rd9'];
		$rd5=$_POST['rd10'];
		$sugg=$_POST['suggestion_lab'];
	
		$insert_query="insert into feedpract  (unique_code,planned_lab, uniform_coverage, checking_journals, preparations, planning,comments)
				values ('$uid','$rd1', '$rd2', '$rd3', '$rd4', '$rd5','$sugg')";			
		$r=mysql_query($insert_query);	
		if($r==FALSE)
		{
			echo "<script>alert('An Error Occured!')</script>";
		}
		else
		{
			echo "<script>alert('successful update!')</script>";		
		}			

	}
	}
}
?>