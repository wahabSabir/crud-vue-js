<template>
<section>
    <h2 class="text-center text-xl font-bold underline">Vue Crud App With Laravel</h2>
    <div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                Name
            </label>
            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="item.name" id="name" type="text" placeholder="Enter Name" />
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                Email
            </label>
            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="item.email" id="email" type="email" placeholder="Enter Email" />
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                Phone
            </label>
            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="item.phone" id="phone" type="text" placeholder="Enter Phone" />
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                Address
            </label>
            <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" v-model="item.address" id="address" type="text" placeholder="Enter Address" />
        </div>
        <button @click="saveContactForm" class="block w-full px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
            {{ isEditing ? 'Update' : 'Save' }}
        </button>
    </div>
    <div class="w-full mt-6" v-if="data.length > 0">
        <h3 class="text-center font-semibold py-10">All Contacts</h3>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data" :key="item.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ item.email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.address }}
                        </td>
                        <td class="px-6 py-4">
                            <button @click="editContact(item)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</button>
                            <button @click="deleteContact(item.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</section>
</template>

<script>
export default {
    name: "Employee",
    // Its our local state where we initialize our default value
    data() {
        return {
            data: [],
            item: {
                name: "",
                email: "",
                phone: "",
                address: "",
            },
            temp_id: null,
            isEditing: false,
        };
    },
    // use lifecycle hooks
    mounted() {
        this.fetchAllContact();
    },
    methods: {
        fetchAllContact() {
            axios.get('api/contacts')
                .then(res => this.data = res.data);
        },
        saveContactForm() {
            let method = axios.post;
            let url = 'api/contacts'

            if (this.isEditing) {
                method = axios.put;
                url = `api/contacts/${this.temp_id}`;
            }

            try {
                method(url, this.item).then((res) => {
                    this.fetchAllContact();
                    this.item = {
                            name : "",
                            email : "",
                            phone : "",
                            address : "",
                    };
                    this.temp_id = null;
                    this.isEditing = false;
                });
            } catch (error) {
                console.log(error);
            }
        },
        editContact(contact) {
            this.item = {
                    name: contact.name,
                    email: contact.email,
                    phone: contact.phone,
                    address: contact.address,
                },
                this.temp_id = contact.id;
            this.isEditing = true;
        },
        deleteContact(id) {
            try {
                axios.delete(`api/contacts/${id}`)
                    .then(res => this.fetchAllContact());
            } catch (error) {
                console.log(error);
            }
        }
    },
};
</script>
