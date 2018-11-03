<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liquidaciones
 */
class Liquidaciones
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fecha;

    /**
     * @var integer
     */
    private $idAgencia;

    /**
     * @var float
     */
    private $total;

    /* Atributos agregados para poder crear campos en el formulario con ellos */
    public $param;

    public $docs;
    /* FIN Atributos de formulario */


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setDocs($docs) {
        $this->docs = $docs;

        return $this;
    }

    public function getDocs() {
        return $this->docs;
    }

    public function setParam($param) {
        $this->param = $param;

        return $this;
    }

    public function getParam() {
        return $this->param;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Liquidaciones
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
     * Set idAgencia
     *
     * @param integer $idAgencia
     * @return Liquidaciones
     */
    public function setIdAgencia($idAgencia)
    {
        $this->idAgencia = $idAgencia;
    
        return $this;
    }

    /**
     * Get idAgencia
     *
     * @return integer 
     */
    public function getIdAgencia()
    {
        return $this->idAgencia;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Liquidaciones
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
