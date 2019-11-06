<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
			error_reporting(E_ALL);
			ini_set('display_errors','1');
		?>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if (!isset($_POST["name"], $_POST["id"],$_POST["course"], $_POST["cardnum"], $_POST["cardtype"])
			|| strcmp($_POST["name"],"")===0 || strcmp($_POST["id"],"")===0|| strcmp($_POST["cardnum"],"")===0){
		?>
		<!-- Ex 4 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="gradestore.html">Try again?</a></p>
		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), or a single white space.
		} elseif (preg_match("/^([a-zA-Z]+[\s\-])*[a-zA-Z]+$/", $_POST["name"]) === 0) {
		?>
		<!-- Ex 5 :
			Display the below error message : -->
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="gradestore.html">Try again?</a></p>


		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif (preg_match('/^\d{16}$/', $_POST["cardnum"]) === 0
			|| preg_match('/^(4|5)\d{15}$/', $_POST["cardnum"]) === 0
			|| (strcmp($_POST["cardtype"], "visa") ===0 && preg_match('/^4\d{15}$/', $_POST["cardnum"])===0)
			|| (strcmp($_POST["cardtype"], "mastercard") ===0 && preg_match('/^5\d{15}$/', $_POST["cardnum"])===0)

		) {

		?>

		<!-- Ex 5 :
			Display the below error message :-->
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="gradestore.html">Try again?</a></p>

		<?php
		} else {
		?>

			<h1>Thanks, looser!</h1>
			<p>Your information has been recorded.</p>

			<!-- Ex 2: display submitted data -->
			<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
				$name = $_POST["name"];
				$id = $_POST["id"];
				$course = $_POST["course"];
				$checked_course = processCheckbox($course);
				$grade = $_POST["grade"];
				$cardnum = $_POST["cardnum"];
				$cardtype = $_POST["cardtype"];
				}
			 ?>
			<ul>
				<li>Name: <?=$name ?> </li>
				<li>ID: <?=$id?></li>
				<!-- use the 'processCheckbox' function to display selected courses -->
				<li>Course: <?=$checked_course?> </li>
				<li>Grade: <?=$grade?> </li>
				<li>Credit <?=$cardnum?> (<?= $cardtype?>)</li>
			</ul>

			<!-- Ex 3 : -->
				<p>Here are all the loosers who have submitted here:</p>
			<?php
				$filename = "loosers.txt";
				/* Ex 3:
				 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
				 * For example, "Scott Lee;20110115238;4300523877775238;visa"
				 */
				 $loosers = $name.";".$id.";".$cardnum.";".$cardtype."\n";
				 file_put_contents($filename,$loosers,FILE_APPEND);
			?>

			<!-- Ex 3: Show the complete contents of "loosers.txt".
				 Place the file contents into an HTML <pre> element to preserve whitespace -->
				 <pre><?= file_get_contents($filename);?></pre>


		<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				$courses = implode(", ",$names);
				return $courses;
			}
		?>

	</body>
</html>
