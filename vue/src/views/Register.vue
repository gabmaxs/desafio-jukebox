<template>
  <div class="register">
    <h1>Registrar novo usuário</h1>
    <form id="form" method="post">
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Nome</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" type="text" placeholder="Digite o nome">
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
              <input class="input" type="text" placeholder="Digite o sobrenome">
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
              <input class="input" type="email" placeholder="Digite o e-mail">
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
              <input class="input" type="text" placeholder="Digite o telefone">
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
                <input type="radio" name="member">
                Sim
              </label>
              <label class="radio">
                <input type="radio" checked name="member">
                Não
              </label>
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">CPF</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" type="text" placeholder="Digite o CPF">
            </p>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">CNPJ</label>
        </div>
        <div class="field-body">
          <div class="field">
            <p class="control">
              <input class="input" type="text" placeholder="Digite o CNPJ">
            </p>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
