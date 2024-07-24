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
            message: res.data.message,
            type: 'success',
        });
        hideLoader()
        window.location.href = '/estudantes'
    })
}

export const updateStudent = ({ commit }, payload) => {
    let url = `/update-student/${payload.id}`
    showLoader('Atualizando estudante')
    axios.put(url, payload.model).then( res => {
        Vue.prototype.$notify({
            title: 'success',
            message: res.data.message,
            type: 'success',
        });
        hideLoader()
        window.location.href = '/estudantes'
    })
}

export const deleteStudent = ({ commit }, payload) => {
    let url = `/delete-student/${payload.id}`
    showLoader('Removendo estudante')
    axios.delete(url).then( res => {
        Vue.prototype.$notify({
            title: 'success',
            message: res.data.message,
            type: 'success',
        });
        hideLoader()
        //window.location.href = '/estudantes'
    })
}