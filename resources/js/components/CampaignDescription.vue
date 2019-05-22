<template>
  <div class="card">
    <h1>{{ campaignJson.title }}</h1>
    <p>{{ campaignJson.description }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      campaignJson: {
        title: "",
        description: "",
        id: ""
      }
    };
  },
  created() {
    let uri = "/api/campaigns/1";
    this.axios.get(uri).then(response => {
      this.campaignJson = response.data.data;
    });
  }
};
</script>

<style>
</style>
