<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>[Frack] - Spacegraph</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">[Frack] - Spacegraph</a>
        </div>
      </div>
    </div>

    <div id="data" class="hidden">
<?php
            include('parser.php');
            $parser = new parser();
            $data = $parser->parseData();
            $full = '';
            for($i = 1; $i < 8; $i++)
            {
                $full .= implode(", ", $data[$i]); 
                $full .= ($i < 7)?',':'';
                echo "<span id=\"day$i\">" . implode(", ", $data[$i]) . "</span>";
            }
            echo "<span id=\"week0\">" . $full . "</span>";
?>
    </div>

    <h2>Monday</h2>
    <div id="Monday" style="width: 700px; height: 300px;"></div>
    
    <h2>Tuesday</h2>
    <div id="Tuesday" style="width: 700px; height: 300px;"></div>
    
    <h2>Wednesday</h2>
    <div id="Wednesday" style="width: 700px; height: 300px;"></div>
    
    <h2>Thursday</h2>
    <div id="Thursday" style="width: 700px; height: 300px;"></div>
    
    <h2>Friday</h2>
    <div id="Friday" style="width: 700px; height: 300px;"></div>
    
    <h2>Saturday</h2>
    <div id="Saturday" style="width: 700px; height: 300px;"></div>
    
    <h2>Sunday</h2>
    <div id="Sunday" style="width: 700px; height: 300px;"></div>

    <h2>Week</h2>
    <div id="Week" style="width: 1000px; height: 300px;"></div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.jqplot.min.js"></script>
    <script src="js/jqplot.barRenderer.min.js"></script>
    <script src="js/jqplot.categoryAxisRenderer.min.js"></script>
    <script src="js/frack.js"></script>
  </body>
</html>
