<?php 
if ( $this->active_tasks !== false ):
  foreach ($this->active_tasks as $task): 
    if ( empty( $task->removed_on ) ):
?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="task<?=$task->id?>">
      <div class="row">

        <div class="col-sm-8">
          <h4 class="panel-title">
            <?=$task->title?> | 
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTask<?=$task->id?>" aria-expanded="false" aria-controls="collapseTask<?=$task->id?>">
              Ver Detalhes <i class="fas fa-angle-down"></i>
            </a>
          </h4>
        </div>

        <div class="col-sm-4 right">
          <button class="btn btn-sm btn-success">
            <i class="fas fa-check"></i>
          </button>
          <button class="btn btn-sm btn-default">
            <i class="fas fa-wrench"></i>
          </button>
          <button class="btn btn-sm btn-danger">
            <i class="far fa-trash-alt"></i>
          </button>
        </div>

      </div>
    </div>
    <div id="collapseTask<?=$task->id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="task<?=$task->id?>">
      <div class="panel-body">
        <p>
          <?=$task->description?>
        </p>
        <p>
          Criada em
          <?php
          $dateExpode = explode(" ",$task->created_on);
          echo date("d/m/Y", strtotime($dateExpode[0]))." às ".$dateExpode[1];
          ?>
        </p> 
      </div>
    </div>
  </div>

  <?php endif; endforeach; endif; ?>