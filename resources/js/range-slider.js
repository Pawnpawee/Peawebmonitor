import '../../public/vendor/range-slider/js/range-slider.min.js';

function getOptions(el)
{
    var options = {};
    options.set = [15, 80];

    if (el.value) {
        options.set = el.value.split(',').map(function(item) {
           return parseInt(item);
        });
    }

    return options;
}

export default function initRangeSlider() {
    document.querySelectorAll("[range-slider]").forEach(function (el) {
        new rSlider(Object.assign({
            target: el,
            values: {min: 0, max: 100},
            range: true,
            tooltip: true,
            scale: true,
            labels: false,
            step: 1,
        }, getOptions(el)));

        el.removeAttribute('range-slider');
    });
}
