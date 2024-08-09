/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
// import { createApp } from 'vue';
import '../css/app.css';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import AdminLayout from "./Layouts/AdminLayout.vue";
import AppLayout from "./Layouts/AppLayout.vue";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import Toast from "vue-toastification";



import { Ziggy } from './ziggy.js';
import { route } from '../../vendor/tightenco/ziggy';
createInertiaApp({
    resolve: async name => {
        const pageComponent = await resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
        const page = pageComponent.default;

        console.log(name);

        let layout = null;

        if (name.toLocaleLowerCase().startsWith('admin/')) {
            layout = AdminLayout;
        } else if (name.toLocaleLowerCase().startsWith('frontend/')) {
            layout = AppLayout;
        } else {
            layout = null;
        }

        // Assignez le layout si la page n'a pas de layout défini
        page.layout = page.layout !== undefined ? page.layout : layout;

        return pageComponent;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .use(Toast)
        .use(Ziggy)
        .mixin({ methods: { route } })
        .component('Link', Link)
        .component('Head', Head)
        .mixin({ methods: { route } })
      .use(Ziggy)
      .mount(el)
  },
})
