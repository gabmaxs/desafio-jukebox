<template>
  <div class="register">
    <h1 class="title">Registrar novo usuário</h1>
    <form id="form" @submit.prevent="sendForm">
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Nome</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" v-model="user.first_name" required type="text" placeholder="Digite o nome">
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Sobrenome</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" v-model="user.last_name" required type="text" placeholder="Digite o sobrenome">
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">E-mail</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" v-model="user.email" required type="email" placeholder="Digite o e-mail">
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Telefone</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" v-model="user.phone" required v-mask="['(##) ####-####', '(##) #####-####']" type="text" placeholder="Digite o telefone">
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label">
          <label class="label">Pessoa Jurídica?</label>
        </div>
        <div class="field-body">
          <div class="field is-narrow">
            <p class="control">
              <label class="radio">
                <input type="radio" v-model="user.legal_entity" value="1">
                Sim
              </label>
              <label class="radio">
                <input type="radio" v-model="user.legal_entity" checked value="0">
                Não
              </label>
            </p>
          </div>
        </div>
      </div>
      <div v-if="user.legal_entity == 0" class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">CPF</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" v-model="user.document" v-mask="'###.###.###-##'"  type="text" placeholder="Digite o CPF">
            </p>
          </div>
        </div>
      </div>
      <div v-if="user.legal_entity == 1" class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">CNPJ</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" v-model="user.document" v-mask="'##.###.###/####-##'"  type="text" placeholder="Digite o CNPJ">
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-body">
          <div class="field">
            <div class="control">
              <button class="button is-primary">
                Salvar
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios"
export default {
  name: 'Register',
  data() {
    return {
        user: {
          first_name: "",
          last_name: "",
          email: "",
          phone: "",
          legal_entity: 0,
          document: "",
        }
    }
  },
  methods: {
    sendForm() {
      return axios.post("/users", 
        JSON.stringify(this.user), 
        {
          headers: {
            "Content-Type": "application/json" ,
            "Accept": "application/json" 
          }
        }
      )
      .then(response => console.log(response))
      .catch(error => console.log(error))
    }
  }
}
</script>