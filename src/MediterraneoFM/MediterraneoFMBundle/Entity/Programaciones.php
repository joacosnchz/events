<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Programaciones
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Programaciones
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $id_emisora
     */
    private $id_emisora;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var boolean $is_active
     */
    private $is_active;


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
     * Set id_emisora
     *
     * @param string $idEmisora
     * @return Programaciones
     */
    public function setIdEmisora($idEmisora)
    {
        $this->id_emisora = $idEmisora;
    
        return $this;
    }

    /**
     * Get id_emisora
     *
     * @return string 
     */
    public function getIdEmisora()
    {
        return $this->id_emisora;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Programaciones
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Programaciones
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
    
        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }
}
