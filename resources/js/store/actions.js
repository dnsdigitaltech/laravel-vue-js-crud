import Vue from 'vue'
import axios from 'axios'

let loader = null
function showLoader(text = 'loading'){
    loader = Vue.prototype.$loading({
        lock: true,
        text: text,
        spinner: 'el-icon-loading',
        background: 'rgba(255,255,255,0,85)'
    })
}

function hideLoader(){
    loader.close();
}

export const getStudents = ({ commit }, payload) => {
    let url = `/get-students`;
    axios.post(url, payload)
        .then( res => {
            commit('setTableData', res.data);
    })
};

export const saveStudent = ({ commit }, payload) => {
    let url = `/save-student`
    showLoader('Criando estudante')
    axios.post(url, payload).then( res => {
        Vue.prototype.$notify({
            title: 'success',
            message: 'Estudante criado com sucesso',
            type: 'success',
        });
        hideLoader()
        window.location.href = '/estudantes'
    })
}