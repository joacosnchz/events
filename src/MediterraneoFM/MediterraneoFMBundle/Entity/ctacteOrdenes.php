<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ctacte_ordenes
 */
class ctacteOrdenes
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
    private $idCtasCtesC;


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
     * @return ctacte_ordenes
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
     * Set idCtasCtesC
     *
     * @param integer $idCtasCtesC
     * @return ctacte_ordenes
     */
    public function setIdCtasCtesC($idCtasCtesC)
    {
        $this->idCtasCtesC = $idCtasCtesC;
    
        return $this;
    }

    /**
     * Get idCtasCtesC
     *
     * @return integer 
     */
    public function getIdCtasCtesC()
    {
        return $this->idCtasCtesC;
    }
}
