<?php
if (!isset($_SESSION['student'])) {
	echo '
	<script> alert("Your not logged in!")</script>
	<script>window.open("../student/index.php","_self")</script>
	';
}
