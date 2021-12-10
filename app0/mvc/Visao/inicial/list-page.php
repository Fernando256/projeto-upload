<head>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?= URL_CSS ?>list-page.css">
</head>
<body>
    <div class="list-content">
        <div class="filters">
            <nav class="navbar navbar-light bg-dark">            
                <div class="container-fluid">
                    <div class="sort">
                        <h4>Pesquisar e ordenar:</h4>
                        <form class="d-flex" class="sort-form">
                            <?php if (isset($_GET['pesquisar'])) :?>
                                <input class="form-control me-2" id ="search" type="search" name="pesquisar" placeholder="Pesquisar" aria-label="Search" value="<?=$_GET['pesquisar']?>">
                            <?php else : ?>
                                <input class="form-control me-2" id ="search" type="search" name="pesquisar" placeholder="Pesquisar" aria-label="Search">
                            <?php endif;?>
                                <select class="form-select" name="ordenar" required>   
                                <option value="data">Data</option>
                                <?php if ($_GET['ordenar'] === 'ordenacao') : ?>
                                    <option value="ordenacao" selected>Alfabeticamente</option>
                                <?php else : ?>
                                    <option value="ordenacao">Alfabeticamente</option>
                                <?php endif ?>
                            </select>
                            <button class="btn btn-outline-light" type="submit">Filtrar</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="config-buttons">
            <a href="<?=URL_RAIZ?>upload-file" ><button type="button" class="btn btn-primary" id="new-upload">Novo upload</button></a>
            <a href="<?=URL_RAIZ?>uploads/meus-uploads"><button type="button" class="btn btn-info">Meus Uploads</button></a>
        </div>
        <?php if ($uploads) : ?>
            <?php foreach ($uploads as $upload) :?>
            <a href="<?=URL_RAIZ?>upload/<?= $upload->getId()?>">
                <div class="upload-block">
                    <h3><?= $upload->getDescricao()?></h3>
                </div>
            </a>
            <?php endforeach ?>
        <?php endif?>
        <div class="page-buttons">
            <?php if ($uploads) : ?>
                <?php if ($pagina > 1) : ?>
                    <?php if (isset($_GET['pesquisar'])) : ?>
                        <a href="<?= URL_RAIZ . 'uploads?pesquisar=' . $_GET['pesquisar'] . "&ordenar=" . $_GET['ordenar']. "&p=" . ($pagina-1)?>"><button type="button" class="btn btn-light">Página anterior</button></a>
                    <?php else : ?>
                        <a href="<?= URL_RAIZ . 'uploads?p=' . ($pagina-1) ?>"><button type="button" class="btn btn-light">Página anterior</button></a>
                    <?php endif ?>
                <?php endif ?>
                <?php if ($pagina < $ultimaPagina) : ?>
                    <?php if (isset($_GET['pesquisar'])) : ?>
                        <a href="<?= URL_RAIZ . 'uploads?pesquisar=' . $_GET['pesquisar'] . "&ordenar=" . $_GET['ordenar']. "&p=" .($pagina+1)?>"><button type="button" class="btn btn-light">Próxima página</button></a>
                    <?php else : ?>
                        <a href="<?= URL_RAIZ . 'uploads?p=' . ($pagina+1)?>"><button type="button" class="btn btn-light">Próxima página</button></a>
                    <?php endif ?>
                <?php endif ?>
            <?php endif?>
        </div>
    </div>

    <script src="<?= URL_JS ?>list-page.js"></script>
</body>