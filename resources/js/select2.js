document.addEventListener('alpine:init', () => {
    Alpine.data('Select2', () => ({
        labels: null,

        register(settings) {
            let _ = this;
            let options = Object.assign({
                placeholder: "-- Please select --",
                allowClear: true,
                multiple: $(this.$refs.select).attr('multiple') !== undefined ? true : false
            }, settings === undefined ? {} : settings);
            $(this.$refs.select).select2(options);
        },

    }))
})