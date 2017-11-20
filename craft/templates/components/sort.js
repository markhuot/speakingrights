var axios = require('axios');
require('element-closest');

document.body.addEventListener('ajaxfetch', function (event) {
    event.preventDefault();
    var form = event.target;
    var data = new FormData(form);
    var queryParams = {};
    for (entry of [...data.entries()]) {
        queryParams[entry[0]] = entry[1];
    }
    axios.get(form.action, {"params": queryParams}).then(function(response) {
        form.querySelector('[data-ajax-container]').innerHTML = response.data;
    });
});

document.body.addEventListener('change', function (event) {
    if (event.target.hasAttribute('data-sort')) {
        var form = event.target.closest('form');
        form.dispatchEvent(new Event('ajaxfetch', {bubbles: true}));
    }
});

document.body.addEventListener('mousedown', function (event) {
    if (event.target.hasAttribute('data-sort')) {
        var el;

        if (event.target.nodeName == 'LABEL') {
            el = document.querySelector('#'+event.target.getAttribute('for'));
        }
        else {
            el = event.target;
        }

        var form = el.closest('form');
        var directionEl = form.querySelector('[name="direction"]')
        var direction = directionEl.value == 'desc' ? -1 : 1;

        if (el.checked) {
            direction *= -1;
        }

        directionEl.value = direction > 0 ? 'asc' : 'desc';

        form.dispatchEvent(new Event('ajaxfetch', {bubbles: true}));
    }
})