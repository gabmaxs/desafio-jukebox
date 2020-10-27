<template>
  <div class="register">
    <h1 class="title">Editar usuário</h1>
    <Message v-if="message.display" :msg="message.text" :type="message.type"/>
    <form id="form" @submit.prevent="saveUser">
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
                <input type="radio" :checked="user.legal_entity" v-model="user.legal_entity" value="1">
                Sim
              </label>
              <label class="radio">
                <input type="radio" :checked="user.legal_entity == false" v-model="user.legal_entity" value="0">
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
import Message from '@/components/Message.vue'
export default {
  name: 'Edit',
  components: {
    Message
  },
  data() {
    return {
        user: {
          first_name: "",
          last_name: "",
          email: "",
          phone: "",
          legal_entity: 0,
          document: "",
        },
        message: {
          text: "",
          type: "",
          display: false
        }
    }
  },
  methods: {
    getUser(){
        const user_id = this.$route.params.id
        console.log("buscando usuario")
        axios.get(`/users/${user_id}`, {
            headers: {
            "Accept": "application/json" 
            }
        })
        .then(response => {
            this.user = response.data.user
        })
        .catch(error => console.log(error.response))
    },
    saveUser() {
      return axios.put(`/users/${this.user.id}`, 
        JSON.stringify(this.user), 
        {
          headers: {
            "Content-Type": "application/json" ,
            "Accept": "application/json" 
          }
        }
      )
      .then(response => {
        this.message.type = "Sucesso"
        this.message.text = response.data.message
        this.message.display = true
      })
      .catch(error => {
        const status_error = error.response.status
        if(status_error == 400) {
          this.message.type = "Erro de validação"
          this.message.text = Object.values(error.response.data.error_message).shift()[0]
          this.message.display = true
        }
        else {
          this.message.type = "Erro Interno"
          this.message.text = error.response.data.error_message
          this.message.display = true
        }
      })
    }
  },
  created() {
    this.getUser()
  }
}
</script>