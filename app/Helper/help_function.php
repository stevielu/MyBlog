<?php
if (!function_exists('pratice')) {
	function pratice()
	{
		$list = ["tasman","internatonal","acdemies"];
		echo "<ol style='list-style-type:lower-roman'>";
		foreach ($list as $value) {
			echo "<li>".$value."</li>";
		}
		echo "</ol>";
	}
}