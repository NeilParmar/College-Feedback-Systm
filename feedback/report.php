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
	$opt_subj.="<option value=\"$subj_name\">".$subj_name;
}
?>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="feedform" name="feedform" method="post" action="report.php" >
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
<td>
<input name="submit" type="submit"/>
</td>
</tr>

</table>
</form>
</body>
</html>


<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur"]});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["blur"]});

</script>

<?php
if(isset($_POST['submit']))
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
    $count_th=0;
    $count_prac=0;
	for($i=0;$i<5;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				$student_pr[$i][$j]=0;
				$student_th[$i][$j]=0;
				$th[$i][$j]=0;
				$pr[$i][$j]=0;
			}
		}
		for($j=0;$j<4;$j++)
		{
			$th_total[$j]=0;
			$pr_total[$j]=0;
			$avg_th[$j]=0;
			$avg_pr[$j]=0;
			$a_th[$j]=0;
			$b_th[$j]=0;
			$c_th[$j]=0;						
			$d_th[$j]=0;
			$a_pr[$j]=0;
			$b_pr[$j]=0;
			$c_pr[$j]=0;						
			$d_pr[$j]=0;			
			
		}
			
			
	$result_prac=mysql_query("SELECT unique_code, planned_lab, uniform_coverage, checking_journals, preparations, planning FROM `feedpract` WHERE unique_code='$uid'");
    $result_th=mysql_query("SELECT unique_code,planning_lessons,effective_communication,management_lecture,involvement_student,use_of_media FROM `feedtheory` WHERE unique_code='$uid'");
	echo"<br/><br/><strong>Feedback Report for</strong>: <u>".$_POST['teacher']."</u> <strong>Trim</strong>: <u>".$_POST['trim']."</u> <strong>Course</strong>: <u>".$_POST['course']."</u> <strong>Branch</strong>: <u>".$_POST['branch']."</u> <strong>Year</strong>: <u>".substr($_POST['date'],0,4)."</u>";

    while ($row_th=mysql_fetch_array($result_th)) 
    { 
    	$theory[$count_th]=$row_th["unique_code"];
		if($row_th['planning_lessons']==4)
		{
			$student_th[0][0]=$row_th['planning_lessons'];
		}
		else if($row_th['planning_lessons']==3)
		{
			$student_th[0][1]=$row_th['planning_lessons'];
		}
		else if($row_th['planning_lessons']==2)
		{
			$student_th[0][2]=$row_th['planning_lessons'];
		}
		else if($row_th['planning_lessons']==1)
		{
			$student_th[0][3]=$row_th['planning_lessons'];
		}
				 
		if($row_th['effective_communication']==4)
		{
			$student_th[1][0]=$row_th['effective_communication'];
		}
		else if($row_th['effective_communication']==3)
		{
			$student_th[1][1]=$row_th['effective_communication'];
		}
		else if($row_th['effective_communication']==2)
		{
			$student_th[1][2]=$row_th['effective_communication'];
		}
		else if($row_th['effective_communication']==1)
		{
			$student_th[1][3]=$row_th['effective_communication'];
		}
		
		if($row_th['management_lecture']==4)
		{
			$student_th[2][0]=$row_th['management_lecture'];
		}
		else if($row_th['management_lecture']==3)
		{
			$student_th[2][1]=$row_th['management_lecture'];
		}
		else if($row_th['management_lecture']==2)
		{
			$student_th[2][2]=$row_th['management_lecture'];
		}
		else if($row_th['management_lecture']==1)
		{
			$student_th[2][3]=$row_th['management_lecture'];
		}
		if($row_th['involvement_student']==4)
		{
			$student_th[3][0]=$row_th['involvement_student'];
		}
		else if($row_th['involvement_student']==3)
		{
			$student_th[3][1]=$row_th['involvement_student'];
		}
		else if($row_th['involvement_student']==2)
		{
			$student_th[3][2]=$row_th['involvement_student'];
		}
		else if($row_th['involvement_student']==1)
		{
			$student_th[3][3]=$row_th['involvement_student'];
		}
		if($row_th['use_of_media']==4)
	 	{
			$student_th[4][0]=$row_th['use_of_media'];
		}
		else if($row_th['use_of_media']==3)
	 	{
			$student_th[4][1]=$row_th['use_of_media'];
		}
		else if($row_th['use_of_media']==2)
	 	{
			$student_th[4][2]=$row_th['use_of_media'];
		}
		else if($row_th['use_of_media']==1)
	 	{
			$student_th[4][3]=$row_th['use_of_media'];
		}
		for($i=0;$i<5;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				if($student_th[$i][$j]==4)
				{
					$th[$i][$j]++;
				}
				else if($student_th[$i][$j]==3)
				{
					$th[$i][$j]++;
				}
				else if($student_th[$i][$j]==2)
				{
					$th[$i][$j]++;
				}
				else if($student_th[$i][$j]==1)
				{
					$th[$i][$j]++;
				}
								
			}
		}
        $count_th++;
		for($i=0;$i<5;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				$student_th[$i][$j]=0;
			}
		}

	 }
	 while ($row_prac=mysql_fetch_array($result_prac)) 
	 { 
		$theory[$count_prac]=$row_prac["unique_code"];
		if($row_prac['planned_lab']==4)
		{
			$student_pr[0][0]=$row_prac['planned_lab'];
		}
		else if($row_prac['planned_lab']==3)
		{
			$student_pr[0][1]=$row_prac['planned_lab'];
		}
		else if($row_prac['planned_lab']==2)
		{
			$student_pr[0][2]=$row_prac['planned_lab'];
		}
		else if($row_prac['planned_lab']==1)
		{
			$student_pr[0][3]=$row_prac['planned_lab'];
		}
				 
		if($row_prac['uniform_coverage']==4)
		{
			$student_pr[1][0]=$row_prac['uniform_coverage'];
		}
		else if($row_prac['uniform_coverage']==3)
		{
			$student_pr[1][1]=$row_prac['uniform_coverage'];
		}
		else if($row_prac['uniform_coverage']==2)
		{
			$student_pr[1][2]=$row_prac['uniform_coverage'];
		}
		else if($row_prac['uniform_coverage']==1)
		{
			$student_pr[1][3]=$row_prac['uniform_coverage'];
		}
		
		if($row_prac['checking_journals']==4)
		{
			$student_pr[2][0]=$row_prac['checking_journals'];
		}
		else if($row_prac['checking_journals']==3)
		{
			$student_pr[2][1]=$row_prac['checking_journals'];
		}
		else if($row_prac['checking_journals']==2)
		{
			$student_pr[2][2]=$row_prac['checking_journals'];
		}
		else if($row_prac['checking_journals']==1)
		{
			$student_pr[2][3]=$row_prac['checking_journals'];
		}
		if($row_prac['preparations']==4)
		{
			$student_pr[3][0]=$row_prac['preparations'];
		}
		else if($row_prac['preparations']==3)
		{
			$student_pr[3][1]=$row_prac['preparations'];
		}
		else if($row_prac['preparations']==2)
		{
			$student_pr[3][2]=$row_prac['preparations'];
		}
		else if($row_prac['preparations']==1)
		{
			$student_pr[3][3]=$row_prac['preparations'];
		}
		if($row_prac['planning']==4)
	 	{
			$student_pr[4][0]=$row_prac['planning'];
		}
		else if($row_prac['planning']==3)
	 	{
			$student_pr[4][1]=$row_prac['planning'];
		}
		else if($row_prac['planning']==2)
	 	{
			$student_pr[4][2]=$row_prac['planning'];
		}
		else if($row_prac['planning']==1)
	 	{
			$student_pr[4][3]=$row_prac['planning'];
		}
		
		for($i=0;$i<5;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				if($student_pr[$i][$j]==4)
				{
					$pr[$i][$j]++;
				}
				else if($student_pr[$i][$j]==3)
				{
					$pr[$i][$j]++;
				}
				else if($student_pr[$i][$j]==2)
				{
					$pr[$i][$j]++;
				}
				else if($student_pr[$i][$j]==1)
				{
					$pr[$i][$j]++;
				}
				
			}
		}
        $count_prac++;
		for($i=0;$i<5;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				$student_pr[$i][$j]=0;
			}
		}
	 }
	
	echo"<br/><br/><br/>";
	$grand_t_th=0;
	$grand_t_pr=0;
	$grand_a_th=0;
	$grand_a_pr=0;
	for($i=0;$i<5;$i++)
	{
		$grade=4;
		for($j=0;$j<4;$j++)
		{
			$th_total[$i]+=$th[$i][$j]*$grade;
			$pr_total[$i]+=$pr[$i][$j]*$grade;
			$grade--;
		}
		$avg_th[$i]=$th_total[$i]/$count_th;
		$avg_pr[$i]=$pr_total[$i]/$count_prac;
		$grand_t_th+=$th_total[$i];
		$grand_t_pr+=$pr_total[$i];
		$grand_a_th+=$avg_th[$i];
		$grand_a_pr+=$avg_pr[$i];
	}
	$grand_a_th/=5;
	$grand_a_pr/=5;
	
	for($i=0;$i<4;$i++)
	{
		for($j=0;$j<5;$j++)
		{
			//number of ticks
				$a_th[$i]+=$th[$j][$i];
				$a_pr[$i]+=$pr[$j][$i];
		}
	}
//For THEORY
	if($count_th!=0)
	{
		echo"Total Number of Feedback for theory: ".$count_th."<br/><br/>";
		echo"<table>";
		echo"<tr><th width=\"500\">Performance Indicator</th><th width=\"54\">Excellent</th><th width=\"35\">Good</th><th width=\"51\">Average</th><th width=\"27\">Poor</th><th width=\"40\">Total</th><th width=\"51\">Average</th></tr>";
		echo"<tr bgcolor=\"#FFFFCC\">";
		echo"<td>Planning of Lessons</td><td align=\"center\">".$th[0][0]."</td><td align=\"center\">".$th[0][1]."</td><td align=\"center\">".$th[0][2]."</td><td align=\"center\">".$th[0][3]."</td><td align=\"center\">".$th_total[0]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_th[0]."</td>";
		echo"</tr>";
		echo"<tr bgcolor=\"#FFFFFF\">";
		echo"<td>Effective communication of subject matter and clarity of speech</td><td align=\"center\">".$th[1][0]."</td><td align=\"center\">".$th[1][1]."</td><td align=\"center\">".$th[1][2]."</td><td align=\"center\">".$th[1][3]."</td><td align=\"center\">".$th_total[1]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_th[1]."</td>";
		echo"</tr><tr bgcolor=\"#FFFFCC\"><td>Management of lecture and class control</td><td align=\"center\">".$th[2][0]."</td><td align=\"center\">".$th[2][1]."</td><td align=\"center\">".$th[2][2]."</td><td align=\"center\">".$th[2][3]."</td><td align=\"center\">".$th_total[2]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_th[2]."</td></tr>";
		echo"<tr bgcolor=\"#FFFFFF\"><td>Involvement of students in learning process</td><td align=\"center\">".$th[3][0]."</td><td align=\"center\">".$th[3][1]."</td><td align=\"center\">".$th[3][2]."</td><td align=\"center\">".$th[3][3]."</td><td align=\"center\">".$th_total[3]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_th[3]."</td></tr>";
		echo"<tr bgcolor=\"#FFFFCC\"><td>Use of media such as charts, models, transparencies, OHP, VCR, TV</td><td align=\"center\">".$th[4][0]."</td><td align=\"center\">".$th[4][1]."</td><td align=\"center\">".$th[4][2]."</td><td align=\"center\">".$th[4][3]."</td><td align=\"center\">".$th_total[4]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_th[4]."</td></tr>";
		echo"<tr bgcolor=\"#CFFF9F\"><td align=\"center\"><strong>Grand Total</strong></td><td align=\"center\">".round($a_th[0],2)."</td><td align=\"center\">".round($a_th[1],2)."</td><td align=\"center\">".round($a_th[2],2)."</td><td align=\"center\">".round($a_th[3],2)."</td><td align=\"center\">".$grand_t_th."</td><td align=\"center\">".$grand_a_th."</td></tr></table>";
	}
	else
	{
		echo "No feedback Exists for theory";
	}

	echo"<br/><br/><br/>";
//for LAB
	if ($count_prac!=0)
	{		
		echo"Total Number of Feedback for Practical: ".$count_prac."<br/><br/>";
		echo"<table>";
		echo"<tr><th width=\"500\" align=\"center\">Performance Indicator</th><th width=\"54\" align=\"center\">Excellent</th><th width=\"35\" align=\"center\">Good</th><th width=\"51\' align=\"center\">Average</th><th width=\"27\" align=\"center\">Poor</th><th width=\"40\" align=\"center\">Total</th><th width=\"51\" align=\"center\">Average</th></tr>";
		echo"<tr bgcolor=\"#FFFFCC\">";
		echo"<td>Planned Laboratory instructions including management of practicals</td><td align=\"center\">".$pr[0][0]."</td><td align=\"center\">".$pr[0][1]." </td><td align=\"center\">".$pr[0][2]."</td><td align=\"center\">".$pr[0][3]."</td><td align=\"center\">".$pr_total[0]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_pr[0]."</td>";
		echo"</tr>";
		echo"<tr bgcolor=\"#FFFFFF\">";
		echo"<td>Uniform Coverage of Term work and guidance for writing journals</td><td align=\"center\">".$pr[1][0]."</td><td align=\"center\">".$pr[1][1]."</td><td align=\"center\">".$pr[1][2]."</td><td align=\"center\">".$pr[1][3]."</td><td align=\"center\">".$pr_total[1]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_pr[1]."</td>";
		echo"</tr><tr bgcolor=\"#FFFFCC\"><td>Checking of journals and making continious assessment of term work</td><td align=\"center\">".$pr[2][0]."</td><td align=\"center\">".$pr[2][1]."</td><td align=\"center\">".$pr[2][2]."</td><td align=\"center\">".$pr[2][3]."</td><td align=\"center\">".$pr_total[2]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_pr[2]."</td></tr>";
		echo"<tr bgcolor=\"#FFFFFF\"><td>Preparation and displace of Instructional material, charts, models, etc.</td><td align=\"center\">".$pr[3][0]."</td><td align=\"center\">".$pr[3][1]."</td><td align=\"center\">".$pr[3][2]."</td><td align=\"center\">".$pr[3][3]."</td><td align=\"center\">".$pr_total[3]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_pr[3]."</td></tr>";
		echo"<tr bgcolor=\"#FFFFCC\"><td>Planning and procurement of consumable required for practicals</td><td align=\"center\">".$pr[4][0]."</td><td align=\"center\">".$pr[4][1]."</td><td align=\"center\">".$pr[4][2]."</td><td align=\"center\">".$pr[4][3]."</td><td align=\"center\">".$pr_total[4]."</td><td align=\"center\" bgcolor=\"#CFFF9F\">".$avg_pr[4]."</td></tr>";
		echo"<tr bgcolor=\"#CFFF9F\"><td align=\"center\"><strong>Grand Total</strong></td><td align=\"center\">".round($a_pr[0],2)."</td><td align=\"center\">".round($a_pr[1],2)."</td><td align=\"center\">".round($a_pr[	2],2)."</td><td align=\"center\">".round($a_pr[3],2)."</td><td align=\"center\">".$grand_t_pr."</td><td align=\"center\">".$grand_a_pr."</td></tr></table>";
	}
	else
	{
		echo "<br/>No feedback Exists for Practicals";
	}
	$grand=$grand_a_pr+$grand_a_th;
	echo"<br/>";
	echo"<strong><u>Grand Total</u></strong> : <b>".$grand; 
}
?>
