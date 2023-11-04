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
        <title>Listar</title>
    </head>
    <body>
        <main>
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
                            <li class="breadcrumb-item active" aria-current="page">Listagem</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-between w-100">
                    <div class="mb-3">
                        <a href="/coletek/usuarios/criar" type="button" class="btn btn-primary">Adicionar Novo</a>
                    </div>

                    <form action="/coletek/usuarios/pesquisar" method="get">
                        <div class="input-group mb-3 w-70">
                            <input type="text" class="form-control" name="sector" placeholder="Pesquisar por setor" required>
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
                        </div>
                    </form>
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
                        <?php
                        $users = $array[0];
                        if ($users):
                            foreach ($users as $key => $user):
                                ?> 
                                <tr>
                                    <th scope="row"><?php echo ++$key; ?></th>
                                    <td><?php echo $user->getName(); ?></td>
                                    <td><?php echo $user->getEmail(); ?></td>
                                    <td>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Adicionar Setores" href="/coletek/usuarios/ver?id=<?php echo $user->getId(); ?>" type="button" class="btn btn-success"><i class="bi bi-plus-square"></i></a>
                                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Usuário" href="/coletek/usuarios/editar?id=<?php echo $user->getId(); ?>" type="button" class="btn btn-warning"><i style="color: white;" class="bi bi-pencil-square"></i></a>
                                        <button  type="button" onclick="passData(<?php echo $user->getId(); ?>)"  data-bs-toggle="modal" data-bs-target="#confirmModal" class="btn btn-danger"><i data-bs-toggle="tooltip" data-bs-placement="top" title="Excluír Usuário" style="color: white;" class="bi bi-trash3"></i></button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Modal -->
                <div class="modal fade" id="confirmModal" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
                            </div>
                            <div class="modal-body">
                                Deseja excluír o usuário? 
                            </div>
                            <div class="modal-footer">
                                <form action="/coletek/usuarios/remover" method="post">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" name="id" id="confirm"  class="btn btn-primary">Confirmar</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            
        </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="/coletek/public/scripts/js/custom/functions.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

</html>