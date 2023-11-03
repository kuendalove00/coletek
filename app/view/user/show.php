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
        <title>Document</title>
    </head>

    <body>
        <main class="container-md">
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
                <form action="./vincular" method="post">
                    <?php $user = $array[0]; ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" class="form-control" type="text" value="<?php echo $user->getName(); ?>"
                               aria-label="readonly input example" readonly>
                        <input type="hidden" id="name" name="user_id" value="<?php echo $user->getId(); ?>">
                    </div>

                    <div class="mb-3">

                        <label for="sector" class="form-label">Setores</label>
                        <select name="sector_id" class="form-select">
                            <option selected>-- Selecionar setor --</option>
                            <?php $sectors = $array[1]; ?>
                            <?php foreach ($sectors as $sector): ?> 
                                <option value="<?php echo $sector->getId(); ?>"><?php echo $sector->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Vincular</button>
                    </div>
                </form>

                <ul class="list-unstyled ps-0">
                    <?php
                    
                    $userSectors = $array[2];
                    if ($userSectors):
                        foreach ($userSectors as $userSector):
                            var_dump($userSector);?>
                            <li><div class="form-check">
                                    <input class="form-check-input" value="<?php echo $userSector->getSectorId(); ?>" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        <?php echo $userSector->getSectorId(); ?>
                                    </label>
                                </div>
                            </li>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="button" class="btn btn-danger">Desvincular</button>
                </div>

            </div>


        </main>
    </body>

</html>