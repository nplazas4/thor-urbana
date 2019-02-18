<?php
    // Breadcrumb
    $breadcrumb = [
        [ 'Inicio', 'home','Pages','PortalProjects'],
        [ 'Lista de proyectos','index','Projects'],
    ];
?>
<div class="section portal-projects">
    <div class="breadcrumb-container">
        <a href="javascript:history.back()" class="breadcrumb-back"><i class="material-icons">keyboard_arrow_left</i></a>
        <?php foreach ($breadcrumb as $item): ?>
            <!-- <a href="<//?= $item[1] ?>" class="breadcrumb"><//?= $item[0] ?></a> -->
            <?php echo $this->Html->link($item[0],
              ['controller'=>$item[2], 'action'=>$item[1]],
              ['escape' => false,'class'=>'breadcrumb']
            );?>
        <?php endforeach; ?>
    </div>
    <div class="section home">
        <div class="home-menu">
          <!-- <div class="row"> -->
            <form class="col s12">
                <div class="input-field col s12">
                  <i class="material-icons prefix">search</i>
                  <input id="myInput" onkeyup="myFunction()" type="text"></input>
                  <label for="myInput">Buscar</label>
              </div>
            </form>
          <table id="myTable" class="display highlight centered" cellspacing="10" width="100%">
                <thead>
                    <tr>
                      <th scope="col" width="10%"><?php echo $this->Html->link($this->Html->tag('i','add', array('class' => 'material-icons tooltipped','data-position'=>'dropdown','data-tooltip'=>'Agregar Proyecto')),
                      array('action' => 'add'), array('escape'=>false));?></th>
                      <th scope="col" width="10%"><?= $this->Paginator->sort('id',['No.']) ?></th>
                      <th scope="col" width="20%"><?= $this->Paginator->sort('ID_PROJECT',['ID']) ?></th>
                      <th scope="col"><?= $this->Paginator->sort('PROJECT_NAME',['NOMBRE']) ?></th>
                      <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($projects as $project): ?>
                  <tr>
                      <td></td>
                      <td><?= $this->Number->format($project->id) ?></td>
                      <td><?= h($project->ID_PROJECT) ?></td>
                      <td><?= h($project->PROJECT_NAME) ?></td>
                      <td class="actions">
                          <?= $this->Html->link(__('Editar'),['action' => 'edit', $project->id],['class'=>'btn btn-small tooltipped','data-position'=>'left','data-tooltip'=>'Ver o Editar Proyecto']) ?>
                          <!-- <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?> -->
                          <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete',$project->id], ['confirm' => __('Seguro desea eliminar el proyecto '.$project->PROJECT_NAME.'?', $project->id),'class'=>'btn btn-small tooltipped #f44336 red','data-position'=>'down','data-tooltip'=>'Eliminar Proyecto']) ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
              <br>
                <ul class="pagination">
                  <li class="waves-effect"><?= $this->Paginator->first($this->Html->tag('i','first_page',array('class'=>'material-icons')),
                  array('escape' => false)) ?></li>
                    <!-- <?//= $this->Paginator->first('<< ' . __('first')) ?> -->
                    <li class="waves-effect"><?= $this->Paginator->prev($this->Html->tag('i','chevron_left',array('class'=>'material-icons')),
                    array('escape' => false)) ?></li>
                    <li class="waves-effect"><?= $this->Paginator->numbers(['before'=>'','after'=>'']) ?></li>
                    <!-- <li class="waves-effect"><?//= $this->Paginator->next(__('next') . ' >') ?></li> -->
                    <li class="waves-effect"><?= $this->Paginator->next($this->Html->tag('i','chevron_right',array('class'=>'material-icons')),
                    array('escape' => false)) ?></li>
                    <li class="waves-effect"><?= $this->Paginator->last($this->Html->tag('i','last_page',array('class'=>'material-icons')),
                    array('escape' => false)) ?></li>
                    <!-- <li class="waves-effect"><?//= $this->Paginator->last(__('last') . ' >>') ?></li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<script>

function myFunction() {
var searchText = document.getElementById('myInput').value;
var targetTable = document.getElementById('myTable');
var targetTableColCount;

//Loop through table rows
for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
    var rowData = '';

    //Get column count from header row
    if (rowIndex == 0) {
       targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
       continue; //do not execute further code for header row.
    }

    //Process data rows. (rowIndex >= 1)
    for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
        rowData += targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;
    }

    //If search term is not found in row data
    //then hide the row, else show
    if (rowData.indexOf(searchText) == -1)
        targetTable.rows.item(rowIndex).style.display = 'none';
    else
        targetTable.rows.item(rowIndex).style.display = 'table-row';
}
}
</script>
