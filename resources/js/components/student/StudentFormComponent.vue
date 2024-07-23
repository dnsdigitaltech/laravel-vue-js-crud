<template>
    <div>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <el-page-header @back="goBack" :content="`Categoria - ${scope}`">
                </el-page-header>
            </div>
            <div>
                <el-form :model="model" :rules="rules" ref="studentForm">
                    <el-row :gutter="10">
                        <el-form-item label="Nome" required prop="name">
                            <el-input v-model="model.name" aria-placeholder="Nome do estudante"></el-input>
                        </el-form-item>

                        <el-form-item label="Classe" required prop="class">
                            <el-input v-model="model.class" aria-placeholder="Nome da classe"></el-input>
                        </el-form-item>

                        <el-form-item label="Sessão" required prop="section">
                            <el-input v-model="model.section" aria-placeholder="Nome da sessão"></el-input>
                        </el-form-item>

                        <el-form-item label="E-mail" required prop="email">
                            <el-input v-model="model.email" aria-placeholder="E-mail"></el-input>
                        </el-form-item>

                    </el-row>
                    <el-row :gutter="10">
                        <el-form-item>
                            <el-button type="success" @click="saveForm(`studentForm`)">Salvar estudante</el-button>
                        </el-form-item>
                    </el-row>
                </el-form>
            </div>
        </el-card>        
    </div>
</template>

<script>
    export default {
        name: 'student-form-component',
        props: {
            scope: String
        },
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                model: {
                    name: null,
                    class: null,
                    section: null,
                    email: null
                },
                rules: {

                }
            }
        },
        methods: {
            goBack() {
                window.location.href = "/students"
            },
            saveForm(formName) {
                this.$refs[formName].validate( (valid) => {
                    if(valid){
                        this.$store.dispatch('saveStudent', this.model)
                    }
                })
            }
        }
    }
</script>
