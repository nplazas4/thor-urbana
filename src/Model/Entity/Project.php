<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $ID_PROJECT
 * @property string $PROJECT_NAME
 * @property string $Proj_Obj
 * @property string $DESCRIPTION
 * @property float $PLANNED
 * @property float $EXECUTED
 * @property float $AC
 * @property float $PV
 * @property float $CAPEX_PLANNED
 * @property float $CAPEX_EXECUTED
 * @property string $FASE
 * @property string $REGIONAL
 * @property string $ALCANCE
 * @property string $SOLICITUD
 * @property int $DISTANCIA
 * @property int $LINEA_TRANS
 * @property \Cake\I18n\FrozenDate $FOPO
 * @property \Cake\I18n\FrozenDate $FEPO
 * @property \Cake\I18n\FrozenDate $ADJUDICACION
 * @property \Cake\I18n\FrozenDate $APROBACION
 * @property int $TORRE
 * @property int $NUM_SUBESTACION
 * @property float $CPI_ANUAL
 * @property float $AC_BAC
 * @property float $AC_PPTO
 * @property float $PROJ_TOTAL_PRES
 * @property float $TOTAL_FORECAST
 * @property float $PROJ_AC
 * @property float $PRES_PROJ
 * @property float $FORECAST_PROJ
 * @property string $CATEGORY
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ID_PROJECT' => true,
        'PROJECT_NAME' => true,
        'Proj_Obj' => true,
        'DESCRIPTION' => true,
        'PLANNED' => true,
        'EXECUTED' => true,
        'AC' => true,
        'PV' => true,
        'CAPEX_PLANNED' => true,
        'CAPEX_EXECUTED' => true,
        'FASE' => true,
        'REGIONAL' => true,
        'ALCANCE' => true,
        'SOLICITUD' => true,
        'DISTANCIA' => true,
        'LINEA_TRANS' => true,
        'FOPO' => true,
        'FEPO' => true,
        'ADJUDICACION' => true,
        'APROBACION' => true,
        'TORRE' => true,
        'NUM_SUBESTACION' => true,
        'CPI_ANUAL' => true,
        'AC_BAC' => true,
        'AC_PPTO' => true,
        'PROJ_TOTAL_PRES' => true,
        'TOTAL_FORECAST' => true,
        'PROJ_AC' => true,
        'PRES_PROJ' => true,
        'FORECAST_PROJ' => true,
        'CATEGORY' => true
    ];
}
