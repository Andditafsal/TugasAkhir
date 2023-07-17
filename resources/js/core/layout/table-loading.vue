<template>
    <tr>
        <td colspan="12" class="text-center">
            <LoadingIndicator />
        </td>
    </tr>
</template>

<script>
import LoadingIndicator from './loading.vue';
export default {
    components: {
        LoadingIndicator
    }
}
</script>