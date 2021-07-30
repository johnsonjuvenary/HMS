<?php
session_start();
$disability = '';
$explanation_disability = "";
include('connection.php');
if (isset($_POST['hostel_application'])) {
	//assigning variables and escaping injection
	$disability = htmlentities(mysqli_escape_string($connection, $_POST['disability']));
	$explanation_disability = htmlentities(mysqli_escape_string($connection, $_POST['explanation_disability']));
	$insurance = htmlentities(mysqli_escape_string($connection, $_POST['insurance']));
	$declaration = htmlentities(mysqli_escape_string($connection, $_POST['declaration']));

	if ($disability == "Yes" || $disability == "No") {
		if ($disability == "Yes") {
			//getting file properties
			$file_disability = $_FILES['file_disability'];
			$file_disability_name = $_FILES['file_disability']['name']; //file name
			$file_disability_path = $_FILES['file_disability']['tmp_name']; //file temporary location
			$file_disability_size = $_FILES['file_disability']['size']; //file size
			$file_disability_error = $_FILES['file_disability']['error']; //file errors
			$file_disability_type = $_FILES['file_disability']['type']; // file type
			//working out on the file extension
			$file_disability_extension = explode('.', $file_disability_name);
			$file_disability_actual_extension = strtolower(end($file_disability_extension));
			//allowed files
			$allowed_disability_files = array('pdf', 'jpg', 'png', 'jpeg');
			if (!in_array($file_disability_actual_extension, $allowed_disability_files)) {
				echo "
				<script>alert('Disability  Proof failed to upload , file must be either pdf,jpeg,jpg or png')
				window.open('apply.php','_self')
				</script>				
				";
				exit();
				//checking file errors
			} elseif (!$file_disability_error === 0) {
				echo "
				<script>alert('Disability  Proof failed to upload, Error in a file')
				window.open('apply.php','_self')
				</script>				
				";
				exit();
				//checking file size if is less than 2MB
			} elseif (!$file_disability_size > 2097152) {
				echo "
				<script>alert('Disability  Proof failed to upload , file must be less than 2Mb')
				window.open('apply.php','_self')
				</script>				
				";
				exit();
			}else {
				//naming file name as it may contains special characters or so that similar file names to not get replaced
				$new_file_disability_name = uniqid('', true) . "." . $file_disability_actual_extension;
				//moving file to UPLOAD directory 
				$file_disability_directory = '../uploads/disability/';
				$file_disability_destination = $file_disability_directory . $new_file_disability_name;
				if (!move_uploaded_file($file_disability_path, $file_disability_destination)) {
					echo "
				<script>alert('Disability Proof failed to upload!')
				window.open('apply.php','_self')
				</script>				
				";
					exit();
				}
			}
		} elseif ($disability == "No") {
			$explanation_disability = "----------";
			$new_file_disability_name = "----------";
		} else {
			echo "
				<script>alert('Provide Disability  status please!')
				window.open('apply.php','_self')
				</script>				
				";
			exit();
		}
	}
	//checking for insurance proof
	if ($insurance == "Yes" || $insurance == "No") {
		//getting file properties
		$file_insurance = $_FILES['file_insurance'];
		$file_insurance_name = $_FILES['file_insurance']['name']; //file name
		$file_insurance_path = $_FILES['file_insurance']['tmp_name']; //file temporary location
		$file_insurance_size = $_FILES['file_insurance']['size']; //file size
		$file_insurance_error = $_FILES['file_insurance']['error']; //file errors
		$file_insurance_type = $_FILES['file_insurance']['type']; // file type
		//working out on the file extension
		$file_insurance_extension = explode('.', $file_insurance_name);
		$file_insurance_actual_extension = strtolower(end($file_insurance_extension));
		//allowed files
		$allowed_insurance_files = array('pdf', 'jpg', 'png', 'jpeg');
		if (!in_array($file_insurance_actual_extension, $allowed_insurance_files)) {
			echo "
				<script>alert('Insurance  Proof failed to upload , file must be either pdf,jpeg,jpg or png')
				window.open('apply.php','_self')
				</script>				
				";
			exit();
		} elseif (!$file_insurance_error === 0) {
			echo "
				<script>alert('Insurance  Proof failed to upload ')
				window.open('apply.php','_self')
				</script>				
				";
			exit();
		} else {
			//naming file name as it may contains special characters or so that similar file names to not get replaced
			$new_file_insurance_name = uniqid('', true) . "." . $file_insurance_actual_extension;
			//moving file to UPLOAD directory
			$file_insurance_directory = '../uploads/insurance/';
			$file_insurance_destination = $file_insurance_directory . $new_file_insurance_name;
			if (!move_uploaded_file($file_insurance_path, $file_insurance_destination)) {
				echo "
				<script>alert('Insurance Proof failed to upload')
				window.open('apply.php','_self')
				</script>				
				";
				exit();
			}
		}
	} else {
		echo "
				<script>alert('Provide Insurance  status please!')
				window.open('apply.php','_self')
				</script>				
				";
		exit();
	}
	//checking whether a student has already applied for hostel
	$checking_applicant = mysqli_query($connection, "SELECT student_regno FROM applicants WHERE student_regno = '$_SESSION[student]' LIMIT 1");
	if (mysqli_num_rows($checking_applicant) == 1) {
		echo "
				<script>alert('You have Already made application, Please wait for selection')
				window.open('apply.php','_self')
				</script>				
				";
		exit();
	} else {
		//getting next of kins id
		$getting_kin_id = mysqli_query($connection, "SELECT id FROM kins,students WHERE kins.student_regno = students.regno AND students.regno = '$_SESSION[student]' LIMIT 1");
		if (mysqli_num_rows($getting_kin_id) == 0) {
			echo "
				<script>alert('Kins not found')
				window.open('apply.php','_self')
				</script>				
				";
			exit();
		} else {
			$row_kin = mysqli_fetch_array($getting_kin_id);
			$kin_id = $row_kin["id"];
			$student_regno = $_SESSION['student'];
			//inserting application into the database
			$inserting_query = "INSERT INTO applicants (student_regno,kin_id,insurance_status,insurance_proof,disability_status,disability_proof,explanation_disability,declaration) VALUES ('$student_regno','$kin_id','$insurance','$new_file_insurance_name','$disability','$new_file_disability_name','$explanation_disability','$declaration')";
			$inserting_application = mysqli_query($connection, $inserting_query);
			if (!$inserting_application) {
				echo "
				<script>alert('Application Failed, Try again later')
				window.open('apply.php','_self')
				</script>				
				";
				exit();
			} else {
				echo "
				<script>alert('Application made Successful')
				window.open('apply.php','_self')
				</script>				
				";
			}
		}
	}
}
