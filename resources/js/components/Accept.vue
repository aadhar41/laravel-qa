<template>
    <div>
            <a v-if="canAccept" title="Mrak this answer as best answer." :class="classes" @click.prevent="create">
                <i class="fas fa-check fa-lg"></i>
            </a>
       
            <a v-if="accepted" title="The question owner accepted this answer as best answer." :class="classes">
                <i class="fas fa-check fa-lg"></i>
            </a>
    </div>
</template>
<script>
export default {
    props: ['answer'],
    data () {
        return {
            isBest: this.answer.is_best,
            id: this.answer.id
        };
    },
    methods: {
        create () {
            axios.post(`/answers/${this.id}/accept`)
            .then(res => {
                this.$toast.success(res.data.message, "Success", {
                    timeout: 5000, 
                    position: "topRight"
                });

                this.isBest = true;
            })
        }
    },
    computed: {
        canAccept () {
            return this.authorize('accept', this.answer);
        },
        accepted () {
            return !this.canAccept && this.isBest;
        },
        classes () {
            return [
                "mt-2",
                this.isBest ? 'vote-accepted' : ''
            ];
        }
    },
}
</script>