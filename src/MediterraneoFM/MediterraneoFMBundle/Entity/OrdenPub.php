<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\OrdenPub
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class OrdenPub
{
    /**
     * @var integer $id_ordenpub
     */
    protected $id_ordenpub;

    /**
     * @var integer $nro_ordenpub
     * 
     */
    private $nro_ordenpub;

    /**
     * @var date $fecha
     */
    private $fecha;

    /**
     * @var integer $id_cliente
     */
    private $id_cliente;

    /**
     * @var string $texto_publicidad
     */
    private $texto_publicidad;
    
    /**
     * @var integer $id_tarifa
     */
    private $id_tarifa;

    private $id_emisora;
    
    private $fecha_desde;
    
    private $fecha_hasta;

    private $horario;

    /**
     * @var string $observaciones
     */
    private $observaciones;

    /**
     * @var integer $id_agencia
     */
    private $id_agencia;
    
    /**
     * @var integer $estado
     */
    private $estado;
    
    /**
     * @var integer $total
     */
    private $total;

    /**
     * @var boolean $pagado
     */
    protected $pagado;

    /**
     * @var boolean $liquidado
     */
    protected $liquidado;
    
    public function __construct() {
        $this->estado = 1;
        $this->pagado = false;
        $this->liquidado = false;
    }    

    /**
     * Get id_ordenpub
     *
     * @return integer 
     */
    public function getIdOrdenPub()
    {
        return $this->id_ordenpub;
    }

    /**
     * Set nro_ordenpub
     *
     * @param integer $nroOrdenpub
     * @return OrdenPub
     */
    public function setNroOrdenpub($nroOrdenpub)
    {
        $this->nro_ordenpub = $nroOrdenpub;
    
        return $this;
    }

    /**
     * Get nro_ordenpub
     *
     * @return integer 
     */
    public function getNroOrdenpub()
    {
        return $this->nro_ordenpub;
    }

    /**
     * Set id_cliente
     *
     * @param integer $idCliente
     * @return OrdenPub
     */
    public function setIdCliente($idCliente)
    {
        $this->id_cliente = $idCliente;
    
        return $this;
    }

    /**
     * Get id_cliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set texto_publicidad
     *
     * @param string $textoPublicidad
     * @return OrdenPub
     */
    public function setTextoPublicidad($textoPublicidad)
    {
        $this->texto_publicidad = $textoPublicidad;
    
        return $this;
    }

    /**
     * Get texto_publicidad
     *
     * @return string 
     */
    public function getTextoPublicidad()
    {
        return $this->texto_publicidad;
    }

    /**
     * Set id_tarifa
     *
     * @param string $idTarifa
     * @return OrdenPub
     */
    public function setIdTarifa($idTarifa)
    {
        $this->id_tarifa = $idTarifa;
    
        return $this;
    }

    /**
     * Get id_tarifa
     *
     * @return string
     */
    public function getIdTarifa()
    {
        return $this->id_tarifa;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return OrdenPub
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set id_agencia
     *
     * @param integer $idAgencia
     * @return OrdenPub
     */
    public function setIdAgencia($idAgencia)
    {
        $this->id_agencia = $idAgencia;
    
        return $this;
    }

    /**
     * Get id_agencia
     *
     * @return integer 
     */
    public function getIdAgencia()
    {
        return $this->id_agencia;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return OrdenPub
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
     * Set estado
     *
     * @param integer $estado
     * @return OrdenPub
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pagado
     *
     * @param boolean $pagado
     * @return OrdenPub
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
    
        return $this;
    }

    /**
     * Get pagado
     *
     * @return boolean 
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return OrdenPub
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
     * Set liquidado
     *
     * @param boolean $liquidado
     * @return OrdenPub
     */
    public function setLiquidado($liquidado)
    {
        $this->liquidado = $liquidado;
    
        return $this;
    }

    /**
     * Get liquidado
     *
     * @return boolean 
     */
    public function getLiquidado()
    {
        return $this->liquidado;
    }

    public function __toString() {
        return strval($this->id_ordenpub);
    }
}