<template>
    <div v-if="show" id="popup-modal" tabindex="-1" class="fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full overflow-y-auto overflow-x-hidden bg-gray-900 bg-opacity-50 flex">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow p-2">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="model-header">
                        Update Request
                    </h3>
                    <button @click="close" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form class="p-4 md:p-5" @submit.prevent="updateRequest">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="location" class="block mb-2 text-sm font-bold">Location</label>
                            <select ref="location" v-model="updateRequestData.location" id="location" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select location</option>
                                <option value="F103-Bed">F103-Bed</option>
                                <option value="F104-Bed">F104-Bed</option>
                                <option value="F105-Bed">F105-Bed</option>
                                <option value="F106-Bed">F106-Bed</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="department" class="block mb-2 text-sm font-bold">Department</label>
                            <select ref="department" v-model="updateRequestData.department" id="department" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select department</option>
                                <option value="Patient Experience">Patient Experience</option>
                                <option value="Operaration">Operaration</option>
                                <option value="X-Ray">X-Ray</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="requested_by" class="block mb-2 text-sm font-bold">Requested By</label>
                            <select ref="requested_by" v-model="updateRequestData.requested_by" id="requested_by" name="requested_by" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select</option>
                                <option value="Hasan Ali">Hasan Ali</option>
                                <option value="Miles Cremin">Miles Cremin</option>
                                <option value="Mohammed">Mohammed</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="assigned_by" class="block mb-2 text-sm font-bold">Assigned To</label>
                            <select ref="assigned_by" v-model="updateRequestData.assigned_by" id="assigned_by" name="assigned_by" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select</option>
                                <option value="Hasan Ali">Hasan Ali</option>
                                <option value="Miles Cremin">Miles Cremin</option>
                                <option value="Mohammed">Mohammed</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="status" class="block mb-2 text-sm font-bold">Status</label>
                            <select ref="status" v-model="updateRequestData.status" id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select status</option>
                                <option value="new">New</option>
                                <option value="in progress">In Progress</option>
                                <option value="on hold">On Hold</option>
                                <option value="rejected">Rejected</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="priority" class="block mb-2 text-sm font-bold">Priority</label>
                            <select ref="priority" v-model="updateRequestData.priority" id="priority" name="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Select</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="service" class="block mb-2 text-sm font-bold">Service</label>
                            <input ref="service" type="text" v-model="updateRequestData.service" id="service" name="service" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
                        </div>
                    </div>
                    <div class="flex justify-end"> <!-- Flex container to align items to the right -->
                        <button @click="close" type="button" class="text-white font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center model-cancel-btn"><span class="model-cancel-text">Cancel</span></button>
                        <button type="submit" class="text-white font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center model-submit-btn">
                            <span class="model-submit-text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        show: Boolean,
        model_name:String,
        message: String,
        updateRequestData: Object
    },
    data() {
        return {
            formData: {
                location: '',
                department: '',
                requested_by: '',
                assigned_by: '',
                status: '',
                priority: '',
                service: ''
            }
        };
    },

    methods: {
        close() {
            this.$emit('close');
        },
        updateRequest() {
            // Emit an event with formData to updateThisRequest method in parent component
            this.formData.location = this.$refs.location.value;
            this.formData.department = this.$refs.department.value;
            this.formData.requested_by = this.$refs.requested_by.value;
            this.formData.assigned_by = this.$refs.assigned_by.value;
            this.formData.status = this.$refs.status.value;
            this.formData.priority = this.$refs.priority.value;
            this.formData.service = this.$refs.service.value;

            this.$emit('confirm',this.formData);
        }
    },
    watch: {
    'updateRequestData.status': function(newVal) {
      this.updateRequestData.status = newVal.toLowerCase();
    },
    'updateRequestData.priority': function(newVal) {
      this.updateRequestData.priority = newVal.toLowerCase();
    }
  },
};
</script>

<style scoped>
/* Add your custom styles here */
</style>
