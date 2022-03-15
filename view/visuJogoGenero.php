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
        <input type="text" name="generojogo" class="form-control" id="inlineFormInputGroupUsername" placeholder="Genero do jogo">
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
        <th scope="col">Genero</th>
        <th scope="col">Alterar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $generojogo = isset($_POST["generojogo"]) ? $_POST["generojogo"] : "";

      if ($generojogo) {

        $dado = visuJogoGenero($conn, $generojogo);

        foreach ($dado as $generojogo) :
      ?>
          <tr>
            <th scope="row"><?= $generojogo["idjogo"] ?></th>
            <td><?= $generojogo["nomejogo"] ?></td>
            <td><?= $generojogo["valorjogo"] ?></td>
            <td><?= $generojogo["qtdjogo"] ?></td>
            <td><?= $generojogo["generojogo"] ?></td>
          
          <td>
              <form action="../view/alterarjogoform.php" method="get">

                <input type="hidden" value="<?= $generojogo ["idjogo"] ?>" name="codigojogo">
                <button type="submit" class="btn btn-primary">Alterar</button>

              </form>

            </td>
          </td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" codigo="<?=$generojogo["idjogo"]?>" nomejogo="<?=$generojogo["nomejogo"]?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Excluir
            </button>
          </td>
          </tr>
      <?php
        endforeach;
      }
      ?>
    </tbody>
  </table>

</div>

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
        

        <form action="../controler/deletarjogo.php" method="get">
      
      <input type="hidden" class= "codigo form-control" name="codigojogo">
      <button type="submit" class="btn btn-primary">Excluir</button>

      </form>
      </div>
    </div>
  </div>
</div>
<script>

var deletarUsariomodal=document.getElementById('deleteModal');
deletarUsariomodal.addEventListener('show.bs.modal', function(event){
var button = event.relatedTarget;
var codigo = button.getAttribute ('codigo');
var nomejogo = button.getAttribute ('nomejogo');

var modalbody = deletarUsariomodal.querySelector('.modal-body');
modalbody.textContent = 'Gostaria de excluir o jogo' + nomejogo + '?';

var Codigo = deletarUsariomodal.querySelector('.modal-footer .codigo');
Codigo.value = codigo;
})



</script>



<?php

include_once("../view/footer.php")

?>