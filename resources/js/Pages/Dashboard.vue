<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Pagination from "@/Components/Pagination.vue";
import { ref, watch, computed } from "vue";
import { Link, router, useForm, usePage } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Request" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <h1 class="font-semibold text-3xl text-gray-800 leading-tight">Requests</h1>
                    <button class="ml-10 px-4 py-2 bg-blue-500 text-white rounded add-new-btn ">+ New Request</button>
                </div>

                <div class="flex items-center space-x-2">
                    <div class="w-4 h-4 rounded-full info-circle circle1 flex flex-col items-center justify-center">
                        <span class="info-count text-xl">10</span>
                        <span class="info-desc text-xs mt-1">New Requests</span>
                    </div>
                    <div class="w-4 h-4 rounded-full info-circle circle2 flex flex-col items-center justify-center">
                        <span class="info-count text-xl">05</span>
                        <span class="info-desc text-xs mt-1">Delayed Requests</span>
                    </div>
                    <div class="w-4 h-4 rounded-full info-circle circle3 flex flex-col items-center justify-center">
                        <span class="info-count text-xl">02</span>
                        <span class="info-desc text-xs mt-1">Escalted Requests</span>
                    </div>
                    <div class="w-4 h-4 rounded-full info-circle circle4 flex flex-col items-center justify-center">
                        <span class="info-count text-xl">00</span>
                        <span class="info-desc text-xs mt-1">On Hold Requests</span>
                    </div>
                </div>
            </div>
        </template>

        <div class="bg-gray-100">
            <div class="mx-auto max-w-7xl">
                <div class="">
                    <div class="flex flex-col justify-between sm:flex-row mt-6">
                        <div class="relative text-sm text-gray-800 col-span-3">
                            <input
                                type="text"
                                v-model="searchTerm"
                                placeholder="Search students data..."
                                id="search"
                                class="block rounded-lg border-0 py-2 pl-10 text-gray-900 ring-1 ring-inset ring-gray-200 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div class="mt-4 flex flex-col">
                        <div
                            class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8"
                        >
                            <div
                                class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                            >
                                <div
                                    class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg relative"
                                >
                                    <table
                                        class="min-w-full divide-y divide-gray-300"
                                    >
                                        <thead class="table-heading">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm sm:pl-6 table-heading"
                                                >
                                                    SL No
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm sm:pl-6 table-heading"
                                                >
                                                    Request ID
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm sm:pl-6 table-heading"
                                                >
                                                    Created on
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Location
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Service
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Status
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Department
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Requested by
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Assigned To
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm table-heading"
                                                >
                                                    Priority
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="relative py-3.5 pl-3 pr-4 sm:pr-6"
                                                />
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="divide-y divide-gray-200 bg-white"
                                            v-for = "request in requests "
                                            :key="request.id"
                                        >
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-6"
                                                >
                                                1
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-6"
                                                >
                                                {{request.id}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.created_on}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.location}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.service}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.status}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.department}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.assigned_by}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.requested_by}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-3 py-4 text-sm "
                                                >
                                                {{request.priority}}
                                                </td>

                                                <td
                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6"
                                                >
                                                    <button
                                                        class="ml-2 text-indigo-600 hover:text-indigo-900"
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

import axios from 'axios';

export default{
        name:'Request List',
        data(){
            return {
                requests:Array
            }
        },
        created(){
            this.getRequests();
        },
        methods:{
            async getRequests(){
                let url = 'http://127.0.0.1:8000/api/request?page=2';
                await axios.get(url).then(response =>{
                    this.requests = response.data.data;
                    console.log(this.requests);
                }).catch(error=>{
                    console.log(error)
                });
            }
        }
    }

</script>
