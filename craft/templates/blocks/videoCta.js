require('element-closest');
var reframe = require('reframe.js');
var styles = require('./cta.css.json');

document.body.addEventListener('click', function (event) {
    var el = event.target.closest('[data-video-swap]');
    if (el) {
        el.innerHTML = '<iframe src="'+el.dataset.videoSwap+(el.dataset.videoSwap.indexOf('?')>=0?'&':'?')+'autoplay=1&modestbranding=1&showinfo=0'+'" width="560" height="315"></iframe>'
        el.removeAttribute('data-video-swap');
        el.classList.remove(styles.play);
        reframe('iframe');
    }
});