<template>
  <div class="t-parent">
    <div v-if="loading" class="spinner-container height-before-content">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div v-else>
      <div v-if="hasMonthlyIncome">
        <p>Your Monthy Income is {{monthlyIncome.amount}}</p>
        <div class="row">
          <div class="col-md-4">
            <form @submit.prevent="editMonthlyIncome">
              <div class="form-group">
                <label>Amount</label>
                <input class="form-control" type="text" v-model="income.amount" />
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div v-else>
        <p>You have not added a monthly income yet, Add using the form below</p>
        <div class="row">
          <div class="col-md-4">
            <form @submit.prevent="createMonthlyIncome">
              <div class="form-group">
                <label>Amount</label>
                <input class="form-control" type="text" v-model="income.amount" />
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
var test = document.getElementById("api_token");
test = test.getAttribute("data-api");

export default {
  data() {
    return {
      apiKey: "",
      monthlyIncome: {},
      income: {},
      hasMonthlyIncome: "",
      loading: true,
      monthlyIncomeId: ""
    };
  },
  created() {
    this.apiKey = test;

    this.axios
      .get(
        "http://127.0.0.1:8000/api/monthly-income?api_token=" + this.apiKey + ""
      )
      .then(response => {
        this.monthlyIncome = response.data;
        console.log(this.monthlyIncome.amount);

        if (this.monthlyIncome === "No monthly income found for this user") {
          this.hasMonthlyIncome = false;
        } else {
          this.hasMonthlyIncome = true;
        }

        console.log(this.hasMonthlyIncome);
        this.loading = false;
        this.monthlyIncomeId = this.monthlyIncome.id;
      });
  },
  methods: {
    createMonthlyIncome() {
      this.axios
        .post(
          "http://127.0.0.1:8000/api/createamount?api_token=" +
            this.apiKey +
            "",
          this.income
        )
        .then(
          response => (
            this.$router.push({ name: "home" }), console.log(response.data)
          )
        )
        .catch(error => {
          if (error.response.status == 422) {
            console.log(error.response);
          }
        })
        .finally(() => (this.loading = false));
    },
    editMonthlyIncome() {

      console.log(this.monthlyIncome);
      
      this.axios
        .patch(
          "http://127.0.0.1:8000/api/update/" +this.monthlyIncomeId+"?api_token=" +
            this.apiKey +
            "",
          this.income
        )
        .then(
          response => (
            this.$router.push({ name: "home" }), console.log(response.data)
          )
        )
        .catch(error => {
          if (error.response.status == 422) {
            console.log(error.response);
          }
        })
        .finally(() => (this.loading = false));
    }
  }
};
</script>