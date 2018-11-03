<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ordenesAnuladas
 */
class ordenesAnuladas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idOrdenPub;

    /**
     * @var string
     */
    private $motivoAnula;


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
     * Set idOrdenPub
     *
     * @param integer $idOrdenPub
     * @return ordenesAnuladas
     */
    public function setIdOrdenPub($idOrdenPub)
    {
        $this->idOrdenPub = $idOrdenPub;

        return $this;
    }

    /**
     * Get idOrdenPub
     *
     * @return integer 
     */
    public function getIdOrdenPub()
    {
        return $this->idOrdenPub;
    }

    /**
     * Set motivoAnula
     *
     * @param string $motivoAnula
     * @return ordenesAnuladas
     */
    public function setMotivoAnula($motivoAnula)
    {
        $this->motivoAnula = $motivoAnula;

        return $this;
    }

    /**
     * Get motivoAnula
     *
     * @return string 
     */
    public function getMotivoAnula()
    {
        return $this->motivoAnula;
    }
}
