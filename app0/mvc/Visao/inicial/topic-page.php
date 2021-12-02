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
                <a href="<?=URL_PUBLICO . 'files/' . $topico->getId().'.' .$topico->getExtArquivo();?>" download=""><button type="button" class="btn btn-primary">Download</button></a>
            </div>
            <?php if ($comentarios) : ?>
            <h5>Comentários:</h5>
                <?php foreach ($comentarios as $comentario) : ?>
                    <div class="comment-content" data-value="<?= $comentario->getId();?>">
                        <span><?=$comentario->getNomeUsuario()?></span>
                        <?php if ($idUsuarioLogado === $comentario->getIdUsuario()) : ?>
                            <div class="view-comment" style="display:inline" <?= $comentario->getId();?>>
                                <p id="comment"><?=$comentario->getComentario()?></p>
                                <div class="action-links">
                                    <form class="delete-button" action="<?= URL_RAIZ?>upload/<?=$topico->getId()?>/comentario/<?= $comentario->getId()?>" method="POST">
                                        <input type="hidden" name="_metodo" value="DELETE">
                                        <a id="delete-comment" onclick="event.preventDefault(); this.parentNode.submit();">excluir</a>
                                    </form>                
                                    <a class="editar-comment" onclick = "actionEdit(<?= $comentario->getId();?>)">editar</a>
                                </div>
                            </div>    
                            <div class="edit-comment" style="display:none" data-id ="<?= $comentario->getId();?>">
                                <form method="POST" action="<?= URL_RAIZ?>upload/<?=$topico->getId()?>/comentario/<?= $comentario->getId()?>">
                                    <input type="hidden" name="_metodo" value="PATCH">
                                    <div class="mb-3">
                                        <textarea class="form-control" id="edit-comment-textarea" name="edit-comment-textarea" rows="3" required><?=$comentario->getComentario()?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                    <button class="btn btn-danger cancel-button" onclick="event.preventDefault(); actionCancel(<?= $comentario->getId();?>);">Cancelar</button>
                                </form>
                            </div>
                        <?php else :?>
                            <p id="comment"><?=$comentario->getComentario()?></p>
                        <?php endif;?>  
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <form action="<?=URL_RAIZ . "upload/" . $topico->getId()?>/comentario" method="POST">
            <div class="mb-3">
                <label class="form-label">Adicionar comentário:</label>
                <textarea class="form-control" id="add-comment" name="add-comment" rows="3" required></textarea>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </main>
    <script src="<?= URL_JS ?>topic-page.js"></script>
</body>