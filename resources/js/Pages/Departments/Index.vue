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
import { nextTick,ref } from 'vue';
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'



const nameInput = ref(null);
const modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');


components :{
    
    
}



const props = defineProps({
    departments: {
        type:Object
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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Actividades</h2>
        </template>
       
                    



    
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   #
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Asignacion
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha de entrega
                </th>
                <th scope="col" class="px-6 py-3">
                    Crear
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="dep, i in departments.data" :key="dep.id" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ i+1 }}
                </th>
                <td class="px-6 py-4">
                    {{ dep.name }}
                </td>
                <td class="px-6 py-4">
                    {{ dep.asignacion }}
                </td>
                <td class="px-6 py-4">
                    {{ dep.entrega }}
                </td>
                <td class="px-6 py-4">
                    <Link :href="route('departments.create')"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                 <i class="fa-solid fa-plus"></i>    
                   </Link>

                    
                </td>
                <td class="px-6 py-4">
                    <Link :href="route('departments.edit',dep.id)"
                    :class="'text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2' ">
                     <i class="fa-solid fa-edit"></i>     
                   </Link>

                    
                </td>  <td class="px-6 py-4">
                    <DangerButton @click="$event => deleteDepartment(dep.id,dep.name)">
                        <i class="fa-solid fa-trash"></i>
                    </DangerButton>

                    
                </td>
          
            </tr>
        </tbody>
    </table>


           
                    <div class="bg-white grid v-scree place-items-center">
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
