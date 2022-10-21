var chart = AmCharts.makeChart("bestSeller_chart",
{
    "type": "serial",
    "theme": "light",
    "dataProvider": [{
        "name": "John",
        "points": 35654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/42b5009ae1e185e658a6278f958ccc4f_1534142815.jpg"
    }, {
        "name": "Damon",
        "points": 65456,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/3_1533716893.png"
    }, {
        "name": "ROCKETEER TSHIRT",
        "points": 45724,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/1_1533716747.png"
    }, {
        "name": "Mark",
        "points": 13654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/21100169-101-1_71_1533716611.png"
    }, {
        "name": "Mark",
        "points": 13654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/tshirt_PNG5450_1533714755.png"
    }, {
        "name": "Yellow Blouse",
        "points": 13654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/yellow_1533714332.png"
    }, {
        "name": "Mark",
        "points": 13654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/yellow_1533714332.png"
    }, {
        "name": "Mark",
        "points": 13654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/3_1533716893.png"
    }, {
        "name": "Mark",
        "points": 13654,
        "color": "#4486F4",
        "bullet": "http://192.168.0.110/sam-web_based/public/storage/products/tshirt_PNG5450_1533714755.png"
    }],
    "valueAxes": [{
        "maximum": 80000,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left",
        "labelsEnabled":false
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "customBulletField": "bullet",
        "fillAlphas": 1,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "autoMargins": true,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": false,
        "tickLength": 0,
        "labelRotation": 45
    },
    "export": {
    	"enabled": true
     }
});