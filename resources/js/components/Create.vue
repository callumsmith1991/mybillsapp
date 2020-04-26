<template>
    <div>
        <h3 class="text-center">Add bill</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="createBill">
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
                    <button type="submit" class="btn btn-primary">Add bill</button>
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
        methods: {
            createBill() {

                this.apiKey = test;

                this.axios
                    .post('http://127.0.0.1:8000/api/create?api_token='+this.apiKey+'', this.bill)
                    .then(response => (
                        this.$router.push({name: 'home'}),
                        console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }

</script>
