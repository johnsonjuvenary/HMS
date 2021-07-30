<?php
if (!isset($_SESSION['warden'])) {
	echo '
	<script> alert("Your not logged in!")</script>
	<script>window.open("../warden/index.php","_self")</script>
	';
}