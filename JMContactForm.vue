<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <v-card flat>
        <v-card-text>
            <v-form ref="formLeaseholder" lazy-validation>
                <v-layout row wrap class="pa-3">
                    <v-flex xs12 md4>
                        <v-text-field
                            v-model="leaseholder.fullName"
                            placeholder="Nombre Completo"
                            :disabled="!enableActions"
                            :rules="ruleRequired"
                            dense
                        ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md2>
                        <v-select
                            dense
                            autocomplete
                            :disabled="!enableActions"
                            placeholder="Tipo documento"
                            :rules="ruleRequired"
                            clearable
                            item-text="nombre"
                            item-value="id"
                            :items="listTypeDocuments"
                            v-model="leaseholder.typeDocument"
                            required
                        ></v-select>
                    </v-flex>

                    <v-flex xs12 md3>
                        <v-text-field
                            dense
                            v-model="leaseholder.numberDocument"
                            placeholder="No. de documento"
                            :rules="ruleRequired"
                            :disabled="!enableActions"
                            required
                        ></v-text-field>
                    </v-flex>

                    <v-flex xs12 md3>
                        <v-text-field
                            v-model="leaseholder.documentExpedition"
                            label="Fecha de expedición (YYYY-MM-DD)"
                            prepend-icon="event"
                            :rules="ruleDate"
                            hint="YYYY-MM-DD"
                            :disabled="!enableActions"
                            clearable
                            dense
                        ></v-text-field>
                    </v-flex>
                </v-layout>
            </v-form>
        </v-card-text>
    </v-card>
</template>
