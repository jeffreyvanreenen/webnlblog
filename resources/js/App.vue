<template>
    <div class="mx-auto w-full">
        <div class="flex flex-col justify-start w-full h-screen">

            <router-view v-slot="{ Component }">
                    <component :is="Component" />
            </router-view>
        </div>
    </div>
</template>

<style>

</style>

