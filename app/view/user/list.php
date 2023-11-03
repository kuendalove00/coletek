<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="../../../content/css/custom/sidebars.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <title>Usuário | Listar</title>
    </head>

    <body>
        <main>
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
                <div class="mb-3">
                    <a href="usuarios/criar" type="button" class="btn btn-primary">Adicionar Novo</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $users = $array[0]; ?>
                        <?php foreach ($users as $key=>$user): ?> 
                            <tr>
                                <th scope="row"><?php echo ++$key; ?></th>
                                <td><?php echo $user->getName(); ?></td>
                                <td><?php echo $user->getEmail(); ?></td>
                                <td>
                                    <form action="usuarios/remover" method="post">
                                        <a href="usuarios/ver?id=<?php echo $user->getId();?>" type="button" class="btn btn-success"><i class="bi bi-plus-square"></i></a>
                                        <a href="usuarios/editar?id=<?php echo $user->getId();?>" type="button" class="btn btn-warning"><i style="color: white;" class="bi bi-pencil-square"></i></a>
                                        <button type="submit" value="<?php echo $user->getId();?>" name="id" class="btn btn-danger"><i style="color: white;" class="bi bi-pencil-square"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </main>
    </body>

</html>