
<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    //import JMContactForm from '@/Components/JMContactForm.vue';
    import JMContact from '@/Components/JMContactForm.vue';
    </script>
    
    <template>
        <AppLayout title="JMForm">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    JMContact v3
                </h2>
            </template>
    
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <JMContact/>
                    </div>
                </div>
            </div>
        </AppLayout>
    </template>

 