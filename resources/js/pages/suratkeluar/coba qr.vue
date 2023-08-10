<script>
export default{
    methods:{
        getQr() {
            let type = "getData";
            let url = ["qrcode", {}];
            this.$store
                .dispatch(type, url)
                .then((result) => {
                    this.test = result;
                    console.log(result);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    }
}
</script>
<template>
    <div v-for="data in test" :key="data.id">
        <img :src="convert(data.qr)" />
    </div>
</template>
