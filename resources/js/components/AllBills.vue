<template>
  <div class="t-parent">
    <div class="spinner-container height-before-content" v-if="loading">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <div v-else>
    <table class="table table-dark">
      <thead>
        <tr>
          <th>
            <strong>Title</strong>
          </th>
          <th>
            <strong>Amount</strong>
          </th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="bill in bills" :key="bill.id">
          <td v-if="bill.title">{{ bill.title }}</td>
          <td v-if="bill.number">{{ bill.number }}</td>
          <td v-if="bill.number">
            <router-link :to="{name: 'edit', params: { id: bill.id }}" class="btn btn-primary">Edit</router-link>
          </td>
          <td v-if="bill.number"> 
            <router-link
              :to="{name: 'delete', params: { id: bill.id }}"
              class="btn btn-danger"
            >Delete</router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="row" v-if="bills.monthlyIncome">
      <div class="col-md-4">
        <p v-if="bills.monthlyIncome">Monthly Income: {{bills.monthlyIncome}}</p>
      </div>
      <div class="col-md-4">
        <p v-if="bills.billsTotal">Bills Total: {{bills.billsTotal}}</p>
      </div>
      <div class="col-md-4">
        <p v-if="bills.takeHomePay">Take Home Pay: {{bills.takeHomePay}}</p>
      </div>
    </div>
    <div class="row" v-else>
       <div class="col-md-6">
         <p>Add your monthly pay to calculate take home pay</p>
       </div>
    </div>
    <router-link to="/add/" class="btn btn-secondary">Add Bill</router-link>
  </div>
  </div>
</template>

<script>
var test = document.getElementById("api_token");
test = test.getAttribute("data-api");

export default {
  props: ["api-token"],
  data() {
    return {
      bills: [],
      apiKey: "",
      loading: true
    };
  },
  created() {
    this.apiKey = test;

    this.axios
      .get("http://127.0.0.1:8000/api?api_token=" + this.apiKey + "")
      .then(response => {
        this.bills = response.data;
        console.log(this.bills);
        this.loading = false;
      }).catch(error => {
        console.log(error.response.data);
      });
  }
};
</script>