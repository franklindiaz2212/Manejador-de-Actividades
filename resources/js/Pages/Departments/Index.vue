<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/InputError.vue';
import Paginator from '@/Components/Paginator.vue';
import TexInput from '@/Components/InputError.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Swal from 'sweetalert2';
import { Head,Link,useForm } from '@inertiajs/vue3';
import { nextTick,ref,watch} from 'vue';
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'
import {Inertia} from '@inertiajs/inertia';






const operation = ref(1);
const id = ref('');




const props = defineProps({
    departments: {
        type:Object,
     

        
       
    }
}); 
const form = useForm({
   
     name:'',
    tarea: '',
    asignacion: '',
    entrega: '',
});
const formPage = useForm({});

 const onPageClick = (event)=>{
    formPage.get(route('departments.index',{page:event}));
   
  
}

const submit = () => {
     Inertia.get(route('departments.index',this.form))
  
 }




const deleteDepartment = (id,name) =>{
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({ 
        title:'Esta seguro que desea eliminar la actividad  .' +name+ '?',
        icon:'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Yes,delete',
        cancelButtonText:'<i class="fa-solid fa-check"></i> Cancel'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('departments.destroy',id)),{
                onSuccess: () => {
                    ok('Deleted');
                }
            }
        }  
    });
       
        
}


</script>

<template>

    
    <Head title="Atividades" />



                   

    <AuthenticatedLayout>
       
        
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">Actividades</h2>
        </template>

  
<form method="get" class="max-w- mx-auto" @submit.prevent="submit">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input v-model="form.name"  type="search" id="default-search" class="block w-full p-4 ps-8 text-sm text-gray-500 border border-gray-800 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar ..." required />
        <button type="submit" class="'text-white absolute end-2.5 bottom-2.5 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'">Search</button>
    </div>
</form> 


    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   <h1 class=" text-white leading-tight">#</h1>
                </th>
               
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Nombre</h1>    
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Tarea</h1>
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Fecha de asignacion</h1>
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Fecha de entrega</h1>
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Crear</h1>
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Editar</h1>
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class=" text-white leading-tight">Eliminar</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="dep, i in departments.data" :key="dep.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ i+1 }}
                </th>
                <td class="px-4 py-4">
                    {{ dep.name }}
                </td>
                <td class="px-2 py-4">
                    {{ dep.tarea }}
                </td>
                <td class="px-1 py-4">
                    {{ dep.asignacion }}
                </td>
                <td class="px-1 py-4">
                    {{ dep.entrega }}
                </td>
                <td class="px-1 py-4">
                    <Link :href="route('departments.create')"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                 <i class="fa-solid fa-plus"></i>    
                   </Link>

                    
                </td>
                <td class="px-1 py-4">
                    <Link :href="route('departments.edit',dep.id)"
                    :class="'text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2' ">
                     <i class="fa-solid fa-edit"></i>     
                   </Link>

                    
                </td>  <td class="px-1 py-4">
                    <DangerButton @click="$event => deleteDepartment(dep.id,dep.name)">
                        <i class="fa-solid fa-trash"></i>
                    </DangerButton>

                    
                </td>
          
            </tr>
        </tbody>
    </table>


           
                    <div class="bg-gray-600 grid v-scree place-items-center">
                          <VueTailwindPagination 
                          :current="departments.currentPage"
                          :total="departments.total"
                          :per-page="departments.perPage"
                          @page-changed="$event => onPageClick($event)"
                            >

                          </VueTailwindPagination>
                    </div>
         
        
    </AuthenticatedLayout>
</template>
