<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {  Head, useForm} from "@inertiajs/vue3";

defineProps({

    empresas:{
        type:Object,
        required: true
    }


})

const createForm = useForm({


    nome: '',
    cnpj: ''


})


const add = () => {


    createForm.post(


    route('empresa.store'), {

        onFinish: () => {


        }


    })



}

const remove = (empresa) => {

    useForm({}).delete(
        route('empresa.destroy', empresa)


    )


}

const edit = (empresa) => {

    useForm({}).get(

        route('empresa.edit', empresa)

    )


}






</script>



<template>
    <Head title="Empresa" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Empresas</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Minhas categorias bonitinhas

                        <div v-for="empresa in empresas">

                            {{ empresa.nome }}
                            {{ empresa.cnpj }}
                            <a href="#" @click.provent="remove(empresa)" style="border: 1px solid black; ">Apagar</a>
                            <a href="#" @click.provent="edit(empresa)" style="border: 1px solid black;">Editar</a>

                        </div>

                        <form @submit.prevent="add">

                            <input type="text" v-model="createForm.nome">
                            <input type="text" v-model="createForm.cnpj">
                            <button>salvar</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
