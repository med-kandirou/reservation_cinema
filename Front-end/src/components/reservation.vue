<template>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" :src="image" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ nom_film }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Salle : {{ salle }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ date_res }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">N Place : {{ num_place }}</p>
            <button @click="$emit('delete_res', id_res)" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimer</button>
        </div>
    </div>

</template>


<script>
export default {
    props: {
        id_res: Number,
        nom_film: String,
        image: String,
        date_res: String,
        salle: String,
        num_place: Number,
    },
    emits: ["delete_res"]
}


</script>