<head>
    <link rel="stylesheet" href="<?= URL_CSS?>upload-file.css">
</head>
<div class="upload-content">
    <form action="<?= URL_RAIZ?>uploads">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Título</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Título">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
            <textarea class="form-control" id="description-file" rows="3"></textarea>
            </div>
        <input type="file" name="Upload" id="file-content">
        <div class="buttons-form">
            <button type="submit" class="btn btn-primary">Fazer Upload</button>
            <a href="<?= URL_RAIZ?>uploads"><button type="button" class="btn btn-secondary">Cancelar Upload</button></a>
        </div>
    </form>
</div>