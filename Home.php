<!--   adapted from http://forums.devarticles.com/mysql-development-50/drop-down-menu-populated-from-a-mysql-database-1811.html user name :  chakotha
// Code addapted from WDA lecture 2 , 06.htmlform.php -->



<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="generator" content="HTML Tidy for Linux (vers 6 November 2007), see www.w3.org" />
<title>Home</title>
</head>
<body>

	<!-- include the file that connects to the database -->
	<?php require('connect.php');?>
				
				
		<form method="GET" action="wine_validate.php">
				<p><h4> Wine Name ( or part of the wine name )  : 
				</h4></p> <input type="text" value="" name="wineName" /> <br/>
		</form>	
		
		<form method="GET" action="wine_validate.php">
				<p><h4>Region  :</h4></p>
				
	<?php
		// start php
		//test 

		// function for the region

	// selectDistinct() function 
		function selectDistinct ($connection, $tableName, $attributeName, $pulldownName, $defaultValue) 
			{
				$defaultWithinResultSet = FALSE;
				$Qregions= "SELECT * FROM region;";
				if (!($region_Result = @ mysql_query ($Qregions, $connection)))
				showerror();
				
				// store the values from the query into an array
				
				
				
				
				// Initialize the select function
							print "\n<select name=\"{$pulldownName}\">";

						// mysql_fetch_array grabs the values from the query  $region_results and places then in an array
						//The array is then stored in the variable row which will be looped through and the values will be stored
						// in a drop down box 
							while ($row = @ mysql_fetch_array($region_Result))
								{
									// Get the value for the attribute to be displayed
								$Qresults = $row[$attributeName];

									// In the table for region, the first value is called "all" and that is a defult value that
									// should appear in the dropdown box when it appears
										if (isset($defaultvalue) && $Qresults == $defaultValue)
									// Yes, show as selected
										print "\n\t<option selected value=\"{$Qresult}\">{$Qresult}";
									else
											// No, just show as an option
										print "\n\t<option value=\"{$Qresults}\">{$Qresults}";
										print "</option>";
								}
							print "\n</select>";
				
/*
						// Query to find distinct values of $attributeName in $tableName
							$distinctQuery = "SELECT DISTINCT {$attributeName} FROM
							{$tableName}";

						// Run the distinctQuery on the databaseName
							if (!($resultId = @ mysql_query ($distinctQuery, $connection)))
							showerror();

						
							
							*/
							
							
			} // end of function to find the region

  
  
  
  
  
		// Connect to the server
			if (!($connection = @ mysql_connect('yallara.cs.rmit.edu.au:51886','winestore','annu2011'))) 
			{
				showerror();
			}

			if (!mysql_select_db('winestore', $connection)) 
			{
				showerror();
			}

  print "\nRegion: ";

  // Produce the select list
  // Parameters:
  // 1: Database connection
  // 2. Table that contains values
  // 3. Attribute that contains values
  // 4. <SELECT> element name
  // 5. Optional <OPTION SELECTED>
  
  
  // function selectDistinct ($connection, $tableName, $attributeName, $pulldownName, $defaultValue) 
  // the following values are being passed to the function ( selectDistinct)
  selectDistinct($connection, "region", "region_name", "regionName", "All");
  
  //end of php
?>


				
				
	<p><h4> Range </h4></p>
				
	Year( Lower Range ) 
				
				<?php
					// HELP HERE!!!!

				function selectLYear($connection, $tableName, $attributeName) 
						{
								$defaultWithinResultSet = FALSE;
								$Qyears= "SELECT distinct year FROM wine order by year;";
						if (!($years_Result = @ mysql_query ($Qyears, $connection)))
							showerror();
				
				
				
				
				
				// Initialize the select function
							print "\n<select name=\"{$pulldownName}\">";

						// mysql_fetch_array grabs the values from the query  $region_results and places then in an array
						//The array is then stored in the variable row which will be looped through and the values will be stored
						// in a drop down box 
							while ($row = @ mysql_fetch_array($years_Result))
								{
									// Get the value for the attribute to be displayed
								$YLresults = $row[$attributeName];

									// In the table for region, the first value is called "all" and that is a defult value that
									// should appear in the dropdown box when it appears
										if (isset($defaultvalue) && $YLresults == $defaultValue)
									// Yes, show as selected
										print "\n\t<option selected value=\"{$YLresult}\">{$LYresult}";
									else
											// No, just show as an option
										print "\n\t<option value=\"{$YLresults}\">{$YLresults}";
										print "</option>";
								}
							print "\n</select>";
				}


					selectLYear($connection,"wine", "year");
?>
				
				
				
				
	Year( Lower Range ) 
				
				<?php
					// HELP HERE!!!!

				function selectUYear($connection, $tableName, $attributeName) 
						{
								$defaultWithinResultSet = FALSE;
								$Qyears= "SELECT distinct year FROM wine order by year;";
						if (!($years_Result = @ mysql_query ($Qyears, $connection)))
							showerror();
				
				
				
				
				
				// Initialize the select function
							print "\n<select name=\"{$pulldownName}\">";

						// mysql_fetch_array grabs the values from the query  $region_results and places then in an array
						//The array is then stored in the variable row which will be looped through and the values will be stored
						// in a drop down box 
							while ($row = @ mysql_fetch_array($years_Result))
								{
									// Get the value for the attribute to be displayed
								$YUresults = $row[$attributeName];

									// In the table for region, the first value is called "all" and that is a defult value that
									// should appear in the dropdown box when it appears
										if (isset($defaultvalue) && $YUresults == $defaultValue)
									// Yes, show as selected
										print "\n\t<option selected value=\"{$YUresult}\">{$LUresult}";
									else
											// No, just show as an option
										print "\n\t<option value=\"{$YUresults}\">{$YUresults}";
										print "</option>";
								}
							print "\n</select>";
				}


					selectLYear($connection,"wine", "year");
?>
				
				
				
				
				<p><h4> Minimum number of wines  :</h4></p>
				<input type="text" value="" name="minWine" /> <br/>
				
				<p><h4>Cost (in dollars)   :</h4></p>
				<input type="text" value="" name="dollar" /> <br/>
				
			
					</p> 
					<br>
					<input type="submit" value="Show Wines">
		</form>
 
</body>
</html>
