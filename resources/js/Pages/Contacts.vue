<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Contact
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"
                >
                    <div v-if="flash && flash.message"
                        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert"
                    >
                        <div class="flex">
                            <div>
                                <p
                                    v-if="flash && flash.message"
                                    class="text-sm"
                                >
                                    {{ flash.message }}
                                </p>                               
                            </div>
                        </div>
                    </div>
                    <button
                        @click="openModal()"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3"
                    >
                        Create New Contact
                    </button>
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Phone</th>
                                <th class="px-4 py-2">Comment</th>
                                <th class="px-4 py-2">Reg. Date</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in data">
                                <td class="border px-4 py-2">{{ row.id }}</td>
                                <td class="border px-4 py-2">
                                    {{ row.name }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.email }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.phone }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.comments }}
                                </td>
                                <td class="border px-4 py-2">
                                    {{ row.created_at }}
                                </td>
                                <td class="border px-4 py-2">
                                    <button
                                        @click="edit(row)"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        @click="deleteRow(row)"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div
                        class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400"
                        v-if="isOpen"
                    >
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                        >
                            <div class="fixed inset-0 transition-opacity">
                                <div
                                    class="absolute inset-0 bg-gray-500 opacity-75"
                                ></div>
                            </div>
                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span
                                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            ></span
                            >???
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                role="dialog"
                                aria-modal="true"
                                aria-labelledby="modal-headline"
                            >
                                <form  @submit.prevent="submit">
                                    <div
                                        class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                                    >
                                        <div class="">
                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Name:</label
                                                >
                                                <input
                                                    type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter Name"
                                                    v-model="form.name"
                                                />
                                                <div
                                                    v-if="
                                                        errors &&
                                                        errors.name
                                                    "
                                                    class="text-red-500"
                                                >
                                                    {{ errors.name }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Phone:</label
                                                >
                                                <input
                                                    type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter Phone"
                                                    v-model="form.phone"
                                                />
                                                <div
                                                    v-if="
                                                        errors &&
                                                        errors.phone
                                                    "
                                                    class="text-red-500"
                                                >
                                                    {{ errors.phone }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput1"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Email:</label
                                                >
                                                <input
                                                    type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput1"
                                                    placeholder="Enter Email"
                                                    v-model="form.email"
                                                />
                                                <div
                                                    v-if="
                                                        errors &&
                                                        errors.email
                                                    "
                                                    class="text-red-500"
                                                >
                                                    {{ errors.email }}
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="exampleFormControlInput2"
                                                    class="block text-gray-700 text-sm font-bold mb-2"
                                                    >Comment:</label
                                                >
                                                <textarea
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="exampleFormControlInput2"
                                                    v-model="form.comments"
                                                    placeholder="Enter Comment"
                                                ></textarea>
                                                <div
                                                    v-if="
                                                        errors &&
                                                        errors.comments
                                                    "
                                                    class="text-red-500"
                                                >
                                                    {{ errors.comments }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                                    >
                                        <span
                                            class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                                        >
                                            <button
                                                :disabled="form.processing"
                                                wire:click.prevent="store()"
                                                type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                                v-show="!editMode"
                                                @click="save(form)"
                                            >
                                                Save
                                            </button>
                                        </span>
                                        <span
                                            class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto"
                                        >
                                            <button
                                                :disabled="form.processing"
                                                wire:click.prevent="store()"
                                                type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                                v-show="editMode"
                                                @click="update(form)"
                                            >
                                                Update
                                            </button>
                                        </span>
                                        <span
                                            class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto"
                                        >
                                            <button
                                                @click="closeModal()"
                                                type="button"
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            >
                                                Cancel
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";

export default {
    components: {
        AppLayout,
        Welcome,
    },
    props: ["data", "errors", "flash"],
    data() {
        return {            
            editMode: false,
            isOpen: false,
            form: {
                name: null,
                email: null,
                phone: null,
                comments: null,
            },
        };
    },

    mounted() {
        console.log("page", this.$page);
    },

    methods: {
        openModal: function () {
            this.isOpen = true;
            this.form.errors = {};
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        reset: function () {
            this.form = {
                name: null,
                email: null,
                phone: null,
                comments: null,
            };
        },
        save: function (data) {

            this.$inertia.post("/contact", data);

            if (this.errors != null && this.errors.length > 0) {
                this.reset();
                this.closeModal();
                this.editMode = false;
            }
        },
        edit: function (data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function (data) {
            data._method = "PUT";
            this.$inertia.post("/contact/" + data.id, data);
            this.reset();
            this.closeModal();
        },
        deleteRow: function (data) {
            if (!confirm("Are you sure want to remove?")) return;
            data._method = "DELETE";
            this.$inertia.post("/contact/" + data.id, data);
            this.reset();
            this.closeModal();
        },
    },
};
</script>
