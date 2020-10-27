<template>
    <!-- COMECA TABLE -->
    <div class="container">
      <table class="table is-fullwidth">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in list" v-bind:key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.first_name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <div class="buttons is-centered are-small">
                <button class="button is-warning" @click="$emit('edit', user.id)">Editar</button> 
                <button class="button is-danger" @click="$emit('delete', user.id)">Excluir</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    <!-- TERMINA TABLE -->
</template>

<script>
export default {
    name: "Table",
    props: {
        list: Array
    },
}
</script>