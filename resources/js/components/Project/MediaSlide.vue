<template>
    <slide @click="isMediaModalOpen = true" :class="{'dark:hidden': media.pivot.theme_availability === 'white', 'hidden dark:block': media.pivot.theme_availability === 'dark'}">
        <img :src="media.url" :alt="media.alt" class="w-full h-full object-cover p-2 rounded-xl">
        <MediaModal :open="isMediaModalOpen" :media="media" @close="isMediaModalOpen = false"/>
    </slide>
</template>

<script>
import {Slide} from 'vue3-carousel'
import MediaModal from "../MediaModal.vue";

export default {
    name: "MediaSlide",
    components: {MediaModal, Slide},
    props: {
        media: Object,
    },
    data() {
        return {
            isMediaModalOpen: false,
        }
    },
}
</script>

<style scoped>

</style>
