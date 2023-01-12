<template>

    <li><a href="#"><i class="fa fa-bell"></i>
        <span style="color: red">{{ notifyCount }}</span>
    </a>
        <ul class="submenu">
            <li :style="color" v-for="item in unread" :key="item.id"><a @click="readIt(item)">
                {{item.user}} <br> {{item.project}}
            </a></li>
        </ul>
    </li>

</template>

<script>
export default {
    name: "Notification",
    props:['auth'],
    data(){
        return {
            read: {},
            unread: [],
            notifyCount: 0,
        }
    },
    mounted() {
        this.getNotifications();

        Echo.private(`App.Models.User.${this.auth}`)
            .notification((notification) => {
                // console.log(notification)
                this.unread.unshift(notification);
                this.notifyCount++;
            });
    },
    methods :{
        getNotifications(){
            axios.post("/api/notifications")
                .then(res => {
                    // console.log(res.data)
                    this.read = res.data.read;
                    this.unread = res.data.unread;
                    this.notifyCount = res.data.unread.length;
                })
                .catch(error => {
                });
        },
        readIt(item){
            axios.post("/api/markAsRead", { id: item.id }).then(res => {
                this.unread.splice(item, 1);
                this.notifyCount--;
            });
        },
    },
    computed: {
        color() {
           // return this.notifyCount ? "color: red" : 'black';
        }
    }
}
</script>

<style scoped>

</style>
