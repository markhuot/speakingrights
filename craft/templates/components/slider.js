import {lory} from 'lory.js'
var styles = require('./slider.css.json')

document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementsByClassName(styles.slider)[0];

    lory(slider, {
        rewind: true
    });
});