<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Genero do jogo</label>
    <div class="input-group">
      <div class="input-group-text">Genero</div>
      <input type="text" name="generoJogo" class="form-control" id="inlineFormInputGroupUsername" placeholder="Genero do jogo">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Quantidade</th>
      <th scope="col">ALterar</th>
      <th scope="col">Excluir</th>
      <th scope="col">Genero</th>
    </tr>
  </thead>
  <tbody>
  <?php
$generojogo = isset ($_POST["generoJogo"])? $_POST["generoJogo"]:"" ;

if($generojogo){

$dado = visuJogoGenero($conn,$generojogo);

foreach($dado as $generoJogo):
?>
    <tr>
      <th scope="row"><?=$generoJogo["idjogo"] ?></th>
      <td><?=$generoJogo["nomejogo"] ?></td>
      <td><?=$generoJogo["valorjogo"] ?></td>
      <td><?=$generoJogo["qtdjogo"] ?></td>
      <td><?=$generoJogo["generojogo"] ?></td>
    </tr>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" codigo="<?=$emailUsuarios["idusu"] ?>" email="<?=$emailUsuarios["emailusu"] ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Excluir
        </button>

    <?php
      endforeach;
    }
    ?>
  </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">Excluir Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        

        <form action="../controler/deletarusuario.php" method="get">
      
      <input type="hidden" class= "codigo form-control" name="codigoUsu">
      <button type="submit" class="btn btn-primary">Excluir</button>

      </form>

</div>

<?php

include_once("../view/footer.php")

?>