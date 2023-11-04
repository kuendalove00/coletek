<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="/coletek/public/content/css/custom/sidebars.css" rel="stylesheet">
        <link rel="stylesheet" href="/coletek/public/content/css/custom/style.css">
        <title>Editar</title>
    </head>
    <body>
        <main class="">
            <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
            <a href="/coletek" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <svg class="bi me-2" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5 fw-semibold">Coletek</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li>
                    <a href="/coletek" class="btn align-items-center rounded collapsed">
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
                            <li><a href="/coletek/usuarios" class="link-dark rounded">Listar</a></li>
                            <li><a href="/coletek/usuarios/criar" class="link-dark rounded">Cadastrar</a></li>
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
                            <li><a href="/coletek/setores/" class="link-dark rounded">Listar</a></li>
                            <li><a href="/coletek/setores/criar" class="link-dark rounded">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
            </ul>
        </div>
            <div class="container-md py-5">
                <h1 class="display-7 fw-bold">Usuários</h1>
                <div class="mb-5">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/coletek/usuarios">Listagem</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edição</li>
                        </ol>
                    </nav>
                </div>
                <?php $user = $array[0]; ?>
                <form action="/coletek/usuarios/atualizar" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" value="<?php echo $user->getName(); ?>" type="text" class="form-control" id="name" placeholder="Digite o seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" value="<?php echo $user->getEmail(); ?>" type="email" class="form-control" id="email" placeholder="Digite o seu email" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>" />
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>

        </main>
    </body>
</html>