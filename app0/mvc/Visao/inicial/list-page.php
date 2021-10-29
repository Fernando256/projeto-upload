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
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>
            <div class="filter-date">
                <h4>Filtrar:</h4>
                <input type="text" id="date-range" name="daterange" value="" />
            </div>
        </div>
        <a href="<?=URL_RAIZ?>upload-file" ><button type="button" class="btn btn-primary" id="new-upload">Novo upload</button></a>
        <?php foreach ($uploads as $upload) :?>
        <a href="<?=URL_RAIZ?>upload/<?= $upload->getId()?>">
            <div class="upload-block">
                <h3><?= $upload->getDescricao()?></h3>
            </div>
        </a>
        <?php endforeach ?>
        <div class="page-buttons">
            <?php if ($pagina > 1) : ?>
                <a href="<?= URL_RAIZ . 'uploads?p=' . ($pagina-1) ?>"><button type="button" class="btn btn-light">Página anterior</button></a>
            <?php endif ?>
            <?php if ($pagina < $ultimaPagina) : ?>
                <a href="<?= URL_RAIZ . 'uploads?p=' . ($pagina+1) ?>"><button type="button" class="btn btn-light">Próxima página</button></a>
            <?php endif ?>
        </div>
    </div>

    <script src="<?= URL_JS ?>list-page.js"></script>
</body>