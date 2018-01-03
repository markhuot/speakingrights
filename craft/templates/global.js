window.addEventListener('load', function (event) {
    var contexts = document.querySelectorAll('[data-match-heights]')
    for (var contextIndex=0, contextLength=contexts.length; contextIndex<contextLength; contextIndex++) {
        var context = contexts[contextIndex]
        var targets = context.querySelectorAll(context.dataset.matchHeights)
        var max = -1;
        for (var targetIndex=0, targetLength=targets.length; targetIndex<targetLength; targetIndex++) {
            var target = targets[targetIndex]
            console.log('checking', target.offsetHeight)
            var max = Math.max(max, target.offsetHeight)
        }
        console.log('the max is', max)
        if (max !== -1) {
            for (var targetIndex=0, targetLength=targets.length; targetIndex<targetLength; targetIndex++) {
                targets[targetIndex].style.minHeight = max + "px"
            }
        }
    }
})