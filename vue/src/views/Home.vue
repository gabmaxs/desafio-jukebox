<template>
  <div class="home">
    <h1 class="title">Usuários Cadastrados</h1>
    <Table :list="list" v-on:delete="deleteUser" v-on:edit="editUser" />
  </div>
</template>

<script>
import axios from "axios"
import Table from "@/components/Table.vue"
export default {
  name: 'Home',
  data() {
    return {
      list: []
    }
  },
  components: {
    Table
  },
  methods: {
    getList() {
      console.log("buscando usuarios")
      axios.get("/users", {
        headers: {
          "Accept": "application/json" 
        }
      })
      .then(response => {
        this.list = response.data.users
      })
      .catch(error => console.log(error.response))
    },
    deleteUser(user_id) {
      axios.delete(`/users/${user_id}`, {
        headers: {
          "Accept": "application/json" 
        }
      })
      .then(response => {
        this.removeFromList(user_id)
        console.log(response)
      })
      .catch(error => console.log(error.response))
    },
    removeFromList(user_id) {
      this.list = this.list.filter(user => user.id != user_id)
    },
    editUser(user_id) {
      this.$router.push({
        name: 'Edit',
        params: { id: user_id}
      })
    }
  },
  created() {
    this.getList()
  }
}
</script>
