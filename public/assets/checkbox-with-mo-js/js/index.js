var square = new mojs.Shape({
  radius: 70,
  radiusY: 70,
  shape: 'rect',
  stroke: '#09A4E0',
  strokeWidth: { 10: 50 },
  fill: 'none',
  scale: { 0.15: 0.15 },
  opacity: { 1: 0 },
  duration: 350,
  easing: 'sin.out',
  isShowEnd: false
});

var lines = new mojs.Burst({
  left: 0, top: 0,
  radius: { 35: 35 },
  angle: 0,
  count: 8,
  children: {
    shape: 'line',
    radius: 10,
    scale: 1,
    stroke: '#09A4E0',
    strokeDasharray: '100%',
    strokeDashoffset: { '-100%': '100%' },
    duration: 700,
    easing: 'quad.out'
  }
});



// var check = document.getElementById("lbl_check");
var check = $('.mo_chck');
// var checked = document.querySelector(".mo_chck");
//var checked = check.checked;

function fireBurst(e) {
  var checked = e.target.checked;
  if (checked) {
    var pos = this.getBoundingClientRect();

    var timeline = new mojs.Timeline({ speed: 1.5 });

    timeline.add(square, lines);

    square.tune({
      'left': pos.left + 13,
      'top': pos.top + 12
    });
    lines.tune({
      x: pos.left + 13,
      y: pos.top + 12
    });

    if ("vibrate" in navigator) {
      navigator.vibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate;

      navigator.vibrate([100, 200, 400]);
    }

    timeline.play();
  }
  checked = !checked;
}

//check.addEventListener('click', fireBurst);
 $('.mo_chck').on('click', fireBurst);

