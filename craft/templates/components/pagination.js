var axios = require('axios');
require('element-closest');

document.body.addEventListener('click', function (event) {
    if (event.target.hasAttribute('data-ajax')) {
        var constant = parseInt(event.target.dataset.ajax);
        event.preventDefault();
        var el = event.target;
        var form = el.closest('form');
        var data = new FormData(form);
        data.set('page', parseInt(data.get('page')) + constant)
        var queryParams = {};
        for (entry of [...data.entries()]) {
            queryParams[entry[0]] = entry[1];
        }
        axios.get(form.action, {"params": queryParams}).then(function(response) {
            form.querySelector('[data-ajax-container]').innerHTML = response.data;
        });
    }
});