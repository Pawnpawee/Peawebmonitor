import Datepicker from "flowbite-datepicker/Datepicker";

function getDatepickerOptions(datepickerEl) {
    var buttons = datepickerEl.hasAttribute("datepicker-buttons");
    var autohide = datepickerEl.hasAttribute("datepicker-autohide");
    var format = datepickerEl.hasAttribute("datepicker-format");
    var orientation = datepickerEl.hasAttribute("datepicker-orientation");
    var title = datepickerEl.hasAttribute("datepicker-title");

    var today = datepickerEl.hasAttribute("datepicker-today");

    var options = {};
    if (buttons) {
        options.todayBtn = true;
        options.clearBtn = true;
    }
    if (autohide) {
        options.autohide = true;
    }
    if (format) {
        options.format = datepickerEl.getAttribute("datepicker-format");
    }
    if (orientation) {
        options.orientation = datepickerEl.getAttribute(
            "datepicker-orientation"
        );
    }
    if (title) {
        options.title = datepickerEl.getAttribute("datepicker-title");
    }
    if (today) {
        options.todayHighlight = true;
        options.minDate = new Date();
    }
    
    return options;
};

export default function initDatepicker() {
    document.querySelectorAll("[datepicker]").forEach(function (datepickerEl) {
        new Datepicker(datepickerEl, getDatepickerOptions(datepickerEl));
        datepickerEl.removeAttribute('datepicker');
        datepickerEl.addEventListener('changeDate', (e) => {
            e.target.dispatchEvent(new InputEvent('input'))
        });
        datepickerEl.options = 
    });

    document.querySelectorAll("[inline-datepicker]").forEach(function (datepickerEl) {
        new Datepicker(datepickerEl, getDatepickerOptions(datepickerEl));
        datepickerEl.removeAttribute('inline-datepicker');
        datepickerEl.addEventListener('changeDate', (e) => {
            e.target.dispatchEvent(new InputEvent('input'))
        });
    });

    document.querySelectorAll("[date-rangepicker]").forEach(function (datepickerEl) {
        new DateRangePicker(datepickerEl, getDatepickerOptions(datepickerEl));
        datepickerEl.removeAttribute('date-rangepicker');
        datepickerEl.addEventListener('changeDate', (e) => {
            e.target.dispatchEvent(new InputEvent('input'))
        });
    });
}
