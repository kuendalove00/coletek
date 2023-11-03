<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="../../../content/css/custom/sidebars.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <title>Editar</title>
</head>
<body>
    <main class="">
        <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <svg class="bi me-2" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5 fw-semibold">Coletek</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li>
                    <a href="/" class="btn align-items-center rounded collapsed">
                        Início
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#home-collapse" aria-expanded="true">
                        Usuario
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Listar</a></li>
                            <li><a href="#" class="link-dark rounded">Cadastrar</a></li>
                            <li><a href="#" class="link-dark rounded">Setor</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Setores
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Listar</a></li>
                            <li><a href="#" class="link-dark rounded">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
            </ul>
        </div>
        <div class="container-md">
            <?php $sector = $array[0]; ?>
            <form action="atualizar" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input name="name" value="<?php echo $sector->getName(); ?>" type="text" class="form-control" id="name" placeholder="Digite o seu nome">
                </div>
                <input type="hidden" name="id" value="<?php echo $sector->getId(); ?>" />
                
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
         
    </main>
</body>
</html>