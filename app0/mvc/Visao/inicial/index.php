<div class="login-form">
    <h1>Login</h1>
    <form action="<?=URL_RAIZ?>" method="POST">
        <div class="inputs-login">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="floatingPassword">Senha</label>
            </div>
        </div>
        <div class="buttons-login">
            <button type="submit" class="btn btn-primary">Entrar</button></a>
            <a href="<?=URL_RAIZ?>cadastro"><button type="button" class="btn btn-secondary">Cadastrar</button></a>
        </div>
    </form>
</div>
