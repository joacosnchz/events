<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\TiposMenciones
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TiposMenciones
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @var integer $nro_menciones
     */
    private $nro_menciones;


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
     * Set nro_menciones
     *
     * @param integer $nroMenciones
     * @return TiposMenciones
     */
    public function setNroMenciones($nroMenciones)
    {
        $this->nro_menciones = $nroMenciones;
    
        return $this;
    }

    /**
     * Get nro_menciones
     *
     * @return integer 
     */
    public function getNroMenciones()
    {
        return $this->nro_menciones;
    }
}
