<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Emisoras
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Emisoras
{
    /**
     * @var integer $id_emisora
     */
    private $id_emisora;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $direccion
     */
    private $direccion;

    /**
     * @var integer $telefono_comercial
     */
    private $telefono_comercial;

    /**
     * @var string $id_localidad
     */
    private $id_ciudad;

    /**
     * Get id_emisora
     *
     * @return integer 
     */
    public function getIdEmisora()
    {
        return $this->id_emisora;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono_comercial
     *
     * @param integer $telefonoComercial
     */
    public function setTelefonoComercial($telefonoComercial)
    {
        $this->telefono_comercial = $telefonoComercial;
    }

    /**
     * Get telefono_comercial
     *
     * @return integer 
     */
    public function getTelefonoComercial()
    {
        return $this->telefono_comercial;
    }

    /**
     * Set id_ciudad
     *
     * @param string $idCiudad
     */
    public function setIdCiudad($idCiudad)
    {
        $this->id_ciudad = $idCiudad;
    }

    /**
     * Get id_ciudad
     *
     * @return string 
     */
    public function getIdCiudad()
    {
        return $this->id_ciudad;
    }
    
    public function __toString() {
    	return strval($this->id_emisora);
    }
}