<template>
    <div>
        DASHBOARD BABY WOOO
    </div>
</template>

<script>
    export default {
        data () {
            return {
                index: null
            }
        },
        mounted () {
            axios.get('/api/dashboard').then((response) => {
                this.index = response.data.data
            })
        }
    }
</script>
