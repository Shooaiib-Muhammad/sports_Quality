<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Product example · Bootstrap</title>

    <!-- <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/product/">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
		integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 800px;
            margin: 1em auto;
        }
        
        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        
        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }
        
        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
</head>
<body>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            Chart showing data loaded dynamically.The individual data points can be clicked to display more information.
        </p>
    </figure>
	<script>
		// A point click event that uses the Renderer to draw a label next to the point
// On subsequent clicks, move the existing label instead of creating a new one.
Highcharts.addEvent(Highcharts.Point, 'click', function () {
  if (this.series.options.className.indexOf('popup-on-click') !== -1) {
    const chart = this.series.chart;
    const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
    const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

    const anchorX = this.plotX + this.series.xAxis.pos;
    const anchorY = this.plotY + this.series.yAxis.pos;
    const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
    const x = align === 'left' ? anchorX + 10 : anchorX - 10;
    const y = anchorY - 30;
    if (!chart.sticky) {
      chart.sticky = chart.renderer
        .label(text, x, y, 'callout',  anchorX, anchorY)
        .attr({
          align,
          fill: 'rgba(0, 0, 0, 0.75)',
          padding: 10,
          zIndex: 7 // Above series, below tooltip
        })
        .css({
          color: 'white'
        })
        .on('click', function () {
          chart.sticky = chart.sticky.destroy();
        })
        .add();
    } else {
      chart.sticky
        .attr({ align, text })
        .animate({ anchorX, anchorY, x, y }, { duration: 250 });
    }
  }
});


Highcharts.chart('container', {

  chart: {
    scrollablePlotArea: {
      minWidth: 700
    }
  },

  data: {
    csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
    beforeParse: function (csv) {
      return csv.replace(/\n\n/g, '\n');
    }
  },

  title: {
    text: 'Daily sessions at www.highcharts.com'
  },

  subtitle: {
    text: 'Source: Google Analytics'
  },

  xAxis: {
    tickInterval: 7 * 24 * 3600 * 1000, // one week
    tickWidth: 0,
    gridLineWidth: 1,
    labels: {
      align: 'left',
      x: 3,
      y: -3
    }
  },

  yAxis: [{ // left y axis
    title: {
      text: null
    },
    labels: {
      align: 'left',
      x: 3,
      y: 16,
      format: '{value:.,0f}'
    },
    showFirstLabel: false
  }, { // right y axis
    linkedTo: 0,
    gridLineWidth: 0,
    opposite: true,
    title: {
      text: null
    },
    labels: {
      align: 'right',
      x: -3,
      y: 16,
      format: '{value:.,0f}'
    },
    showFirstLabel: false
  }],

  legend: {
    align: 'left',
    verticalAlign: 'top',
    borderWidth: 0
  },

  tooltip: {
    shared: true,
    crosshairs: true
  },

  plotOptions: {
    series: {
      cursor: 'pointer',
      className: 'popup-on-click',
      marker: {
        lineWidth: 1
      }
    }
  },

  series: [{
    name: 'All sessions',
    lineWidth: 4,
    marker: {
      radius: 4
    }
  }, {
    name: 'New users'
  }]
});
	</script>
</body>
</html>
