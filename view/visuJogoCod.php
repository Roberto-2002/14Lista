<?php

include_once("../view/header.php");
include_once("../model/conexao.php");
include_once("../model/jogoModel.php");

?>


<div class="centroform">

<form action="#" method="Post" class="row row-cols-lg-auto g-3 align-items-center">
  <div class="col-12">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Código do jogo</label>
    <div class="input-group">
      <div class="input-group-text">Código</div>
      <input type="text" name="codigoJogo" class="form-control" id="inlineFormInputGroupUsername" placeholder="Código do jogo">
    </div>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Pesquisar</button>
  </div>
</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">código</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Fone</th>
    </tr>
  </thead>
  <tbody>
  <?php
$codigojogo = isset ($_POST["codigoJogo"])? $_POST["codigoJogo"]:"" ;

if($codigojogo){

$dado = visuJogoCodigo($conn,$codigojogo);

if($dado){

?>
    <tr>
    <th scope="row"><?=$dado["idjogo"] ?></th>
      <td><?=$dado["nomejogo"] ?></td>
      <td><?=$dado["valorjogo"] ?></td>
      <td><?=$dado["qtdjogo"] ?></td>
      <td><?=$dado["generojogo"] ?></td>
      <td>
              <form action="../view/alterarjogoform.php" method="get">

                <input type="hidden" value="<?= $dado ["idjogo"] ?>" name="codigojogo">
                <button type="submit" class="btn btn-primary">Alterar</button>

              </form>

            </td>
          </td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" codigo="<?=$dado["idjogo"]?>" nome="<?=$dado["nomejogo"]?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Excluir
            </button>
          </td>
    </tr>
    <?php
    }
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
modalbody.textContent = 'Gostaria de excluir o jogo' + codigo + '?';

var Codigo = deletarUsariomodal.querySelector('.modal-footer .codigo');
Codigo.value = codigo;
})



</script>

<?php

include_once("../view/footer.php")

?>