import {lory} from 'lory.js'
var styles = require('./slider.css.json')

document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementsByClassName(styles.slider);

    if (slider.length) {
        lory(slider[0], {
            rewind: true
        });
    }
});