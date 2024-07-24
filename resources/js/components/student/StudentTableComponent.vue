<template>
    <div>
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                Dados dos Estudantes <el-button type="default" class="float-right" @click="create">Add estudante</el-button>
            </div>
            <div>
                <el-table
                    :data="tableData"
                    :type="true"
                    :border="true"
                    height="400"
                    style="width: 100%"> 
                    <el-table-column 
                        v-for="(column) in tableColumns"
                        :key="column.label"
                        :label="column.label"
                        :prop="column.prop"
                        :column-key="column.prop"
                        :min-width="column.minWidth"
                        :sortable="column.sortable"
                        :align="column.align"
                        :header-align="column.align"
                        :fixed="column.fixed || null"
                        :formatter="column.formatter || null"
                        >

                    </el-table-column>      
                    <el-table-column min-width="110">             
                        <template slot="header" slot-scope="scope">
                            <el-input
                            v-model="searchQuery"
                            size="mini"
                            placeholder="Type to search"/>
                        </template>
                        <template slot-scope="scope">
                            <el-button
                            size="mini"
                            type="success" icon="el-icon-edit"
                            @click="editData(scope.$index, scope.row)"></el-button>
                            <el-button
                            size="mini"
                            type="info" icon="el-icon-view" 
                            @click="showData(scope.$index, scope.row)"></el-button>
                            <el-button
                            size="mini"
                            type="danger" icon="el-icon-delete"
                            @click="handleDelete(scope.$index, scope.row)" ></el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </div>
        </el-card>        
    </div>
</template>
<script>
import { mapGetters } from 'vuex';

    export default {
        name: 'student-table-component',
        mounted() {
            const loading = this.$loading({
                lock: true,
                text: 'Carregando Estudantes...',
                spinner: 'el-icon-loading',
                background: 'rgba(255,255,255,0,85)'
            });

            this.$store.dispatch('getStudents')
            loading.close()
        },
        computed: {
            ...mapGetters({
                tableData: "tableData"
            })
        },
        data() {
            return {
                searchQuery:null,
                tableColumns: [
                    {
                        prop: "id",
                        label: "ID",
                        minWidth: 40,
                        sortable: false,
                        hidden: false,
                        align: "center",
                        fixed: true
                    },
                    {
                        prop: "name",
                        label: "Nome",
                        minWidth: 150,
                        sortable: false,
                        hidden: false,
                        align: "center",
                        fixed: true
                    },
                    {
                        prop: "class",
                        label: "Classe",
                        minWidth: 80,
                        sortable: false,
                        hidden: false,
                        align: "center",
                        fixed: true
                    },
                    {
                        prop: "section",
                        label: "Sessão",
                        minWidth: 80,
                        sortable: false,
                        hidden: false,
                        align: "center",
                        fixed: true
                    },
                    {
                        prop: "email",
                        label: "E-mail",
                        minWidth: 150,
                        sortable: false,
                        hidden: false,
                        align: "center",
                        fixed: true
                    }
                ]
            }
        },
        methods: {
            create() {
                window.location.href = "/add-estudante"
            },
            showData(index, row) {
                window.location.href = `/ver-estudante/${row.id}`
            },
            editData(index, row) {
                window.location.href = `/edit-studant/${row.id}/edit`
            }
        }
    }
</script>