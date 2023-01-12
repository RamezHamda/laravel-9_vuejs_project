<script setup>

import {onMounted, ref} from "vue";

const props = defineProps([
    'project',
    'offer',
])
const ShowIcon = ref(false)
const ShowMessageButton = ref(false)

const accept = (id) => {
    axios.post('api/AcceptOffer/' + id).then(res => {
       ShowIcon.value = false

        toastr.success("Offer accepted Successfully")

        if (res.data.status == 1){
            ShowMessageButton.value = true
        }
    }).catch(error => {

    })
}

const reject = (id) => {
    axios.post('api/RejectOffer/' + id).then(res => {

        toastr.success("Offer rejected Successfully")

    }).catch(error => {

    })
}

onMounted(() => {
    if (props.offer.status == 0){
        ShowIcon.value = true
    }

    if (props.offer.status == 1){
        ShowMessageButton.value = true
    }

})

</script>

<template>
<div>
    <a href="#"><i class="fa fa-user"></i> {{ offer.user.name }}</a>

<!--    <template >-->
        <a v-if="ShowIcon && offer.status == 0" @click.prevent="accept(offer.id)"><i class="fa fa-check fa-lg mr-2 ml-3" style="font-size: 25px"></i></a>
        <a v-if="ShowIcon  && offer.status == 0" @click.prevent="reject(offer.id)"><i class="fa fa-ban fa-lg" style="font-size: 25px"></i></a>
<!--    </template>-->
<!--    <template v-else>-->

<!--    </template>-->
    <br>

    <a v-if="ShowMessageButton" :href="`/message/user/${offer.user.id}/${offer.user.name}/${project.slug}`" class="btn btn-primary">Send Message</a>
</div>
</template>

<style scoped>

</style>
