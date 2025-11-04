<div class="d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="card-header text-center">
            <h2>Login</h2>
        </div>
        <div class="card-body">
            <form action="form1" method="post" data-parsley-validate="">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required data-parsley-type-message="Digite um e-mail válido" data-parsley-required-message="Digite um e-mail" data-parsley-errors-container="#erroEmail">
                <div id="erroEmail" class="erro-message"></div>
                <br>
                <label for="senha" class="form-label">Senha:</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required data-parsley-required-message="Digite uma senha" data-parsley-errors-container="#erroSenha">
                    <span type="button" class="btn" onclick="mostrarSenha()">
                        <i class="bi bi-eye"></i>
                    </span>
                </div>
                <div id="erroSenha" class="erro-message"></div>
                <br>
                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>
    </div>
</div>