<template>
    <div>
        <button class="btn btn-danger" @click="ChangeLike">            
            <i class="fas fa-heart" v-if="state"></i>
            <i class="far fa-heart" v-if="!state"></i>
            <small v-if="likes!=0" v-text="likes"></small>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['post', 'user'],
        created() {
            this.GetLike()
        },
        mounted() {            
            Echo.channel(`like-${this.post.id}`)
            .listen('LikeChanged', (like) => {
                this.GetLike();
                console.log('asd');
            })
        },
        data() {
            return {
                Url: 'http://blog.test/',                        
                state: false,
                likes: 0
            }
        },
        methods: {
            ChangeLike() {                

                this.state = !this.state

                axios.post(`${this.Url}save-like`, {
                    post_id: this.post.id,
                    user_id: this.user.id,
                    state: this.state,
                })
                .then((res => {                    
                    this.likes = res.data.likes
                    this.state = res.data.like.state                                              
                }))
            },
            GetLike() {
                axios.post(`${this.Url}get-like`, {
                    post_id: this.post.id,
                    user_id: this.user.id,
                })
                .then((res => {                    
                    this.likes = res.data.likes;
                    if((res.data.like!=null)){
                        this.state = res.data.like.state
                    }                    
                }))
            }
        },        
    }
</script>
