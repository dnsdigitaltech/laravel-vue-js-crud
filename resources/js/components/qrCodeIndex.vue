<template>
    <div>
        <h1>Gerando QrCode Vue Js</h1>
        <!--<qrcode-vue :value="value" :size="size" level="H" />-->
        <qrcode-vue :value="QrValue" :size="size" level="H" />
        <form>
            <input type="text" v-model="QrValue">
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
      }
    },
    components: {
      QrcodeVue,
    },
  }
</script>