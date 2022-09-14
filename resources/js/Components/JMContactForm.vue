<template>
    <app-layout title="Edit Photo">
        <template #header>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form  @submit.prevent="form.post(route('admin.photos.update', photo.id))">

                    <button  type="submit" class="primary" >
                        Send Info
                    </button>
                </form>
            </div>
        </div>
    </app-layout>
</template>
