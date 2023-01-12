<script setup>

import {onMounted, ref} from "vue";
import SingleOffer from "./SingleOffer.vue";

const props = defineProps([
    'project',
    'offers',
])
// const ShowIcon = ref(false)
// const ShowMessageButton = ref(false)
//
// const accept = (id) => {
//     axios.post('api/AcceptOffer/' + id).then(res => {
//         ShowIcon.value = true
//
//         toastr.success("Offer accepted Successfully")
//
//         if (res.data.status == 1){
//             ShowMessageButton.value = true
//         }
//     }).catch(error => {
//
//     })
// }
//
// const reject = (id) => {
//     axios.post('api/RejectOffer/' + id).then(res => {
//
//         toastr.success("Offer rejected Successfully")
//
//     }).catch(error => {
//
//     })
// }

onMounted(() => {


})

</script>

<template>

    <ul class="blog-info-link">
        <li v-if="props.offers.length > 0" v-for="offer in props.offers" :key="offer.id">
            <single-offer :offer="offer" :project="project"></single-offer>
<!--            <a href="#"><i-->
<!--                class="fa fa-user"></i> {{ offer.user.name }}</a>-->

<!--            <a v-if="!ShowIcon  && offer.status == 0" @click.prevent="accept(offer.id)"><i class="fa fa-check fa-lg mr-2 ml-3" style="font-size: 25px"></i></a>-->
<!--            <a v-if="!ShowIcon && offer.status == 0" @click.prevent="reject(offer.id)"><i class="fa fa-ban fa-lg" style="font-size: 25px"></i></a>-->
<!--            <br>-->

<!--            <a v-if="offer.status == 1" :href="`/message/user/${offer.user.id}/${offer.user.name}/${project.slug}`" class="btn btn-primary">Send Message</a>-->
        </li>
        <li v-else><span style="color: red">No Offers Yet</span></li>

    </ul>


</template>

<style scoped>

</style>
