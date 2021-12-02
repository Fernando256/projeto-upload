<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL_CSS ?>navbar.css">
    <title><?=APLICACAO_NOME?></title>
</head>
<body>
    <nav>
        <img src="<?= URL_IMG ?>cloud-computing-white.png" alt="logo">
        <a href="<?=URL_RAIZ?>uploads"><span>Upload Media</span></a>
        <form action="<?= URL_RAIZ . 'login'?>" method="post" class="inline">
            <input type="hidden" name="_metodo" value="DELETE">
            <a href="<?=URL_RAIZ . 'login' ?>" onclick="event.preventDefault(); this.parentNode.submit()">
                <img src="<?= URL_IMG?>log-out-white.png" alt="leave">
            </a>
        </form>

    </nav>
    
    <?php $this->imprimirConteudo() ?>
</body>
</html>
    