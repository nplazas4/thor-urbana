<?php
    // Breadcrumb
    $breadcrumb = [
        [ 'Inicio', 'home','Pages'],
        [ 'Portal Proyectos','index','PortalProjects'],
        [ 'Transmisión y Transporte','companies','PortalProjects'],
        [ 'Sucursal de Transmisión','company','PortalProjects' ],
        [ 'Crecimiento','projects','PortalProjects'],
    ];

     if (isset($indicators->SPI_EXTERNO)){
    $SPI_GLOBAL = 0 + $indicators->SPI_EXTERNO;
    $PRES_GLOBAL = 0 + $indicators->TOTAL_PRES;
    $EJECT_GLOBAL = 0 + $indicators->TOTAL_EJEC_USD;
    $GLOBAL_CPI = 0 + $indicators->CPI;
    $GLOBAL_PRES_ANUAL = 0 + $indicators->PRES_ANUAL;
    $GLOBAL_EJECT_ANUAL = 0 + $indicators->EJECT_ANUAL;
    }
    else
    {
      $SPI_GLOBAL = 0;
      $PRES_GLOBAL = 0;
      $EJECT_GLOBAL = 0;
      $GLOBAL_CPI = 0;
      $GLOBAL_PRES_ANUAL = 0;
      $GLOBAL_EJECT_ANUAL = 0;
    }
    // Indicadores
    $indicators = [
        [
            'name' => 'SPI',
            'value' => $SPI_GLOBAL,
            'icon' => 'show_chart',
            'color' => 'success',
        ],
        [
            'name' => 'Presupuesto Total USD ',
            'value' => '$ '.number_format($PRES_GLOBAL, 2,",",".").' MM',
            'icon' => 'language',
            'color' => 'accent',
        ],
        [
            'name' => 'Ejecutado Total USD',
            'value' => '$ '.$EJECT_GLOBAL.' MM',
            'icon' => 'language',
            'color' => 'tertiary',
        ],
        [
            'name' => 'CPI 2018',
            'value' => $GLOBAL_CPI.'%',
            'icon' => 'show_chart',
            'color' => 'error',
        ],
        [
            'name' => 'Presupuesto Anual USD',
            'value' => '$ '.$GLOBAL_PRES_ANUAL.' MM',
            'icon' => 'language',
            'color' => 'primary',
        ],
        [
            'name' => 'Ejecutado Anual USD',
            'value' => '$ '.$GLOBAL_EJECT_ANUAL.' MM',
            'icon' => 'language',
            'color' => 'primary',
        ],
    ];
?>
<div class="section projects">
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

    <sidebar class="projects-sidebar">
        <div class="projects-sidebar-img">
            <?= $this->Html->image('photos/energia.jpg') ?>
        </div>
        <div class="projects-sidebar-total">
            <h2><?=count($projects)?> Proyectos</h2>
        </div>
        <div class="projects-sidebar-info">
            <h2>Información general</h2>
            <p>Es la segunda empresa en transmisión de electricidad en Colombia, con una participación en el mercado del 12.5%. Cuenta con 1.504 km de circuitos a 230 kV activos en 17 subestaciones y la disponibilidad del sistema de transmisión a 31 de diciembre del 2015 fue del 99,93%, superior a la meta fijada por la CREG</p>
        </div>
        <div class="projects-sidebar-info">
            <h2>Fecha corte:</h2>
            <p>31 Octubre 2018</p>
        </div>
    </sidebar>

    <div class="projects-content">
        <div class="indicators row wrap">
            <?php foreach ($indicators as $indicator): ?>
            <div class="d-flex col s12 m6 l4 xl4">
            <div class="indicator <?= $indicator['color'] ?>">
                <h2><?= $indicator['name'] ?></h2>
                <h3><?= $indicator['value'] ?></h3>
                <i class="material-icons"><?= $indicator['icon'] ?></i>
            </div>
          </div>
            <?php endforeach; ?>
        </div>
        <div class="divider transparent mb-3"></div>
        <div class="row wrap">
            <?php foreach ($projects as $project): ?>
            <div class="d-flex col s12 m6 l4 xl3">
              <!--  -->
                <!-- <div class="sheet pointer" onclick="location.href='/veranodevs/veranodevs/projects/project/<//?=$project->id?>'"> -->
                <div class="sheet pointer" onclick="location.href='/thor-urbana/projects/project/<?=$project->id?>'">
                    <div class="sheet-line regional-text text-<?=$project->REGIONAL?>">
                        <div class="sheet-line-item"></div>
                        <div class="sheet-line-item"></div>
                        <div class="sheet-line-item"></div>
                    </div>
                    <div class="sheet-content pl-5">
                        <h2>﻿<?=$project->PROJECT_NAME?></h2>
                        <div class="data-box mt-auto">
                            <div class="data-box-circle phase
                                <?php
                                    if ($project->FASE == 1) {
                                        echo 'i';
                                    } elseif ($project->FASE == 2) {
                                        echo 'ii';
                                    } elseif ($project->FASE == 3) {
                                        echo 'iii';
                                    } elseif ($project->FASE == 4) {
                                        echo 'iv';
                                    } elseif ($project->FASE == 5) {
                                        echo 'v';
                                    }
                                ?>">
                                <h3>
                                    <?php
                                        if ($project->FASE == 1) {
                                            echo 'I';
                                        } elseif ($project->FASE == 2) {
                                            echo 'II';
                                        } elseif ($project->FASE == 3) {
                                            echo 'III';
                                        } elseif ($project->FASE == 4) {
                                            echo 'IV';
                                        } elseif ($project->FASE == 5) {
                                            echo 'V';
                                        }
                                    ?>
                                </h3>
                            </div>
                            <div class="data-box-content">
                                <span>Fase</span>
                            </div>
                        </div>
                        <?php $SPI = number_format($project->EXECUTED/$project->PLANNED, 2,'.','');?>
                        <div class="data-box">
                            <div class="data-box-circle
                                <?php
                                    if ($SPI >= 0.98) {
                                        echo 'primary';
                                    } elseif ($SPI < 0.98 && $SPI >= 0.9) {
                                        echo 'secondary';
                                    } elseif ($SPI < 0.9 && $SPI >= 0.8) {
                                        echo 'warning';
                                    } elseif ($SPI < 0.8) {
                                        echo 'error';
                                    }
                                ?>">
                                <h4><?=$SPI?></h4>
                            </div>
                            <div class="data-box-content">
                                <span>SPI</span>
                            </div>
                        </div>
                        <div class="data-box">
                            <div class="data-box-circle error">
                                <h5><?= $project->CPI_ANUAL ?>%</h5>
                            </div>
                            <div class="data-box-content">
                                <span>CPI Anual</span>
                            </div>
                        </div>
                        <div class="data-box">
                            <div class="data-box-circle tertiary">
                                <h5><?=$project->AC_BAC?>%</h5>
                            </div>
                            <div class="data-box-content">
                                <span>AC/BAC</span>
                            </div>
                        </div>
                        <div class="divider transparent"></div>
                        <div class="data-chip accent">
                            <h3>CAPEX Planeado (USD)</h3>
                            <h4><?=$project->CAPEX_PLANNED?> MM</h4>
                        </div>
                        <div class="data-chip secondary mb-0">
                            <h3>CAPEX Ejecutado (USD)</h3>
                            <h4><?=$project->CAPEX_EXECUTED?> MM</h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
