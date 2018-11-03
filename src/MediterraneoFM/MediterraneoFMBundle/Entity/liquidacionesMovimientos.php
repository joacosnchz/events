<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * liquidacionesMovimientos
 */
class liquidacionesMovimientos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idOrdenpub;

    /**
     * @var integer
     */
    private $idLiquidacion;

    /**
     * @var float
     */
    private $porcentaje;

    /**
     * @var float
     */
    private $importeBase;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idOrdenpub
     *
     * @param integer $idOrdenpub
     * @return liquidacionesMovimientos
     */
    public function setIdOrdenpub($idOrdenpub)
    {
        $this->idOrdenpub = $idOrdenpub;
    
        return $this;
    }

    /**
     * Get idOrdenpub
     *
     * @return integer 
     */
    public function getIdOrdenpub()
    {
        return $this->idOrdenpub;
    }

    /**
     * Set idLiquidacion
     *
     * @param integer $idLiquidacion
     * @return liquidacionesMovimientos
     */
    public function setIdLiquidacion($idLiquidacion)
    {
        $this->idLiquidacion = $idLiquidacion;
    
        return $this;
    }

    /**
     * Get idLiquidacion
     *
     * @return integer 
     */
    public function getIdLiquidacion()
    {
        return $this->idLiquidacion;
    }

    /**
     * Set porcentaje
     *
     * @param float $porcentaje
     * @return liquidacionesMovimientos
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    
        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return float 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set importeBase
     *
     * @param float $importeBase
     * @return liquidacionesMovimientos
     */
    public function setImporteBase($importeBase)
    {
        $this->importeBase = $importeBase;
    
        return $this;
    }

    /**
     * Get importeBase
     *
     * @return float 
     */
    public function getImporteBase()
    {
        return $this->importeBase;
    }
}
