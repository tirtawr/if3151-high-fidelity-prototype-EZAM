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
							
	case 'modify'		:	include("models/modify.php");
							$viewBody = "views/modify.php"; 
							break;
							
	case 'mymember'		:	$viewBody = "views/mymember.php";
							$isLogin = 2;
							break;
							
	case 'manager'		:	$viewBody = "views/manager.php";
							$isLogin = 2;
							break;
							
	case 'mycommittee'	:	$viewBody = "views/mycommittee.php";
							$isLogin = 1;
							break;
							
	case 'chat'			:	$viewBody = "views/chat.php";
							$isLogin = 1;
							break;
							
	case 'profile'		:	$viewBody = "views/profile.php";
							$isLogin = 1;
							break;
	

							
	case 'broadcastsms'	:	$viewBody = "views/broadcastsms.php";
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
