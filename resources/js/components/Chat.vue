<script setup>

import {onMounted, ref} from "vue";

const new_message = ref('');
const all_messages = ref([]);

const send = () => {
    console.log(new_message.value)
    axios.post('/api/send_message',{
        message : new_message.value,
        sender_id : props.auth.id,
        project_id : props.project.id,
    }).then( res => {
        get_messages()
    }).catch( error => {

    })
}

const get_messages = () => {
    axios.get(`/api/get_messages`,{
        params: {
            project_id : props.project.id
        }
    }).then( res => {
        console.log(res.data)
        all_messages.value = res.data
    }).catch( error => {

    })
}

const props = defineProps([
    'messages',
    'auth',
    'project',
])

onMounted(() => {
    get_messages()
})

</script>

<template>
    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">

                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                    <h5 class="font-weight-bold mb-3 text-center text-lg-start">Member</h5>

                    <div class="card">
                        <div class="card-body">

                            <ul class="list-unstyled mb-0">
                                <li class="p-2 border-bottom" style="background-color: #eee;">
                                    <a href="#!" class="d-flex justify-content-between">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp"
                                                 alt="avatar"
                                                 class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                 width="60">
                                            <div class="pt-1">
                                                <p class="fw-bold mb-0">John Doe</p>
                                                <p class="small text-muted">Hello, Are you there?</p>
                                            </div>
                                        </div>
                                        <div class="pt-1">
                                            <p class="small text-muted mb-1">Just now</p>
                                            <span class="badge bg-danger float-end">1</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-7 col-xl-8">
<!--                    <form @submit.prevent="Send">-->
                        <ul class="list-unstyled">

                            <li class="d-flex justify-content-between mb-4" v-for="message in all_messages"
                                :key="message.id">
                                <template v-if="message.sender_id !== auth.id">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                                         class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{ message.sender.name }}</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                                {{ message.created_at }}</p>
                                        </div>

                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{ message.message }}
                                            </p>
                                        </div>
                                    </div>
                                </template>
                                <template v-else>
                                    <div class="card w-100">

                                        <div class="card-header d-flex justify-content-between p-3">
                                            <p class="fw-bold mb-0">{{ message.sender.name }}</p>
                                            <p class="text-muted small mb-0"><i class="far fa-clock"></i>
                                                {{ message.created_at }}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">
                                                {{ message.message }}
                                            </p>
                                        </div>
                                    </div>
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                                         class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                </template>
                            </li>


                            <li class="d-flex justify-content-between mb-4">
                                <!--                               <div class="card w-100">-->
                                <!--                                   <div class="card-header d-flex justify-content-between p-3">-->
                                <!--                                       <p class="fw-bold mb-0">Lara Croft</p>-->
                                <!--                                       <p class="text-muted small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>-->
                                <!--                                   </div>-->
                                <!--                                   <div class="card-body">-->
                                <!--                                       <p class="mb-0">-->
                                <!--                                           Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque-->
                                <!--                                           laudantium.-->
                                <!--                                       </p>-->
                                <!--                                   </div>-->
                                <!--                               </div>-->
                                <!--                               <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"-->
                                <!--                                    class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">-->
                            </li>


                            <li class="bg-white mb-3">
                                <div class="form-outline">
                                    <textarea class="form-control" v-model="new_message" id="textAreaExample2"
                                              rows="4"></textarea>
                                </div>
                            </li>

                        </ul>
                    <a class="btn btn-info btn-rounded float-end" @click.prevent="send">Send</a>
<!--                        <button type="submit" class="btn btn-info btn-rounded float-end">Send-->
<!--                        </button>-->
<!--                    </form>-->
                </div>

            </div>

        </div>
    </section>
</template>

<style scoped>

</style>
