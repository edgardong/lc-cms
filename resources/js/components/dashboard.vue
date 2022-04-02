<template>
    <p>
        dashboard</p>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
export default defineComponent({
    methods: {
        cs() {
            console.log('...cs...')
        }
    },
    mounted() {
        this.cs()
    },
})
</script>
