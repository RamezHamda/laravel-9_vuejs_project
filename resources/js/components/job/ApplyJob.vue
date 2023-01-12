<script setup>

import {onMounted, ref} from "vue";
const hideButton = ref(false)

const props = defineProps([
    'project',
    'user_id',
    'check',
])

const apply = () => {
    axios.post(`/api/applyProject/${props.project}`).then(res =>{
        hideButton.value = true
        toastr.success("Job created successfully")
    }).catch(error => {

    })
}
onMounted( () => {

})

</script>

<template>
    <div class="apply-btn2" v-if="!check && !hideButton">
        <a @click.prevent="apply" class="btn">Apply Now</a>
    </div>
    <div class="apply-btn2" v-else>
        <h4>Thanks for applying</h4>
    </div>
</template>

<style scoped>

</style>
