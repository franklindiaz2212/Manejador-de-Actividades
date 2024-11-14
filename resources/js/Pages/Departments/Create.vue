<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

import TextInput from '@/Components/TextInput.vue';
import { Head,useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    tarea: '',
    asignacion: '',
    entrega: '',
});
</script>

<template>
    <Head title="Tarea" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crae Tarea</h2>
        </template>

        <div class=" py-12 bg-gray-800">
            <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="p-4 bg-gray-800  overflow-hidden shadow-sm sm:rounded-lg">

                      <form @submit.prevent="$event => form.post(route('departments.store'))"
                        class=" mt-6 space-y-6 max-w-xl">
                        <InputLabel for="name" value="" ><h1 class="text-gray-200">Nombre</h1></InputLabel>
                        <TextInput id="entrega" v-model="form.name" autofocus required 
                        type="text"
                        class="mt-1 block w-full"></TextInput>
                        <InputLabel for="name" value="" ><h1 class="text-gray-200">Tarea</h1></InputLabel>
                        <TextInput id="entrega" v-model="form.tarea" autofocus required 
                        type="text"
                        class="mt-1 block w-full"></TextInput> 
                        
                        <InputLabel for="name" value="" ></InputLabel>


                      
                        <div class="relative max-w-sm col-span-2">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 7a1 1 0 112-2h2a1 1 0 012 2v3a1 1 0 01-2 1H10a1 1 0 01-2-1V7zM6 4a2 2 0 012-2h2a2 2 0 110 4H8a2 2 0 01-2-2zM19 4a2 2 0 00-2-2h-2a2 2 0 100 4h2a2 2 0 002-2z" />
                              </svg>
                            </div>
                            <label for="card-expiration-input" class="sr-only">Card expiration date:</label>
                            <input type="date" id="entrega" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="form.asignacion" autofocus required  />
                          </div>
                        
                        <InputLabel for="name" value="Fecha de entrega" ></InputLabel>

                        <div class="relative max-w-sm col-span-2">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 7a1 1 0 112-2h2a1 1 0 012 2v3a1 1 0 01-2 1H10a1 1 0 01-2-1V7zM6 4a2 2 0 012-2h2a2 2 0 110 4H8a2 2 0 01-2-2zM19 4a2 2 0 00-2-2h-2a2 2 0 100 4h2a2 2 0 002-2z" />
                              </svg>
                            </div>
                            <label for="card-expiration-input" class="sr-only">Card expiration date:</label>
                            <input type="date" id="entrega" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  v-model="form.entrega" autofocus required  />
                          </div>
                        <InputError :message="form.errors.name" ></InputError>
                    <PrimaryButton :disabled="form.processing">
                        <i class="fa-solid fa-save"></i> Save
                    </PrimaryButton>
                        
                       
                      </form>

                      
                    

                   
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<style>



</style>
