<template>
    <div class="signature-pad">
        <canvas ref="canvas"></canvas>
        <button @click="clear">Clear</button>
        <button @click="save">Save</button>
    </div>
</template>

<script>
import SignaturePad from "signature_pad";
export default {
    data() {
        return {
            signaturePad: null,
        };
    },
    mounted() {
        this.initializeSignaturePad();
    },
    methods: {
        initializeSignaturePad() {
            const canvas = this.$refs.canvas;
            this.signaturePad = new SignaturePad(canvas, {
                backgroundColor: "white",
                penColor: "black",
                // Add more options here if needed
            });
        },
        clear() {
            this.signaturePad.clear();
        },
        save() {
            if (!this.signaturePad.isEmpty()) {
                const dataURL = this.signaturePad.toDataURL();
                this.$emit("save", dataURL);
                this.clear();
            }
        },
    },
};
</script>

<style>
.signature-pad {
    border: 1px solid #ccc;
    padding: 10px;
    display: inline-block;
}
</style>
