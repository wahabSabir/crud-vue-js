<template>
    <h1 class="text-xl">Edit Contact</h1>
    <!-- Edit Contact Form -->
    <div class="flex flex-col space-y-3 mt-2">
       <div>
           <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
               Name
           </label>
           <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="items.name" id="name" type="text" placeholder="Enter Name" />
           <span class="text-red-500" v-if="errors.length > 0 && errors[0].name !== undefined">{{ errors[0].name[0] }}</span>
       </div>
       <div>
           <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
               Email
           </label>
           <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="items.email" id="email" type="email" placeholder="Enter Email" />
           <span class="text-red-500" v-if="errors.length > 0 && errors[0].email !== undefined">{{ errors[0].email[0] }}</span>
       </div>
       <div>
           <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
               Phone
           </label>
           <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="items.phone" id="phone" type="text" placeholder="Enter Phone" />
           <span class="text-red-500" v-if="errors.length > 0 && errors[0].phone !== undefined">{{ errors[0].phone[0] }}</span>
       </div>
       <div>
           <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
               Address
           </label>
           <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="address" v-model="items.address" type="text" placeholder="Enter Address" />
           <span class="text-red-500" v-if="errors.length > 0 && errors[0].address !== undefined">{{ errors[0].address[0] }}</span>
       </div>
       <div class="flex justify-end">
           <button @click="update(items.id)" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
               Save
           </button>
           <router-link :to="{name: 'home'}" class="px-4 py-2 ml-2 font-bold text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">Cancel</router-link>
       </div>
   </div>
</template>

<script setup>
import { reactive, onMounted } from 'vue';
import { useRoute, useRouter } from "vue-router";

let errors = reactive([]);
let router = new useRouter();
let route = new useRoute();

const initialFormValue = {
     name : '',
     email : '',
     address : '',
     phone : '',
};

let items = reactive({ ...initialFormValue });

onMounted(()=>{
    editContact(route.params.id);
});

function editContact(id) {
     axios.get(`/api/contacts/${id}`)
        .then(res => {
            Object.assign(items, res.data);
        })
        .catch(function (e) {
            console.log(e);
        });
};

function update(id) {
     axios.put(`/api/contacts/${id}`, items)
        .then(res => {
            router.push({path: '/'});
        }).catch(function (e) {
            if (e.response.status === 422) {
                errors.push(e.response.data.errors);
            } else {
                console.log(e);
            }
        });
};
</script>
