<?php
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Factory;
if (!function_exists('pratice')) {
	function pratice()
	{
		// $list = ["tasman","internatonal","acdemies"];
		// echo "<ol style='list-style-type:lower-roman'>";
		// foreach ($list as $value) {
		// 	echo "<li>".$value."</li>";
		// }
		// echo "</ol>";
		return view('layouts.practice');
	}
}