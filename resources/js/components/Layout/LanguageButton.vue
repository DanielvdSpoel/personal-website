<template>
    <div class="pointer-events-auto">
        <button type="button" aria-label="Toggle language" @click="toggleLanguage"
                class="group rounded-full bg-white/90 px-3 py-2.5 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur transition dark:bg-zinc-800/90 dark:ring-white/10 dark:hover:ring-white/20">
            <img v-if="currentLanguage === 'nl'" src="/img/nl.svg" alt="The flag of The Netherlands" class="h-5">
            <img v-if="currentLanguage === 'en'" src="/img/gb.svg" alt="The flag of Great Britain" class="h-5">
        </button>
    </div>

</template>

<script>

export default {
    name: "LanguageButton",
    methods: {
        toggleLanguage() {
            const language = this.currentLanguage === 'nl' ? 'en' : 'nl';
            this.$i18n.locale = language;
            this.$inertia.visit(route(route().current(), {language: language}));
        }
    },
    computed: {
        currentLanguage() {
            return this.$page.props.language;
        }
    }
}
</script>

<style scoped>

</style>
