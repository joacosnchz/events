<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Recibos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Recibos
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $nro_recibo
     */
    private $nro_recibo;

    /**
     * @var \DateTime $fecha
     */
    private $fecha;

    /**
     * @var string $nombre
     */
    private $id_cliente;

    /**
     * @var integer $importe
     */
    private $importe;

    /**
     * @var string $concepto
     */
    private $concepto;

    /**
     * @var integer $total
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
     * Set nro_recibo
     *
     * @param integer $nroRecibo
     * @return Recibos
     */
    public function setNroRecibo($nroRecibo)
    {
        $this->nro_recibo = $nroRecibo;
    
        return $this;
    }

    /**
     * Get nro_recibo
     *
     * @return integer 
     */
    public function getNroRecibo()
    {
        return $this->nro_recibo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Recibos
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
     * Set importe
     *
     * @param string $importe
     * @return Recibos
     */
    public function setImporte($importe)
    {
        $this->importe = $importe;
    
        return $this;
    }

    /**
     * Get importe
     *
     * @return string 
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Recibos
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
     * Set total
     *
     * @param integer $total
     * @return Recibos
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

    /**
     * Set id_cliente
     *
     * @param \MediterraneoFM\MediterraneoFMBundle\Entity\Clientes $idCliente
     * @return Recibos
     */
    public function setIdCliente(\MediterraneoFM\MediterraneoFMBundle\Entity\Clientes $idCliente = null)
    {
        $this->id_cliente = $idCliente;
    
        return $this;
    }

    /**
     * Get id_cliente
     *
     * @return \MediterraneoFM\MediterraneoFMBundle\Entity\Clientes 
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function __toString() {
        return strval($this->id);
    }
}