//for chartist.js

var chart = new Chartist.Line('.ct-chart',{
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  series: [
    [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
  ]
}, {
  low: 0,
  showArea: true
}, [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value
      }
    }
  }],
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0]
      }
    }
  }]
])

var seq = 0

chart.on('created', function() {
  seq = 0
})
chart.on('draw', function(data) {
  if(data.type === 'point') {

    data.element.animate({
      opacity: {
        begin: seq++ * 80,
        dur: 500,
        from: 0,
        to: 1
      },
      x1: {
        begin: seq++ * 80,
        dur: 500,
        from: data.x - 100,
        to: data.x,
        easing: Chartist.Svg.Easing.easeOutQuart
      }
    })
  }
})

chart.on('draw', function(data) {
 if(data.type === 'line' || data.type === 'area') {
   data.element.animate({
     d: {
        begin: 4000 * data.index,
        dur: 2000,
        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
         to: data.path.clone().stringify(),
          easing: Chartist.Svg.Easing.easeOutQuint
      }
    })
  }
})