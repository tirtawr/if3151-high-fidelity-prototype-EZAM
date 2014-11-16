<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<base href="<?php echo $systemurl; ?>">

    <title>Home - EZAM</title>
	
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui-1.10.2.custom.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<?php echo $incHeader; ?>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="image/logo.png" style="margin-top:-12px;"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if ($isLogin == 0) { ?>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
			<?php }else{ ?>
				<ul class="nav navbar-nav">
                    <li>
                        <a href="page/member">Dashboard</a>
                    </li>
                    <li>
                        <a href="page/mycommittee">My Committee</a>
                    </li>
                    <li>
                        <a href="#">Profile</a>
                    </li>
                </ul>
			<?php } ?>
				<ul class="nav navbar-nav navbar-right">
				  <li class="dropdown">
					<a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown">Ezam Account <b class="caret"></b></a>
					
					<?php if ($isLogin == 0) { ?>
					<div class="dropdown-menu" style="width: 380px; height: 250px; padding: 10px;">
					<h4>Login to your account</h3>
					  <form action="page/member">
						<input class="form-control" type="text" placeholder="Username" /><br/>
						<input class="form-control" type="password" placeholder="Password" /><br/>
						<input class="btn btn-primary" type="submit" value="Login" />
					  </form>
					  </div>
					 <?php } elseif($isLogin == 1) { ?>
					 <div class="dropdown-menu" style="width: 380px; height: 125px; padding: 10px;">
					 <img src="image/Budi.png" style="float:left;width:100px; margin-right: 10px;"/><h4>Hello <strong>Andre Susanto</strong>!</h3>
					 You have <strong>2</strong> actives committee<br/>
					 <a href="<?php echo $systemurl; ?>">Log Out</a>
					  </div>
					 <?php } ?>
					
				  </li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	

    <!-- Page Content -->
    <div class="container">