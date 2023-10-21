<template>
        <h1 class="text-xl">All Blogs {{ profile }}</h1>
</template>


<script>
import { useRoute } from 'vue-router';
export default {
    data() {
        return {
            profile:''
        }
    },
    mounted() {
        const route = useRoute();
        this.profile = route.params.name
    }
}
</script>
