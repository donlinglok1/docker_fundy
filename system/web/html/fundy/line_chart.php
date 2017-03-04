<?php
include (dirname ( __FILE__ ) . '/../.ba&4AhAF_mysql.php');

echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
echo "<script type='text/javascript'>";
echo "var json = JSON.parse('" . json_encode ( sql_select_array ( "
		SELECT price,
						DATE_FORMAT(tradetime,'%Y') AS '%Y',
						DATE_FORMAT(tradetime,'%m') AS '%m',
						DATE_FORMAT(tradetime,'%d') AS '%d',
						DATE_FORMAT(tradetime,'%H') AS '%H',
						DATE_FORMAT(tradetime,'%i') AS '%i',
						DATE_FORMAT(tradetime,'%s') AS '%s'
		FROM fundy.stock_HKG
		WHERE ticker_google = 'HKG:0001'
		GROUP BY tradetime
		" ), true ) . "');";
// echo mysqli_errno ( $_MYSQLCONNECTION ) . ": " . mysqli_error ( $_MYSQLCONNECTION ) . "\n";
echo "
 
    var jss = [];
    for(var i=0; i<json.length ;i++){
    	console.log( json[i]);
		jss[i] = [
			new Date(
				json[i]['%Y'],
				json[i]['%m'],
				json[i]['%d'],
				json[i]['%H'],
				json[i]['%i'],
				json[i]['%s']
			),
			parseFloat(json[i]['price'])
		];
    }
    
    console.log(jss);
    
    google.charts.load('current', {'packages':['annotationchart']});
    google.charts.setOnLoadCallback(drawChart);
    function
	drawChart() {
      var data=new
	google.visualization.DataTable();
      data.addColumn('date', 'Date');
      data.addColumn('number', 'price');
      //data.addColumn('string', 'title');
      //data.addColumn('string', 'text');
      /*data.addRows([
        [new
	Date(2314, 2, 15), 12400, undefined, undefined],
        [new
	Date(2314, 2, 16), 24045, 'Lalibertines', 'First
	encounter'],
        [new
	Date(2314, 2, 17), 35022, 'Lalibertines', 'They are very
	tall'],
        [new Date(2314, 2, 18), 12284, 'Lalibertines', 'Attack
	on our crew!'],
        [new
	Date(2314, 2, 19), 8476, 'Lalibertines', 'Heavy
	casualties'],
        [new Date(2314, 2, 20), 0, 'Lalibertines', 'All
	crew lost']
      ]);*/
      data.addRows(jss);

      var
	chart=new
	google.visualization.AnnotationChart(document.getElementById('chart_div'));

      var
	options={ displayAnnotations:true
      };

      chart.draw(data, options);
    }
    
		";
echo "</script>";
echo "<div id='chart_div'></div>";
?>
   