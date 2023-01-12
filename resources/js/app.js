import './bootstrap';
import Alpine from 'alpinejs';
import { createApp } from 'vue'
// import {LoadingPlugin} from 'vue-loading-overlay';
// import 'vue-loading-overlay/dist/css/index.css';

import iziToast from 'izitoast'
import 'iziToast/dist/css/iziToast.min.css'

window.iziToast = iziToast;

import toastr from 'toastr'
import 'toastr/build/toastr.min.css'

import Select2 from 'vue3-select2-component';

window.toastr = toastr;

import CreateProjectComponent from './components/job/CreateProject.vue'
import FindProjectComponent from './components/job/Find_Job.vue'
import ProfileComponent from './components/Profile.vue'
import ApplyJobComponent from './components/job/ApplyJob.vue'
import NotificationComponent from './components/Notification.vue'
import AcceptOfferComponent from "./components/AcceptOffer.vue";
import Chat from "./components/Chat.vue";

window.Alpine = Alpine;

Alpine.start();

const app = createApp({});

app.component('create-project', CreateProjectComponent);
app.component('find-project', FindProjectComponent);
app.component('profile', ProfileComponent);
app.component('apply-job', ApplyJobComponent);
app.component('notification', NotificationComponent);
app.component('accept-offer', AcceptOfferComponent);
app.component('chat', Chat);

app.mount('#app')
// app.use(LoadingPlugin);
app.component('Select2', Select2)

