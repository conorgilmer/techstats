<!-- header -->
<?php include('php/header.php'); ?>  

<!-- additional header stuff -->

  <script type="text/javascript">

                // Load the Visualization API and the chart package.
                google.load('visualization', '1', {'packages':['corechart']});
  function drawItems(num) {
    var jsonChartData = $.ajax({
      url: "genlinegraph.php",
      data: "q="+num,
      dataType:"json",
      async: false
    }).responseText;

                        // Create our data table out of JSON data loaded from server.
                        var data = new google.visualization.DataTable(jsonChartData);
                        var options = {
                                title: 'Software ' +num,
                                width: 900,
                                height: 500,
				vAxis: {title: "Percentage"},
                                hAxis: {title: "Dates"}
                        };
                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                        chart.draw(data, options);

// a click handler which grabs some values then redirects the page
        google.visualization.events.addListener(chart, 'select', function() {
          // grab a few details before redirecting
          var selection = chart.getSelection();
          var row = selection[0].row;
          var col = selection[0].column;
          var year = data.getValue(row, 0);
          location.href = 'pollspie.php?row=' + row + '&col=' + col + '&year=%27' + year+"%27";
        });

                }
    </script>


<!-- menu -->
<?php include('php/menu.php'); ?>  


<!-- Content Start -->

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-9">
  
<h1>Software - Line Chart</h1>
  <form>
  <select name="users" onchange="drawItems(this.value)">
  <option value="all">Select a Technology:</option>
    <option value="all">All</option>
    <option value="browsers">Browsers</option>
    <option value="languages">Languages</option>
    <option value="os">Operating Systems</option>
  </select>
  </form>

<div id="chart_div"></div>
        </div>
      </div>

<!-- Content End -->

<!-- footer -->
<?php include('php/footer.php'); ?>  
