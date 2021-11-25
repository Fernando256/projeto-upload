<head>
    <link rel="stylesheet" href="<?= URL_CSS?>upload-file.css">
</head>
<div class="upload-content">
    <form action="<?= URL_RAIZ?>upload-file" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" required>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
        <input type="file" name="upload-arquivo" id="upload-arquivo" required>
        <div class="buttons-form">
            <button type="submit" class="btn btn-primary">Fazer Upload</button>
            <a href="<?= URL_RAIZ?>uploads"><button type="button" class="btn btn-secondary">Cancelar Upload</button></a>
        </div>
    </form>
</div>