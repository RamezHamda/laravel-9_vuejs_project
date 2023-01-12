<script setup>
import {onMounted, reactive, ref} from "vue";

const categories = ref({})
const user = ref({
    'name': '',
    'gender': '',
    'phone': '',
    'category_id': '',
    'job_title': '',
    'bio': '',
})
let errors = ref([]);

const getCategories = () => {
    axios.get('/api/get_categories').then(res => {
        categories.value = res.data.data
    }).catch(error => {

    })
}

const getUserProfile = () => {
    axios.get('/api/user_data_profile').then(res => {
        user.value = res.data.data
    }).catch(error => {

    })
}

const update = () => {
     errors.value = []
    axios.post('api/update-profile', user.value).then(res => {
        // iziToast.success('Success!', 'Update Profile')
        toastr.success("Update Profile")
        errors.value = []
        // iziToast.success('Update Profile', "Success", {timeout: 3000});
    }).catch(error => {
        errors.value = error.response.data.errors
    })
}

onMounted(() => {
    getCategories();
    getUserProfile();
})
</script>

<template>
    <div>
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Update Profile</h2>
                    </div>
                    <div class="col-lg-8">
                        <form ref="formContainer" @submit.prevent="update" class="form-contact contact_form"
                              method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" :class="{ 'is-invalid' : errors.name }"
                                               v-model="user.name" name="name"
                                               id="name" type="text" onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your name'"
                                               placeholder="Enter your name">

                                        <span class="invalid-feedback" v-if="errors.name">{{
                                                errors.name[0]
                                            }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" :class="{ 'is-invalid' : errors.gender }"
                                                v-model="user.gender">
                                            <option selected>choose Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <span class="invalid-feedback" v-if="errors.gender">{{
                                                errors.gender[0]
                                            }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" :class="{ 'is-invalid' : errors.phone }"
                                               v-model="user.phone" name="phone" type="text"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your phone'"
                                               placeholder="Enter your phone">
                                        <span class="invalid-feedback" v-if="errors.phone">{{ errors.phone[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" :class="{ 'is-invalid' : errors.category_id }"
                                                v-model="user.category_id">
                                            <option selected>choose Category</option>
                                            <option v-for="category in categories" :value="category.id">{{
                                                    category.name
                                                }}
                                            </option>
                                        </select>
                                        <span class="invalid-feedback"
                                              v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" :class="{ 'is-invalid' : errors.job_title }"
                                               v-model="user.job_title" name="job_title" id="subject" type="text"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter job_title'"
                                               placeholder="Enter job_title">
                                        <span class="invalid-feedback" v-if="errors.job_title">{{
                                                errors.job_title[0]
                                            }}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" :class="{ 'is-invalid' : errors.bio }"
                                                  v-model="user.bio" name="bio" id="bio" cols="30" rows="9"
                                                  onfocus="this.placeholder = ''"
                                                  onblur="this.placeholder = 'Enter Bio'"
                                                  placeholder=" Enter Bio"></textarea>
                                        <span class="invalid-feedback" v-if="errors.bio">{{ errors.bio[0] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Save Changes</button>
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
