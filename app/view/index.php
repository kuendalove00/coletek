<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
     <link href="./sidebars.css" rel="stylesheet">   
    <title>Usuarios | Cadastro</title>
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
                            <li><a href="./usuarios" class="link-dark rounded">Listar</a></li>
                            <li><a href="./usuarios/criar" class="link-dark rounded">Cadastrar</a></li>
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
                            <li><a href="./setores/" class="link-dark rounded">Listar</a></li>
                            <li><a href="./setores/criar" class="link-dark rounded">Cadastrar</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
            </ul>
        </div>
        <div class="px-4 py-5 my-5 w-100  text-center">
            <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="display-5 fw-bold">Coletek</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Teste de conhecimento PHP desenvolvido por Kuenda Mayeye</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-primary  px-4 gap-3">Abrir Menu</button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<?php
?>