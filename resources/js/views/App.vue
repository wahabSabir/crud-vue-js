<template>
    <Navbar />
    <div class="container px-10 mx-auto py-10">
        <router-view></router-view>
    </div>

    <!-- <div> -->
        <!-- <ContactForm /> -->
        <!-- <Navbar /> -->
    <!-- </div> -->

</template>


<script>
// import Navbar from './components/Navbar.vue';
// import ContactForm from './components/ContactForm.vue';
import Navbar from '../components/Navbar.vue';

export default {
    components: {
        // ContactForm,
        Navbar,
    }
}
</script>

