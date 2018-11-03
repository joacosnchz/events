<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ctacteRecibos
 */
class ctacteRecibos
{
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MediterraneoFM\MediterraneoFMBundle\Entity\Recibos
     */
    private $idRecibo;

    /**
     * @var \MediterraneoFM\MediterraneoFMBundle\Entity\CtasCtesClientes
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
     * Set idRecibo
     *
     * @param \MediterraneoFM\MediterraneoFMBundle\Entity\Recibos $idRecibo
     * @return ctacteRecibos
     */
    public function setIdRecibo(\MediterraneoFM\MediterraneoFMBundle\Entity\Recibos $idRecibo = null)
    {
        $this->idRecibo = $idRecibo;
    
        return $this;
    }

    /**
     * Get idRecibo
     *
     * @return \MediterraneoFM\MediterraneoFMBundle\Entity\Recibos 
     */
    public function getIdRecibo()
    {
        return $this->idRecibo;
    }

    /**
     * Set idCtasCtesC
     *
     * @param \MediterraneoFM\MediterraneoFMBundle\Entity\CtasCtesClientes $idCtasCtesC
     * @return ctacteRecibos
     */
    public function setIdCtasCtesC(\MediterraneoFM\MediterraneoFMBundle\Entity\CtasCtesClientes $idCtasCtesC = null)
    {
        $this->idCtasCtesC = $idCtasCtesC;
    
        return $this;
    }

    /**
     * Get idCtasCtesC
     *
     * @return \MediterraneoFM\MediterraneoFMBundle\Entity\CtasCtesClientes 
     */
    public function getIdCtasCtesC()
    {
        return $this->idCtasCtesC;
    }
}