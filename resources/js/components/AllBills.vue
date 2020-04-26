<template>

  <p v-if="loading">Loading...</p>


  <table class="table table-dark" v-else>
    <thead>
      <tr>
        <th>
          <strong>Title</strong>
        </th>
        <th>
          <strong>Amount</strong>
        </th>
        <th>

        </th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="bill in bills" :key="bill.id">
        <td>{{ bill.title }}</td>
        <td>{{ bill.number }}</td>
        <td><router-link :to="{name: 'edit', params: { id: bill.id }}" class="btn btn-primary">Edit</router-link></td>
        <td><router-link :to="{name: 'delete', params: { id: bill.id }}" class="btn btn-danger">Delete</router-link></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
var test = document.getElementById('api_token');
test = test.getAttribute('data-api');

export default {
  props: ['api-token'],
  data() {
    return {
      bills: [],
      apiKey: '',
      loading: true
    };
  },
  created() {
   
    this.apiKey = test;
    
    this.axios.get("http://127.0.0.1:8000/api?api_token="+this.apiKey+"").then(response => {
      this.bills = response.data;
      this.loading = false;
    });
    
  }
};
</script>