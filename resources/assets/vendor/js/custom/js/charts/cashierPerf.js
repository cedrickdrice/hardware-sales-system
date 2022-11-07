var chart = AmCharts.makeChart("cashierSales_chart", {
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
    }],
    "graphs": [ {
        "id": "g4",
        "valueAxis": "v1",
        "lineColor": "#4486F4",
        "fillColors": "#4486F4",
        "fillAlphas": 1,
        "type": "column",
        "title": "Sales",
        "valueField": "sales1",
        "columnWidth": 0.3,
        "legendValueText": "$[[value]]M",
        "balloonText": "<b>[[name]]</b><br>[[title]]<br /><b style='font-size: 130%'>₱[[value]]M</b>"
    }],
    "chartCursor": {
        "pan": false,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha": 0,
        "valueLineAlpha": 0.2,
        "categoryBalloonColor": "#222222"
    },
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha":0,
        "gridAlpha":0,
        "labelRotation": 45
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
        "name": "Jan",
        "market1": 71,
        "sales1": 5
    }, {
        "name": "Feb",
        "market1": 74,
        "sales1": 4
    }, {
        "name": "Mar",
        "market1": 78,
        "sales1": 5
    }, {
        "name": "Apr",
        "market1": 85,
        "sales1": 8
    }, {
        "name": "May",
        "market1": 82,
        "sales1": 9
    }, {
        "name": "Jun",
        "market1": 83,
        "sales1": 3
    }, {
        "name": "Jul",
        "market1": 88,
        "sales1": 5
    }, {
        "name": "Aug",
        "market1": 85,
        "sales1": 7
    }, {
        "name": "Sep",
        "market1": 85,
        "sales1": 9
    }, {
        "name": "Oct",
        "market1": 80,
        "sales1": 5
    }, {
        "name": "Nov",
        "market1": 87,
        "sales1": 4
    }, {
        "name": "Dec",
        "market1": 84,
        "sales1": 3
    }]
});

// $(document).ready(function(){
//   function playAnimation(effect, duration){
//     nameSales_chart.startEffect = effect;
//     nameSales_chart.startDuration = duration;
//     nameSales_chart.sequencedAnimation = "sequenced";
//   }
//   playAnimation('elastic','1')
// })