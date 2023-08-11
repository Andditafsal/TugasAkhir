<script>
export default {
    props: ["id"],
    data() {
        return {
            suratkeluar: {},
            jenissurat: {},
        };
    },
    mounted() {
        this.getSuratKeluar();
        this.getJenisSurat();
    },
    methods: {
        getJenisSurat() {
            this.$store
                .dispatch("showData", ["jenissurat", ""])
                .then((response) => {
                    this.jenissurat = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSuratKeluar() {
            this.$store
                .dispatch("showData", ["suratkeluar", this.id])
                .then((response) => {
                    this.suratkeluar = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
<template>
    <a :href="'/cetak/' + id">tesss</a>
</template>
