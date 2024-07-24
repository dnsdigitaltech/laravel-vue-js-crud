<template>
    <div>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <el-page-header @back="goBack" :content="`Estudante - ${scope}`">
                </el-page-header>
            </div>
            <div>
                <el-form :model="model" :rules="rules" ref="studentForm">
                    <el-row :gutter="10">
                        <el-form-item label="Nome" required prop="name">
                            <el-input v-model="model.name" :readonly="readOnlyFields" placeholder="Nome do estudante"></el-input>
                        </el-form-item>

                        <el-form-item label="Classe" required prop="class">
                            <el-input v-model="model.class" :readonly="readOnlyFields" placeholder="Nome da classe"></el-input>
                        </el-form-item>

                        <el-form-item label="Sessão" required prop="section">
                            <el-input v-model="model.section" :readonly="readOnlyFields" placeholder="Nome da sessão"></el-input>
                        </el-form-item>

                        <el-form-item label="E-mail" required prop="email">
                            <el-input v-model="model.email" :readonly="readOnlyFields" placeholder="E-mail"></el-input>
                        </el-form-item>

                    </el-row>
                    <el-row :gutter="10" v-if="scope != 'Ver'">
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
            scope: String,
            id: Number
        },
        mounted() {

            switch (this.scope){
                case 'Ver':
                case 'Editar':
                    axios.get(`/fetch-student-showbyid/${this.id}`).then(res=>{
                        this.$set(this,'model', res.data.data)
                    });
                    break
                default:
                    break
            }

        },
        computed: {
            readOnlyFields() {
                return (this.scope == 'Ver' ? true : false )
            }
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
                window.location.href = "/estudantes"
            },
            saveForm(formName) {
                this.$refs[formName].validate( (valid) => {
                    if(valid){
                        switch(this.scope) {
                            case 'Criar':
                                this.$store.dispatch('saveStudent', this.model)
                                break

                            case 'Editar':
                                this.$store.dispatch('updateStudent', {id:this.id, model:this.model})
                                break

                            default:
                                break

                        }
                        
                    }
                })
            }
        }
    }
</script>
