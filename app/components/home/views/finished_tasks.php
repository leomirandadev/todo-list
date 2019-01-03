<?php 
if ( $this->finished_tasks !== false ):
  foreach ($this->finished_tasks as $task):
    if ( empty( $task->removed_on ) ):
?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <?=$task->title?> | 
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Detalhes
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <p>
          <?=$task->description?>
        </p>
        <p>
          Finalizada em
          <?=date("d/m/Y", strtotime($task->finished_on));?>
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