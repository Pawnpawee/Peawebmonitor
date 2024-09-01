// import './bootstrap';
import "flowbite";
import { initFlowbite } from "flowbite";
// import initDatepicker from "./datepicker";
// import initRangeSlider from './range-slider';

import "./sidebar";
import "./dark-mode";
import "./chart";
import "./toast";
import "./select2";

const app = {
    start: function() {
        initFlowbite();
        // initDatepicker();
        // initRangeSlider();
    }
};

(function () {
    app.start();
})();

// Re-initial flowbite after navigated
Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
    succeed(({ snapshot, effect }) => {
        queueMicrotask(() => {
            app.start();
        })
    })
})

document.addEventListener("livewire:navigated", () => {
    app.start();
});