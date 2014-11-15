<?php

isset($_GET['p']) ? $p = $_GET['p'] : $p = "";



$systemurl = "http://localhost/if3151-high-fidelity-prototype-EZAM/";

switch ($p) {
	
	case 'member'	: $viewBody = "views/member.php"; 
						$isLogin = 1;
						break;
	default 		: $viewBody = "views/home.php"; break;

}





// Buka View
include("views/head.php");
include($viewBody);
include("views/foot.php");
