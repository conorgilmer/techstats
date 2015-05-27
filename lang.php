<!-- header -->
<?php include('php/header.php'); ?>

<!-- additional header stuff -->
<script>
  // Load the Visualization API and the chart package.
  google.load('visualization', '1', {'packages':['corechart']});
  google.setOnLoadCallback(drawChart);
  function drawChart(num) {
    var jsonChartData = $.ajax({
      url: "getlangdatabar.php",
      dataType:"json",
      async: false
    }).responseText;


      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonChartData);

      // Instantiate and draw our chart, passing in some options.
      var pie_chart = new google.visualization.PieChart(document.getElementById('chart_div_pie'));
      pie_chart.draw(data, {title: 'Languages - Pie Chart', width: 500, height: 340});

// Instantiate and draw our chart, passing in some options.
      var bar_chart = new google.visualization.ColumnChart(document.getElementById('chart_div_bar'));
      bar_chart.draw(data, {title: 'Languages - Bar Chart', bars: 'horizontal',  width: 500, height: 340, legend: { position: 'none' },});
    }

    </script>



<!-- menu -->
<?php include('php/menu.php'); ?>


<h1>Languages usage - Pie and Bar Chart</h1>
  <div id="chart_div_pie"></div>
</h2>
  <div id="chart_div_bar"></div>
<!-- footer -->
<?php include('php/footer.php'); ?>
