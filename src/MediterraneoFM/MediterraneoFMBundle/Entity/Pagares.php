<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagares
 */
class Pagares
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaEmision;

    /**
     * @var \DateTime
     */
    private $fechaCobro;

    /**
     * @var string
     */
    private $totalLetras;

    /**
     * @var integer
     */
    private $total;

    /**
     * @var integer
     */
    private $idOrdenpub;

    /**
     * @var integer
     */
    private $nroPagare;


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
     * @return Pagares
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
     * Set nroPagare
     *
     * @param integer $nroPagare
     * @return Pagares
     */
    public function setNroPagare($nroPagare)
    {
        $this->nroPagare = $nroPagare;
    
        return $this;
    }

    /**
     * Get nroPagare
     *
     * @return integer 
     */
    public function getNroPagare()
    {
        return $this->nroPagare;
    }

    /**
     * Set fechaEmision
     *
     * @param \DateTime $fechaEmision
     * @return Pagares
     */
    public function setFechaEmision($fechaEmision)
    {
        $this->fechaEmision = $fechaEmision;
    
        return $this;
    }

    /**
     * Get fechaEmision
     *
     * @return \DateTime 
     */
    public function getFechaEmision()
    {
        return $this->fechaEmision;
    }

    /**
     * Set fechaCobro
     *
     * @param \DateTime $fechaCobro
     * @return Pagares
     */
    public function setFechaCobro($fechaCobro)
    {
        $this->fechaCobro = $fechaCobro;
    
        return $this;
    }

    /**
     * Get fechaCobro
     *
     * @return \DateTime 
     */
    public function getFechaCobro()
    {
        return $this->fechaCobro;
    }

    /**
     * Set totalLetras
     *
     * @param string $totalLetras
     * @return Pagares
     */
    public function setTotalLetras($totalLetras)
    {
        $this->totalLetras = $totalLetras;
    
        return $this;
    }

    /**
     * Get totalLetras
     *
     * @return string 
     */
    public function getTotalLetras()
    {
        return $this->totalLetras;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Pagares
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
