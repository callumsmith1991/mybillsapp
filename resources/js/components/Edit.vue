<template>

    <p v-if="loading">Loading...</p>

    <div v-else>
        <h3 class="text-center">Edit bill</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updatebill">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="bill.title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="bill.description">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" v-model="bill.number">
                    </div>
                    <button type="submit" class="btn btn-primary">Update bill</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    var test = document.getElementById('api_token');
    test = test.getAttribute('data-api');

    export default {
        data() {
            return {
                bill: {},
                loading: true,
                apiKey: ''
            }
        },
        created() {

            this.apiKey = test;

            this.axios
                .get('http://127.0.0.1:8000/api/edit/'+this.$route.params.id+'?api_token='+this.apiKey+'')
                .then((response) => {
                    this.bill = response.data;
                    this.loading = false;
                    // console.log(response.data);
                });
        },
        methods: {
            updatebill() {
                this.axios
                    .patch('http://127.0.0.1:8000/api/edit/'+this.$route.params.id+'?api_token='+this.apiKey+'', this.bill)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>