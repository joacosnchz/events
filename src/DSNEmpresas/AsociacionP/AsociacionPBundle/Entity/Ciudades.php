<?php

namespace DSNEmpresas\AsociacionP\AsociacionPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ciudades
 */
class Ciudades
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $nombre;

    /**
     * @var integer
     */
    protected $idProvincia;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Ciudades
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
     * Set idProvincia
     *
     * @param integer $idProvincia
     * @return Ciudades
     */
    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia = $idProvincia;
    
        return $this;
    }

    /**
     * Get idProvincia
     *
     * @return integer 
     */
    public function getIdProvincia()
    {
        return $this->idProvincia;
    }

    public function __toString() {
        return strval($this->id);
    }
}
