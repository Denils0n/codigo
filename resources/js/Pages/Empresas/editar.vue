<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {  Head, useForm} from "@inertiajs/vue3";

const dado = defineProps({

    empresas:{
        type:Object,
        required: true
    }


})



const createForm = useForm({


    nome: "",
    cnpj: ""


})

const update = (empresas) => {

    createForm.put(


        route('empresa.update', empresas)

    )


}






</script>


<template>
    <Head title="empresas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">empresass</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Editando

                        <div>

                            {{ empresas }}



                            <form @submit.prevent="update(empresas.id)">



                                <input type="text" v-model="createForm.nome">
                                <input type="text" v-model="createForm.cnpj">
                                <button>salvar</button>

                            </form>



                        </div>


                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

