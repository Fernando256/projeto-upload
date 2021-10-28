<head>
    <link rel="stylesheet" href="<?= URL_CSS ?>topic-page.css">
</head>
<body>  
    <main>
        <div class="main-content">
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum mattis felis at luctus.
                 Nunc iaculis metus sapien, non congue.
            </h4>
            <div class="body-upload-content">
                <span>Nome Aleatorio</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum mattis felis at luctus.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     Phasellus bibendum mattis felis at luctus. Nunc iaculis metus sapien, non congue.
               </p>
               <button type="button" class="btn btn-primary">Download</button>
            </div>
            <h5>Comentários:</h5>
            <div class="comment-content">
                <span>Nome Aleatorio</span>
                <div class="view-comment" style="display:inline">
                    <p id="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus bibendum mattis felis at luctus.</p>
                    <div class="action-links">                
                        <a id="delete-comment">excluir</a>
                        <a id="edit-comment">editar</a>
                    </div>
                </div>
                <div class="edit-comment" style="display:none">
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control" id="edit-comment-textarea" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary">Enviar</button>
                        <button class="btn btn-danger cancel-button">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
        <form action="#">
            <div class="mb-3">
                <label class="form-label">Adicionar comentário:</label>
                <textarea class="form-control" id="add-comment" rows="3"></textarea>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </main>
    <script src="<?= URL_JS ?>topic-page.js"></script>
</body>