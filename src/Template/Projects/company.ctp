<?php
    // Breadcrumb
    $breadcrumb = [
        [ 'Inicio', 'home','Pages' ],
        [ 'Portal Proyectos', 'index','PortalProjects'],
        [ 'Transmisión y Transporte','companies','PortalProjects'],
        [ 'Sucursal de Transmisión','company','PortalProjects'],
    ];
?>
<div class="section bcrumb company">
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
    <?php $ProjCrec = array()?>
    <?php $ProjSost = array()?>
    <?php foreach ($projects as $project):?>
      <?php if($project->CATEGORY == 'crecimiento'):?>
      <?php $ProjC = $project->CATEGORY?>
      <?php array_push($ProjCrec, $ProjC);?>
    <?php else: ?>
      <?php $ProjS = $project->CATEGORY?>
      <?php array_push($ProjSost, $ProjS);?>
    <?php endif;?>
    <?php endforeach;?>
    <?php $ContCrec = count($ProjCrec)?>
    <?php $ContSost = count($ProjSost)?>
    <div class="company-content">
        <!-- <a href="" class="company-content-tower sustenance">
            </?= $this->Html->image('icons/torre-sostenimiento.svg') ?>
            <div class="number">
                <h3>10</h3>
            </div>
            <h2>Sostenimiento</h2>
        </a> -->
        <?php echo $this->Html->link(
          $this->Html->image('icons/torre-sostenimiento.svg').
          $this->Html->tag('div',$this->Html->tag('h3',$ContSost),array('class'=>'number')).
          $this->Html->tag('h2','Sostenimiento'),
          array('controller'=>'Projects','action'=>'projects'),
          array('escape' => false,'class'=>'company-content-tower sustenance'))?>

        <div class="company-content-data">
            <?= $this->Html->image('thor.png') ?>
            <div class="number">
                <h2><?=$ContSost + $ContCrec?></h2>
            </div>
            <h5>Proyectos</h5>
        </div>
        <!-- <a href="/portal-projects/projects" class="company-content-tower increase">
            <//?= $this->Html->image('icons/torre-crecimiento.svg') ?>
            <div class="number">
                <h3>15</h3>
            </div>
            <h2>Crecimiento</h2>
        </a> -->
        <?php echo $this->Html->link(
          $this->Html->image('icons/torre-crecimiento.svg').
          $this->Html->tag('div',$this->Html->tag('h3',$ContCrec),array('class'=>'number')).
          $this->Html->tag('h2','Crecimiento'),
          array('controller'=>'Projects','action'=>'projects'),
          array('escape' => false,'class'=>'company-content-tower increase'))?>
    </div>
</div>
