<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Grillas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Grillas
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $id_programa
     */
    private $id_programa;

    /**
     * @var integer $id_tipos_menciones
     */
    private $id_tipos_menciones;

    /**
     * @var integer $nro_salidas
     */
    private $nro_salidas;


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
     * Set id_programa
     *
     * @param integer $idPrograma
     * @return Grillas
     */
    public function setIdPrograma($idPrograma)
    {
        $this->id_programa = $idPrograma;
    
        return $this;
    }

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
     * Set id_tipos_menciones
     *
     * @param integer $idTiposMenciones
     * @return Grillas
     */
    public function setIdTiposMenciones($idTiposMenciones)
    {
        $this->id_tipos_menciones = $idTiposMenciones;
    
        return $this;
    }

    /**
     * Get id_tipos_menciones
     *
     * @return integer 
     */
    public function getIdTiposMenciones()
    {
        return $this->id_tipos_menciones;
    }

    /**
     * Set nro_salidas
     *
     * @param integer $nroSalidas
     * @return Grillas
     */
    public function setNroSalidas($nroSalidas)
    {
        $this->nro_salidas = $nroSalidas;
    
        return $this;
    }

    /**
     * Get nro_salidas
     *
     * @return integer 
     */
    public function getNroSalidas()
    {
        return $this->nro_salidas;
    }
}
