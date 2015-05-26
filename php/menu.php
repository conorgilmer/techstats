  </head>

  <body>
<?php include_once("php/tracking.php") ?>
    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Technical Stats.</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            	<ul class="nav navbar-nav">
            		<li><a href="index.php">Home</a></li>
            		<li><a href="sw.php">Software</a></li>
            		<li><a href="lang.php">Languages</a></li>
            		<li><a href="browsers.php">Browsers</a></li>
            		<li><a href="os.php">Operating Systems</a></li>
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Online <span class="caret"></span></a>
                	<ul class="dropdown-menu" role="menu">
            		<li><a href="sites.php">Sites</a></li>
            		<li><a href="online.php">Online</a></li>
                	</ul>
              		</li>

	    	</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="about.php">About</a></li>
		</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


