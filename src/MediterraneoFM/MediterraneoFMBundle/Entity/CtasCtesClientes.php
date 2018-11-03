<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtasCtesClientes
 */
class CtasCtesClientes
{
    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var date
     */
    private $fecha;

    /**
     * @var integer
     */
    private $idOrdenpub;

    /**
     * @var integer
     */
    private $idCliente;

    /**
     * @var string
     */
    private $concepto;

    /**
     * @var float
     */
    private $debe;

    /**
     * @var float
     */
    private $haber;
	
	/**
     * @var integer
     */
    private $idTipoDocumento;


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
     * Set idCliente
     *
     * @param integer $idCliente
     * @return CtasCtesClientes
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    
        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return CtasCtesClientes
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;
    
        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set debe
     *
     * @param float $debe
     * @return CtasCtesClientes
     */
    public function setDebe($debe)
    {
        $this->debe = $debe;
    
        return $this;
    }

    /**
     * Get debe
     *
     * @return float 
     */
    public function getDebe()
    {
        return $this->debe;
    }

    /**
     * Set haber
     *
     * @param float $haber
     * @return CtasCtesClientes
     */
    public function setHaber($haber)
    {
        $this->haber = $haber;
    
        return $this;
    }

    /**
     * Get haber
     *
     * @return float 
     */
    public function getHaber()
    {
        return $this->haber;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return CtasCtesClientes
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idTipoDocumento
     *
     * @param \MediterraneoFM\MediterraneoFMBundle\Entity\TiposDocumentos $idTipoDocumento
     * @return CtasCtesClientes
     */
    public function setIdTipoDocumento(\MediterraneoFM\MediterraneoFMBundle\Entity\TiposDocumentos $idTipoDocumento = null)
    {
        $this->idTipoDocumento = $idTipoDocumento;
    
        return $this;
    }

    /**
     * Get idTipoDocumento
     *
     * @return \MediterraneoFM\MediterraneoFMBundle\Entity\TiposDocumentos 
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }
}