<template>
<div>
    <!-- Things we do optional api / test component -->
    <p>{{ counter }}</p>
    {{ doubleCounter }}
    <button @click="increment">Add</button>
</div>
</template>

<script>
import {
    watch
} from 'vue';
export default {
    // 4 things we can do in optional Api
    // Data
    data() {
        return {
            counter: 0,
        }
    },

    // Hooks
    // mounted()
    // Created()

    // Methods
    methods: {
        increment() {
            this.counter++;
        }
    },

    // computed properties handling our complex logic for concern local data work as a getter
    computed: {
        doubleCounter() {
            return this.counter * 2;
        }
    },

    // watcher are useful when you want to do add check against particular data watcher function has same name of your local variable name
    // against which you want to add check
    watch: {
       counter(oldVal, newVal) {
          console.log('old value: ' + oldVal);
          console.log('New value: ' + newVal);

          if (newVal === 5) {
             this.counter = 0;
          }
       }
    }

}
</script>
