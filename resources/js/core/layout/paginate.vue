<template lang="">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a
                    @click="onPageChange(1)"
                    class="page-link cursor"
                    tabindex="-1"
                    >Awal</a
                >
            </li>
            <li class="page-item">
                <a
                    class="page-link"
                    @click="onPageChange(currentPage - 1)"
                    aria-label="Previous"
                >
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link">{{ currentPage }}</a>
            </li>
            <li
                class="page-item"
                :class="{ disabled: lastPage == currentPage }"
            >
                <a
                    class="page-link"
                    @click="onPageChange(currentPage + 1)"
                    aria-label="Next"
                >
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
            <li
                class="page-item"
                :class="{ disabled: lastPage == currentPage }"
            >
                <a class="page-link cursor" @click="onPageChange(lastPage)"
                    >Akhir</a
                >
            </li>
        </ul>
    </nav>
</template>
<script>
export default {
    props: ["rowsTotal", "currentPage", "lastPage"],

    methods: {
        onPageChange(page) {
            this.$emit("onPageChange", page);
        },
    },
};
</script>
<style lang=""></style>
