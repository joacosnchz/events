<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\OrdenTarifas
 *
 * @ORM\Table(name="orden_tarifas")
 * @ORM\Entity
 */
class OrdenTarifas
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $id_ordenpub
     */
    private $id_ordenpub;

    /**
     * @var integer $id_costotarifas
     */
    private $id_costotarifas;
    
    /**
     * @var DateTime $fecha_desde
     * 
     */
    private $fecha_desde;
    
    /**
     * @var DateTime $fecha_hasta
     * 
     */
    private $fecha_hasta;
    
    /**
     * @var integer $descuento
     * 
     */
    private $descuento;
    
    /**
     * @var integer $recargo
     * 
     */
    private $recargo;
    
    /**
     * @var integer $neto
     * 
     */
    private $neto;
    
    /**
     * @var integer $total
     * 
     */
    private $total;

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
     * Set id_ordenpub
     *
     * @param integer $idOrdenpub
     * @return orden_tarifas
     */
    public function setIdOrdenpub($idOrdenpub)
    {
        $this->id_ordenpub = $idOrdenpub;
    
        return $this;
    }

    /**
     * Get id_ordenpub
     *
     * @return integer 
     */
    public function getIdOrdenpub()
    {
        return $this->id_ordenpub;
    }

    /**
     * Set id_costotarifas
     *
     * @param MediterraneoFM\MediterraneoFMBundle\Entity\CostoTarifas $idCostotarifas
     * @return orden_tarifas
     */
    public function setIdCostotarifas($idCostotarifas)
    {
        $this->id_costotarifas = $idCostotarifas;
    
        return $this;
    }

    /**
     * Get id_costotarifas
     *
     * @return MediterraneoFM\MediterraneoFMBundle\Entity\CostoTarifas 
     */
    public function getIdCostotarifas()
    {
        return $this->id_costotarifas;
    }

    /**
     * Set fecha_desde
     *
     * @param \DateTime $fechaDesde
     * @return OrdenTarifas
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fecha_desde = $fechaDesde;
    
        return $this;
    }

    /**
     * Get fecha_desde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fecha_desde;
    }

    /**
     * Set fecha_hasta
     *
     * @param \DateTime $fechaHasta
     * @return OrdenTarifas
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fecha_hasta = $fechaHasta;
    
        return $this;
    }

    /**
     * Get fecha_hasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fecha_hasta;
    }

    /**
     * Set descuento
     *
     * @param integer $descuento
     * @return OrdenTarifas
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    
        return $this;
    }

    /**
     * Get descuento
     *
     * @return integer 
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Set recargo
     *
     * @param integer $recargo
     * @return OrdenTarifas
     */
    public function setRecargo($recargo)
    {
        $this->recargo = $recargo;
    
        return $this;
    }

    /**
     * Get recargo
     *
     * @return integer 
     */
    public function getRecargo()
    {
        return $this->recargo;
    }

    /**
     * Set neto
     *
     * @param integer $neto
     * @return OrdenTarifas
     */
    public function setNeto($neto)
    {
        $this->neto = $neto;
    
        return $this;
    }

    /**
     * Get neto
     *
     * @return integer 
     */
    public function getNeto()
    {
        return $this->neto;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return OrdenTarifas
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }
}