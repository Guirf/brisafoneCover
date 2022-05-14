<?php

$comb = "abcdefghi!@#$%*jklmnopqrstuvwx@!#@$#%*yzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%*-+=";
$shfl = str_shuffle($comb);
$pwd = substr($shfl,0,12);


?>


<head> 
    <!DOCTYPE html>
    <html lang="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrisaFone Cover</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid row">
        <div class="col-sm-6">
            <h3>Adicionar ramais SIP a base de dados</h3>
            <br>
            <form method="POST" action="/">
                
                <div class="mb-3 col-sm-10">
                    <label for="ramal" class="form-label">Número do ramal</label>
                    <input type="number" id="ramal" name="ramal" class="form-control">
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="user" class="form-label">Usuário</label>
                    <input type="text" id="user" name="user" class="form-control">
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="context" class="form-label">Contexto</label>
                    <input type="text" id="context" name="context" class="form-control" >
                </div>
                <div class="mb-3 col-sm-10">
                    <label for="password" class="form-label">Senha</label>
                    <input value='<?php echo $pwd; ?>' type="text" id="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input  type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <h3>Lista de ramais disponíveis</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $ramais): ?>
                    <tr>
                        <td scope="col"><?php echo $ramais->aors; ?></td>
                        <td scope="col"><?php echo $ramais->name;  ?></td>
                        <td scope="col">
                            <?php foreach($data as $info): ?>
                                <?php
                                    if (empty($info->endpoint)) {
                                        echo 'Offline';
                                    }
                                    if($info->endpoint === $ramais->aors){
                                        echo 'Online';
                                    } else {
                                        echo 'Offline';
                                    }
                                ?>
                            <?php endforeach ?>
                        </td>
                        <td scope="col">
                        <a href="/clicktocall/2000/<?php echo $ramais->aors;?>"><button type="button" ><img width="30" src="https://cdn-icons-png.flaticon.com/128/25/25453.png"></button><a>
                        <a href="/delete/<?php echo $ramais->aors;?>"><button type="button" class="btn btn-danger">Excluir</button><a>
                        </td>
                    </tr>

                    <?php endforeach ; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>