import './bootstrap';
import { createApp, h } from 'vue'; // Or import React from 'react';
import { createInertiaApp } from '@inertiajs/vue3'; // Or @inertiajs/react

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true }); // or .jsx for react
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});