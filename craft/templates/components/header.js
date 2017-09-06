require('element-closest');

document.body.addEventListener('click', function (event) {
    var link = event.target.closest('[data-menu-toggle]')
    if (link) {
        event.preventDefault();
        var header = link.closest('[data-header]');
        var open = parseInt(header.dataset.open || 0) == 0 ? 1 : 0;
        header.dataset.open = open;
        var toggle = header.querySelector('[data-icon]');
        if (toggle && open) {
            toggle.className = 'fa fa-close';
        }
        else {
            toggle.className = 'fa fa-bars';
        }
    }
});

document.body.addEventListener('click', function (event) {
    var link = event.target.closest('[data-search-link]')
    if (link) {
        event.preventDefault();
        // var anchor = link.querySelector('a');
        // anchor.parentNode.removeChild(anchor);
        var header = link.closest('[data-header]');
        var form = header.querySelector('[data-search-form]');
        form.style.display = 'block';
        // link.appendChild(form);
        // link.removeAttribute('data-search-link');
        // link.querySelector('input[type="text"]').focus();
    }
});