<template>
    <div>
        <h1>Gerando QrCode Vue Js</h1>
        <!--<qrcode-vue :value="value" :size="size" level="H" />-->
        <qrcode-vue :value="QrValue" :size="size" level="H" />
        <form>
            <input type="text" v-model="QrValue">
            <input 
                v-on:focus="$event.target.select()" 
                ref="myinput" 
                readonly 
                :value="QrValue"/>
            <button @click="copy">Copy</button>
        </form>
    </div>
</template>
<script>
    import QrcodeVue from 'qrcode.vue'
    export default {
    /*data() {
      return {
        value: 'Obrigado Deus!',
        size: 300,
      }
    },*/
    data() {
      return {
        QrValue: null,
        size: 300,
        text: 'This will get copied!'
      }
    },
    methods: {
        copy() {
            this.$refs.myinput.focus();
            let copySuccess = document.execCommand('copy');
            if(copySuccess){
                alert('Copiado com sucesso')
            }else{
                alert('copie novamente')
            }
        }
    },
    components: {
      QrcodeVue,
    },
  }
</script>