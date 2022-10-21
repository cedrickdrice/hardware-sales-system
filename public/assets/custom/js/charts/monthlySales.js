var chart = AmCharts.makeChart("monthSales_chart", {
  "type": "serial",
  "theme": "light",
  "addClassNames": true,
  "classNamePrefix": "amcharts",
  "precision": 2,
  "valueAxes": [{
    "id": "v1",
    "title": "Sales",
    "position": "left",
    "autoGridCount": false,
    "labelFunction": function(value) {
      return "₱" + Math.round(value) + "M";
    },
    "gridAlpha": 0,
    "gridThickness": 0
  }, {
    "id": "v2",
    "title": "Target Sales",
    "gridAlpha": 0,
    "position": "right",
    "autoGridCount": false
  }],
  "graphs": [ {
    "id": "g4",
    "valueAxis": "v1",
    "lineColor": "#4486F4",
    "fillColors": "#4486F4",
    "fillAlphas": 1,
    "type": "column",
    "title": "Actual Sales",
    "valueField": "sales1",
    "clustered": false,
    "columnWidth": 0.3,
    "legendValueText": "$[[value]]M",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>₱[[value]]M</b>"
  }, {
    "id": "g1",
    "valueAxis": "v2",
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 10,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "lineColor": "#FF4F72",
    "type": "smoothedLine",
    "title": "Target Sales",
    "useLineColorForBulletBorder": true,
    "valueField": "market1",
    "balloonText": "[[title]]<br /><b style='font-size: 130%'>₱[[value]]</b>"
  }],
  "chartScrollbar": {
    "graph": "g1",
    "oppositeAxis": false,
    "offset": 30,
    "scrollbarHeight": 50,
    "backgroundAlpha": 0,
    "selectedBackgroundAlpha": 0.1,
    "selectedBackgroundColor": "#888888",
    "graphFillAlpha": 0,
    "graphLineAlpha": 0.5,
    "selectedGraphFillAlpha": 0,
    "selectedGraphLineAlpha": 1,
    "autoGridCount": true,
    "color": "#AAAAAA"
  },
  "chartCursor": {
    "pan": false,
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "valueLineAlpha": 0.2,
    "categoryBalloonColor": "#222222"
  },
  "categoryField": "month",
  "categoryAxis": {
    "parsemonths": true,
    "dashLength": 1,
    "minorGridEnabled": true,
    "axisAlpha":0,
    "gridAlpha":0
  },
  "legend": {
    "useGraphSettings": true,
    "position": "top",
    "align":"center"
  },
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "export": {
   "enabled": true
  },
  "responsive": {
    "enabled": true
  },
  "dataProvider": [{
    "month": "Jan",
    "market1": 71,
    "sales1": 5
  }, {
    "month": "Feb",
    "market1": 74,
    "sales1": 4
  }, {
    "month": "Mar",
    "market1": 78,
    "sales1": 5
  }, {
    "month": "Apr",
    "market1": 85,
    "sales1": 8
  }, {
    "month": "May",
    "market1": 82,
    "sales1": 9
  }, {
    "month": "Jun",
    "market1": 83,
    "sales1": 3
  }, {
    "month": "Jul",
    "market1": 88,
    "sales1": 5
  }, {
    "month": "Aug",
    "market1": 85,
    "sales1": 7
  }, {
    "month": "Sep",
    "market1": 85,
    "sales1": 9
  }, {
    "month": "Oct",
    "market1": 80,
    "sales1": 5
  }, {
    "month": "Nov",
    "market1": 87,
    "sales1": 4
  }, {
    "month": "Dec",
    "market1": 84,
    "sales1": 3
  }]
});

// $(document).ready(function(){
//   function playAnimation(effect, duration){
//     monthSales_chart.startEffect = effect;
//     monthSales_chart.startDuration = duration;
//     monthSales_chart.sequencedAnimation = "sequenced";
//   }
//   playAnimation('elastic','1')
// })