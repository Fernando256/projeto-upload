<div class="register-form">
    <h1>Cadastro</h1>
    <form action="<?= URL_RAIZ?>cadastro" method="POST">
        <div class="inputs-login">
            <div class="form-floating">
                <input type="text" class="form-control" id="name" name="name" placeholder="Password">
                <label for="floatingInput">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password"placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>
        </div>
        <div class="buttons-login">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="<?=URL_RAIZ . 'login'?>"><button type="button" class="btn btn-secondary">Login</button></a>
        </div>
    </form>
</div>
