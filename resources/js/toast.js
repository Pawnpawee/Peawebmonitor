import { Dismiss } from 'flowbite';

(function() {
    document.querySelectorAll("[toast]").forEach(function(el) {
        // trigger element that will be dismissed
        const trigger = el.querySelector('[data-dismiss]');
        if(el.hasAttribute('data-autohide')) {
            const dismiss = new Dismiss(el, trigger);
            setTimeout(function() {
                dismiss.hide();
            }, 3000);
        }
    });
})();
