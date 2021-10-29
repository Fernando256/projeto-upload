<head>
    <link rel="stylesheet" href="<?= URL_CSS ?>topic-page.css">
</head>
<body>  
    <main>
        <div class="main-content">
            <h4><?=$topico->getTitulo()?></h4>
            <div class="body-upload-content">
                <span><?=$topico->getNomeUsuario()?></span>
                <p><?=$topico->getDescricao()?></p>
               <a href="" download="Testando.pdf"><button type="button" class="btn btn-primary">Download</button></a>
            </div>
            <h5>Comentários:</h5>
            <?php foreach ($comentarios as $comentario) : ?>
                <div class="comment-content">
                    <span><?=$comentario->getNomeUsuario()?></span>
                    <div class="view-comment" style="display:inline">
                        <p id="comment"><?=$comentario->getComentario()?></p>
                        <?php if ($idUsuarioLogado === $comentario->getIdUsuario()) : ?>
                            <div class="action-links">
                                <form action="<?= URL_RAIZ?>upload/<?=$topico->getId()?>/comentario/<?= $comentario->getId()?>" method="POST">
                                    <input type="hidden" name="_metodo" value="DELETE">
                                    <a id="delete-comment" onclick="event.preventDefault(); this.parentNode.submit();">excluir</a>
                                </form>                
                                <a id="edit-comment">editar</a>
                            </div>
                    </div>    
                            <div class="edit-comment" style="display:none">
                                <form method="POST" action="<?= URL_RAIZ?>upload/<?=$topico->getId()?>/comentario/<?= $comentario->getId()?>">
                                    <input type="hidden" name="_metodo" value="PATCH">
                                    <div class="mb-3">
                                        <textarea class="form-control" id="edit-comment-textarea" name="edit-comment-textarea" rows="3" required><?=$comentario->getComentario()?></textarea>
                                    </div>
                                    <button class="btn btn-primary">Enviar</button>
                                    <button class="btn btn-danger cancel-button">Cancelar</button>
                                </form>
                            </div>
                        <?php endif;?>
                </div>
            <?php endforeach;?>
        </div>
        <form action="<?=URL_RAIZ . "upload/" . $topico->getId()?>/comentario" method="POST">
            <div class="mb-3">
                <label class="form-label">Adicionar comentário:</label>
                <textarea class="form-control" id="add-comment" name="add-comment" rows="3"></textarea>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </main>
    <script src="<?= URL_JS ?>topic-page.js"></script>
</body>