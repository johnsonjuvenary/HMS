<?php
session_start();
if (session_destroy()) {
	echo '
	<script> alert("You logged out successful")</script>
	<script>window.open("../student/index.php","_self")</script>
	';
}
