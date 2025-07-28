// Background floating dots animation
const canvas = document.createElement('canvas');
document.body.appendChild(canvas);
canvas.style.position = 'fixed';
canvas.style.top = '0';
canvas.style.left = '0';
canvas.style.zIndex = '-1';
canvas.style.pointerEvents = 'none';

const ctx = canvas.getContext('2d');
let width, height;
function resize() {
  width = canvas.width = window.innerWidth;
  height = canvas.height = window.innerHeight;
}
window.addEventListener('resize', resize);
resize();

const dots = Array.from({ length: 80 }).map(() => ({
  x: Math.random() * width,
  y: Math.random() * height,
  r: Math.random() * 2 + 1,
  dx: (Math.random() - 0.5) * 0.5,
  dy: (Math.random() - 0.5) * 0.5
}));

function draw() {
  ctx.clearRect(0, 0, width, height);
  ctx.fillStyle = '#a2c0ff88'; // Soft blue dots
  for (const dot of dots) {
    ctx.beginPath();
    ctx.arc(dot.x, dot.y, dot.r, 0, Math.PI * 2);
    ctx.fill();

    dot.x += dot.dx;
    dot.y += dot.dy;

    if (dot.x < 0 || dot.x > width) dot.dx *= -1;
    if (dot.y < 0 || dot.y > height) dot.dy *= -1;
  }
  requestAnimationFrame(draw);
}
draw();
