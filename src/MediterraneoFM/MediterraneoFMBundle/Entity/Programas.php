<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Programas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Programas
{
    /**
     * @var integer $id_programa
     */
    private $id_programa;

    /**
     * @var string $nombre
     */
    private $nombre;
    
    /**
     * @var string $id_mencion_programa
     * 
     */
    private $id_programacion;

    /**
     * @var \DateTime $duracion_desde
     */
    private $duracion_desde;

    /**
     * @var \DateTime $duracion_hasta
     */
    private $duracion_hasta;
    
     /**
     * Get id_programa
     *
     * @return integer 
     */
    public function getIdPrograma()
    {
        return $this->id_programa;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Programas
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
     * Set duracion_desde
     *
     * @param \DateTime $duracionDesde
     * @return Programas
     */
    public function setDuracionDesde($duracionDesde)
    {
        $this->duracion_desde = $duracionDesde;
    
        return $this;
    }

    /**
     * Get duracion_desde
     *
     * @return \DateTime 
     */
    public function getDuracionDesde()
    {
        return $this->duracion_desde;
    }

    /**
     * Set duracion_hasta
     *
     * @param \DateTime $duracionHasta
     * @return Programas
     */
    public function setDuracionHasta($duracionHasta)
    {
        $this->duracion_hasta = $duracionHasta;
    
        return $this;
    }

    /**
     * Get duracion_hasta
     *
     * @return \DateTime 
     */
    public function getDuracionHasta()
    {
        return $this->duracion_hasta;
    }
    
    public function __toString() {
        return strval($this->id_programa);
    }

    /**
     * Set id_programacion
     *
     * @param integer $idProgramacion
     * @return Programas
     */
    public function setIdProgramacion($idProgramacion)
    {
        $this->id_programacion = $idProgramacion;
    
        return $this;
    }

    /**
     * Get id_programacion
     *
     * @return integer 
     */
    public function getIdProgramacion()
    {
        return $this->id_programacion;
    }
}