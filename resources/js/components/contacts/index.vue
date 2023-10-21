<template>
    <!-- ====== Table Section Start -->
    <section class="bg-white py-20">
        <div class="container">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl">All Contacts</h1>
                <!-- <a href="/" class="bg-blue-800 p-2 rounded-md text-white"></a> -->
                <router-link :to="{name: 'contacts.create'}" class="bg-blue-500 p-2 text-white rounded-lg">Add New Contact</router-link>
            </div>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="max-w-full overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-blue-500 text-center">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-2 px-3 lg:px-4 border-l border-transparent">
                                 Name
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-2 px-3 lg:px-4 border-l border-transparent">
                                 Email
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-2 px-3 lg:px-4 border-l border-transparent">
                                 Address
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-2 px-3 lg:px-4 border-l border-transparent">
                                 Phone
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-2 px-3 lg:px-4 border-l border-transparent">
                                 Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody v-if="data.length > 0">
                            <tr v-for="item in data" :key="item.id">
                                <td class="text-center text-dark font-medium text-base py-2 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                 {{ item.name }}
                                </td>
                                <td class="text-center text-dark font-medium text-base py-2 px-2 bg-white border-b border-[#E8E8E8] ">
                                  {{ item.email }}
                                </td>
                                <td class="text-center text-dark font-medium text-base py-2 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                  {{ item.address }}
                                </td>
                                <td class="text-center text-dark font-medium text-base py-2 px-2 bg-white border-b border-[#E8E8E8] ">
                                  {{ item.phone }}
                                </td>
                                <td class="text-center text-dark font-medium text-base py-2 px-2 bg-white border-b border-[#E8E8E8] ">
                                   <router-link :to="{path : `/contacts/edit/${item.id}`}" class="text-blue-500 mr-2">Edit</router-link>
                                   <button @click="deleteContact(item.id)" class="text-red-500">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="5" class="text-center text-red-500 font-medium text-base py-2 px-2 bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">No record Found!</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Table Section End -->
</template>

<script setup>
import { reactive, onMounted } from "vue"
let data = reactive([]);

onMounted(()=>{
    getAllContacts();
});

function getAllContacts() {
    data.length = 0;
    axios.get('/api/contacts')
         .then(res => {
            Object.assign(data, res.data);
         });
}

function deleteContact(contact) {
    axios.delete(`api/contacts/${contact}`)
        .then(res => {
            getAllContacts()
        })
        .catch(function (e) {
            console.log(e);
        });
}
</script>
