<template>
    <div>
        <img :src="qrcodeUrl" alt="QR Code" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            qrcodeUrl: "",
        };
    },
    mounted() {
        this.generateQRCode();
    },
    methods: {
        generateQRCode() {
            // Menggunakan URL backend Laravel untuk menghasilkan QR Code
            this.qrcodeUrl = "http://localhost:8000/generate-qrcode";
        },
    },
};
</script>
