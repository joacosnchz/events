<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposDocumentos
 */
class TiposDocumentos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipoMovimiento;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $leyenda;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function get($property) {
        return $this->$property;
    }

    /**
     * Set tipoMovimiento
     *
     * @param string $tipoMovimiento
     * @return TiposDocumentos
     */
    public function setTipoMovimiento($tipoMovimiento)
    {
        $this->tipoMovimiento = $tipoMovimiento;
    
        return $this;
    }

    /**
     * Get tipoMovimiento
     *
     * @return string 
     */
    public function getTipoMovimiento()
    {
        return $this->tipoMovimiento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return TiposDocumentos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set leyenda
     *
     * @param string $leyenda
     * @return TiposDocumentos
     */
    public function setLeyenda($leyenda)
    {
        $this->leyenda = $leyenda;
    
        return $this;
    }

    /**
     * Get leyenda
     *
     * @return string 
     */
    public function getLeyenda()
    {
        return $this->leyenda;
    }
}