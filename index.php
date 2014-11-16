<?php

// main controller untuk P
isset($_GET['p']) ? $p = $_GET['p'] : $p = "";

// parameter utk view
$incHeader =  "";
$isLogin = 0;
$systemurl = "http://localhost/if3151-high-fidelity-prototype-EZAM/";


// pilih-pilih parameter P untuk menentukan model apa yang akan dijalankan
switch ($p) {
	
	case 'new'			:	include("models/new.php");
							$viewBody = "views/new.php"; 
							break;
							
	case 'mycommittee'	:	$viewBody = "views/mycommittee.php";
							$isLogin = 1;
							break;
							
	case 'committee'	:	include("models/committee.php");
							$viewBody = "views/committee.php";
							$isLogin = 1;
							break;
							
	case 'structure'	:	include("models/structure.php");
							$viewBody = "views/structure.php";
							$isLogin = 1;
							break;
	
	case 'member'		: 	$viewBody = "views/member.php"; 
							include("models/member.php");
							break;
							
	default 			: 	$viewBody = "views/home.php"; break;

}





// Buka View
include("views/head.php");
include($viewBody);
include("views/foot.php");
