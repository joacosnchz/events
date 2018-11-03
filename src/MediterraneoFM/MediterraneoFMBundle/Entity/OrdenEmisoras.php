<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\OrdenEmisoras
 *
 * @ORM\Table(name="orden_emisoras")
 * @ORM\Entity
 */
class OrdenEmisoras
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
     * @var integer $id_emisora
     */
    private $id_emisora;


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
     * @return OrdenEmisoras
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
     * Set id_emisora
     *
     * @param integer $idEmisora
     * @return OrdenEmisoras
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
}
