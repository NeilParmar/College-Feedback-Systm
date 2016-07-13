<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject List</title>
</head>

<body>
<?php
error_reporting(E_ALL);
require_once dirname(__FILE__).'/Classes/PHPExcel.php';
session_start();
$inputFileName = "dir/".$_SESSION['excel'];  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
/**  Load $inputFileName to a PHPExcel Object  **/  
$objPHPExcel = $objReader->load($inputFileName);  
$total_sheets=$objPHPExcel->getSheetCount(); 
$allSheetName=$objPHPExcel->getSheetNames();  
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
$highestRow = $objWorksheet->getHighestRow(); 
$highestColumn = $objWorksheet->getHighestColumn();  
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);    
$count=0;
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("feedback");


for ($row = 1; $row <= $highestRow; $row++) 
{
    for ($col = 0; $col < $highestColumnIndex; $col++) 
	{  
    	$value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
		$arr_data[$row][$col]=$value;
    } 
}


echo "<table border=\"1\">";

for ($row = 1; $row <= $highestRow; $row++) 
{
	if($arr_data[$row][0]!=NULL)
	{
  	
		if($row%2!=0)
		{
			echo "<tr bgcolor=\"#FFFFFF\">";
   			for ($col = 0; $col < $highestColumnIndex; $col++) 
			{  
					echo "<td>".$arr_data[$row][$col]."</td>"; 
			}
   			echo"</tr>";
		}
		else
		{
			echo "<tr bgcolor=\"#CCCCCC\">";
   			for ($col = 0; $col < $highestColumnIndex; $col++) 
			{  
					echo "<td>".$arr_data[$row][$col]."</td>"; 
			}
   			echo"</tr>";
		}
		
	}

}


echo"</table>";


for($row=2;$row<= $highestRow;$row++)
{
	if($arr_data[$row][0]!=NULL)
	{
		$temp0=$arr_data[$row][0];
		
            $sub_query="INSERT INTO subjects (subject_name) VALUES('$temp0')";
			$sub_result=mysql_query($sub_query) or die(mysql_error());
			$count++;
			
	}
}
if($highestRow-1!=$count)
{
echo "<script>alert('An Error occured in insertion: please recheck the Excel Sheet')</script>";
}
else
{
	echo "<script>alert('Successful Update')</script>";
}
?>

</body>
</html>

