<template>
  <div class="card">
    <h1>{{ campaign.title }}</h1>
    <p>{{ campaign.description }}</p>
  </div>
</template>

<script>
import gql from "graphql-tag";
import apollo from "vue-apollo";

// import campaignQuery from "~./queries/campaign.graphql";

export default {
  data() {
    return {
      campaign: {
        title: undefined,
        id: 5,
        description: undefined,
        routeParam: this.$route.params.id
      }
    };
  },
  apollo: {
    campaign: gql`
      query {
        campaign(id: id) {
          id
          title
          description
        }
      }
    `,
    variables: {
      return {
        id: this.$route.params.id
      }
    }
  }
};
</script>

<style>
</style>
