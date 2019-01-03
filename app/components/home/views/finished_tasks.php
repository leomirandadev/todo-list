<?php 
if ( $this->finished_tasks !== false ):
  foreach ($this->finished_tasks as $task):
    if ( empty( $task->removed_on ) ):
?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="task<?=$task->id?>">
      <div class="row">
      
        <div class="col-sm-8">
          <h4 class="panel-title">

            <a class="collapsed btn btn-default btn-sm" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTask<?=$task->id?>" aria-expanded="false" aria-controls="collapseTask<?=$task->id?>">
              <i class="fas fa-angle-down"></i>
            </a>

            <?=$task->title?>

          </h4>
        </div>

        <div class="col-sm-4 right">
          <button onclick="restartTask(<?=$task->id?>)" class="btn btn-sm btn-info">
            <i class="fas fa-undo-alt"></i>
          </button>
          <a href='edit&id=<?=$task->id?>' class="btn btn-sm btn-warning">
            <i class="fas fa-wrench"></i>
          </a>
          <button onclick="removeTask(<?=$task->id?>)" class="btn btn-sm btn-danger">
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
          <b> <i class="far fa-clock"></i> Finalizada em: </b>
          <?=date("d/m/Y", strtotime($task->finished_on));?>
        </p> 
        <p>
          <b> <i class="far fa-clock"></i> Criada em: </b>
          <?php
          $dateExpode = explode(" ",$task->created_on);
          echo date("d/m/Y", strtotime($dateExpode[0]))." às ".$dateExpode[1];
          ?>
        </p> 
      </div>
    </div>
  </div>

<?php endif; endforeach; endif; ?>