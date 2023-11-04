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
        <title>Inicio</title>
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
           
                <div class="px-4 my-5 py-2 w-100  text-center">
                    <div class="auto-close alert alert-primary" role="alert">
                        <h4 class="alert-heading">Boas Vindas!</h4>
                        <p>Seja bem vindo ao teste da coletek.</p>
                    </div>
                    <img class="d-block mx-auto mb-4" src="/coletek/public/content/images/logo.png" alt="" width="144" height="114">
                    <h1 class="display-5 fw-bold text-primary">Coletek</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">Teste de conhecimento PHP desenvolvido por Kuenda Mayeye</p>
                    </div>
                </div>


        </main>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="/coletek/public/scripts/js/custom/alert.js"></script>
</html>
