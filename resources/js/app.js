require('./bootstrap');
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createI18n } from 'vue-i18n'

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        const messages = JSON.parse(props.initialPage.props.translations);
        const i18n = createI18n({
            locale: props.initialPage.props.language,
            fallbackLocale: 'en',
            globalInjection: true,
            messages,
        })

        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .mixin({ methods: { route } })
            .mount(el)
    },
})
