<?php

namespace DSNEmpresas\AsociacionP\AsociacionPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coordenadas
 */
class Coordenadas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $atributo;

    /**
     * @var float
     */
    private $cordX;

    /**
     * @var float
     */
    private $cordY;

    /**
     * @var string
     */
    private $fuente;

    /**
     * @var integer
     */
    private $tamano;

    /**
     * @var boolean
     */
    private $negrita;

    /**
     * @var boolean
     */
    private $cursiva;


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
     * Set atributo
     *
     * @param string $atributo
     * @return Coordenadas
     */
    public function setAtributo($atributo)
    {
        $this->atributo = $atributo;

        return $this;
    }

    /**
     * Get atributo
     *
     * @return string 
     */
    public function getAtributo()
    {
        return $this->atributo;
    }

    /**
     * Set cordX
     *
     * @param float $cordX
     * @return Coordenadas
     */
    public function setCordX($cordX)
    {
        $this->cordX = $cordX;

        return $this;
    }

    /**
     * Get cordX
     *
     * @return float 
     */
    public function getCordX()
    {
        return $this->cordX;
    }

    /**
     * Set cordY
     *
     * @param float $cordY
     * @return Coordenadas
     */
    public function setCordY($cordY)
    {
        $this->cordY = $cordY;

        return $this;
    }

    /**
     * Get cordY
     *
     * @return float 
     */
    public function getCordY()
    {
        return $this->cordY;
    }

    /**
     * Set fuente
     *
     * @param string $fuente
     * @return Coordenadas
     */
    public function setFuente($fuente)
    {
        $this->fuente = $fuente;

        return $this;
    }

    /**
     * Get fuente
     *
     * @return string 
     */
    public function getFuente()
    {
        return $this->fuente;
    }

    /**
     * Set tamano
     *
     * @param integer $tamano
     * @return Coordenadas
     */
    public function setTamano($tamano)
    {
        $this->tamano = $tamano;

        return $this;
    }

    /**
     * Get tamano
     *
     * @return integer 
     */
    public function getTamano()
    {
        return $this->tamano;
    }

    /**
     * Set negrita
     *
     * @param boolean $negrita
     * @return Coordenadas
     */
    public function setNegrita($negrita)
    {
        $this->negrita = $negrita;

        return $this;
    }

    /**
     * Get negrita
     *
     * @return boolean 
     */
    public function getNegrita()
    {
        return $this->negrita;
    }

    /**
     * Set cursiva
     *
     * @param boolean $cursiva
     * @return Coordenadas
     */
    public function setCursiva($cursiva)
    {
        $this->cursiva = $cursiva;

        return $this;
    }

    /**
     * Get cursiva
     *
     * @return boolean 
     */
    public function getCursiva()
    {
        return $this->cursiva;
    }
}
