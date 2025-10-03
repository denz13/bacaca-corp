document.addEventListener("alpine:init", () => {
    Alpine.directive("easepick", (el, { expression }, { evaluate }) => {
        // Ensure we initialize on standard inputs as well

        const params = evaluate(expression);
        const cssAttr = el.getAttribute("data-css");
        const options = {
            format: "D MMM, YYYY",
            plugins: [],
            css: cssAttr ? [cssAttr] : [],
            element: el,
            zIndex: 2000,
            ...params,
        };

        // Safe function to initialize easepick
        const safeEasepick = () => {
            if (typeof window.EasepickBundle !== 'undefined') {
                const EB = window.EasepickBundle;

                if (params.multipleMode) {
                    const RangePlugin = EB.RangePlugin || EB.plugins?.RangePlugin;
                    if (RangePlugin) {
                        options.plugins = [...options.plugins, RangePlugin];
                        options.RangePlugin = { tooltip: true };
                    }
                }

                if (!el.value) {
                    let date = window.dayjs().format(options.format);
                    date += params.multipleMode
                        ? " - " + window.dayjs().add(1, "month").format(options.format)
                        : "";

                    el.value = date;
                }

                let picker = null;
                try {
                    // Modern @easepick/bundle API - create is a class constructor
                    if (typeof EB.create === 'function') {
                        picker = new EB.create(options);
                    } else if (EB.easepick && typeof EB.easepick.create === 'function') {
                        picker = new EB.easepick.create(options);
                    } else if (typeof EB.DateTimePicker === 'function') {
                        picker = new EB.DateTimePicker(options);
                    } else if (EB.default && typeof EB.default === 'function') {
                        picker = new EB.default(options);
                    } else {
                        console.warn('Easepick API not found on window.EasepickBundle');
                        return false;
                    }
                } catch (e) {
                    console.error('Easepick init failed:', e);
                    return false;
                }

                // Store instance for later hooks
                el._easepick = picker;

                // Ensure the picker container is attached to the DOM
                if (picker.ui && picker.ui.container && !picker.ui.container.parentElement) {
                    document.body.appendChild(picker.ui.container);
                }

                // Force remove readonly to ensure input is clickable
                el.removeAttribute('readonly');
                el.readOnly = false;

                // The picker already shows on click by default, but we can trigger it manually if needed
                const openPicker = (e) => {
                    if (picker && typeof picker.show === 'function') {
                        picker.show();
                    }
                };
                
                el.addEventListener('click', openPicker, false);
                
                return true;
            }
            return false;
        };

        // Try to initialize immediately
        if (!safeEasepick()) {
            // If not available, poll for it
            let attempts = 0;
            const maxAttempts = 50; // 5 seconds max
            
            const pollForEasepick = () => {
                attempts++;
                if (safeEasepick()) {
                    return;
                }
                
                if (attempts < maxAttempts) {
                    setTimeout(pollForEasepick, 100);
                } else {
                    console.warn('Easepick could not be initialized after 5 seconds');
                }
            };
            
            pollForEasepick();
        }
    });
});
