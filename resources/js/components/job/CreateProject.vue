<script setup>
import {onMounted, reactive, ref} from "vue";
import {useLoading} from 'vue-loading-overlay'

const categories = ref({})
const tags = ref({})
const form = ref({
    'title' : '',
    'desc' : '',
    'price' : '',
    'duration' : '',
    'category_id' : '',
    'type' : '',
    'tags' : [],
})
let errors = ref([]);

const getCategories = () => {
    axios.get('/api/get_categories').then(res => {
        categories.value = res.data.data
    }).catch(error => {

    })
}

const getTags = () => {
    axios.get('/api/get_tags').then(res => {
        tags.value = res.data.data
    }).catch(error => {

    })
}

const $loading = useLoading({
    // options
});
// or use inject without importing useLoading
// const $loading =  inject('$loading')

const fullPage = ref(false)

const save = () => {
    errors.value = []
    // const loader = $loading.show({
    //
    // });
    // simulate AJAX
    // setTimeout(() => {
    //     loader.hide()
    // }, 5000)
    axios.post('api/create-job',form.value).then(res =>{
        form.value = {}
        toastr.success("Job created successfully")
        errors.value = []
    }).catch(error => {
        errors.value = error.response.data.errors
    })
}


onMounted( () => {
    getCategories();
    getTags();
})
</script>

<template>
<div>
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Post A Job</h2>
                </div>
                <div class="col-lg-8">
                    <form @submit.prevent="save" class="form-contact contact_form" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control valid" :class="{ 'is-invalid' : errors.title }" v-model="form.title" name="title" id="title" type="text" placeholder="Write Title">
                                    <span class="invalid-feedback" v-if="errors.title">{{ errors.title[0] }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" :class="{ 'is-invalid' : errors.desc }" v-model="form.desc" name="message" id="message" cols="30" rows="9" placeholder="Write Job Desc"></textarea>
                                    <span class="invalid-feedback" v-if="errors.desc">{{ errors.desc[0] }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" :class="{ 'is-invalid' : errors.price }" v-model="form.price" name="price" id="price" type="text" placeholder="Write Price">
                                    <span class="invalid-feedback" v-if="errors.price">{{ errors.price[0] }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" :class="{ 'is-invalid' : errors.duration }" v-model="form.duration" name="duration" id="duration" type="text" placeholder="Write duration">
                                    <span class="invalid-feedback" v-if="errors.duration">{{ errors.duration[0] }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control" :class="{ 'is-invalid' : errors.category_id }" v-model="form.category_id">
                                        <option selected>choose Category</option>
                                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                    </select>
                                    <span class="invalid-feedback" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control" :class="{ 'is-invalid' : errors.type }" v-model="form.type">
                                        <option selected>choose type</option>
                                        <option value="parttime">Parttime</option>
                                        <option value="parttime">Fulltime</option>
                                    </select>
                                    <span class="invalid-feedback" v-if="errors.type">{{ errors.type[0] }}</span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <Select2 v-model="form.tags" :class="{ 'is-invalid' : errors.tags }" :settings="{ multiple: true }"  :options="tags" />
                                    <span class="invalid-feedback" v-if="errors.tags">{{ errors.tags[0] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Buttonwood, California.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+1 253 565 2365</h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@colorlib.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</template>

<style scoped>

</style>
