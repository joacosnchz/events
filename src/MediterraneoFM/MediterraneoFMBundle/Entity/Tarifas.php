<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Tarifas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tarifas
{
    /**
     * @var integer $id_tarifa
     * 
     */
    private $id_tarifa;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var \DateTime $fecha_desde
     */
    private $fecha_desde;

    /**
     * @var \DateTime $fecha_hasta
     */
    private $fecha_hasta;

    /**
     * @var integer $id_emisora
     */
    private $id_emisora;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Tarifas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fecha_desde
     *
     * @param \DateTime $fechaDesde
     * @return Tarifas
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
     * @return Tarifas
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
     * Set id_emisora
     *
     * @param integer $idEmisora
     * @return Tarifas
     */
    public function setIdEmisora($idEmisora)
    {
        $this->id_emisora = $idEmisora;
    
        return $this;
    }

    /**
     * Get id_emisora
     *
     * @return integer 
     */
    public function getIdEmisora()
    {
        return $this->id_emisora;
    }
    
    public function __toString() {
    	return strval($this->id_tarifa);
    }
}