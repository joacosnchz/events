<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\CostoTarifas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CostoTarifas
{
    /**
     * @var integer $id_costotarifas
     */
    private $id_costotarifas;

    /**
     * @var integer $id_tarifa
     * 
     */
    private $id_tarifa;
    
    /**
     * @var integer $id_tarifa
     * 
     */
    private $id_tipo_mencion;

    /**
     * @var integer $duracion
     */
    private $duracion;

    /**
     * @var string $periodo
     */
    private $periodo;

    /**
     * @var integer $costo
     */
    private $costo;


    /**
     * Get id_costotarifas
     *
     * @return integer 
     */
    public function getIdCostoTarifas()
    {
        return $this->id_costotarifas;
    }

    /**
     * Set id_tarifa
     *
     * @param integer $idTarifa
     * @return CostoTarifas
     */
    public function setIdTarifa($idTarifa)
    {
        $this->id_tarifa = $idTarifa;
    
        return $this;
    }

    /**
     * Get id_tarifa
     *
     * @return integer 
     */
    public function getIdTarifa()
    {
        return $this->id_tarifa;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return CostoTarifas
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set periodo
     *
     * @param string $periodo
     * @return CostoTarifas
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    
        return $this;
    }

    /**
     * Get periodo
     *
     * @return string 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set costo
     *
     * @param integer $costo
     * @return CostoTarifas
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    
        return $this;
    }

    /**
     * Get costo
     *
     * @return integer 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set id_tipo_mencion
     *
     * @param $idTipoMencion
     * @return CostoTarifas
     */
    public function setIdTipoMencion($idTipoMencion = null)
    {
        $this->id_tipo_mencion = $idTipoMencion;
    
        return $this;
    }

    /**
     * Get id_tipo_mencion
     *
     * @return MediterraneoFM\MediterraneoFMBundle\Entity\Tarifas 
     */
    public function getIdTipoMencion()
    {
        return $this->id_tipo_mencion;
    }
    
    public function __toString() {
    	return strval($this->id_costotarifas);
    }
}