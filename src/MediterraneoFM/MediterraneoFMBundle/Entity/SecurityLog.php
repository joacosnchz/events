<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecurityLog
 */
class SecurityLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var boolean
     */
    private $error;

    /**
     * @var boolean
     */
    private $block;

    /**
     * @var \DateTime
     */
    private $hora;

    /**
     * @var string
     */
    private $ip_remota;

    /**
     * @var integer
     */
    private $contador;

    /**
     * @var integer
     */
    protected $dia;

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
     * Set username
     *
     * @param string $username
     * @return SecurityLog
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set error
     *
     * @param boolean $error
     * @return SecurityLog
     */
    public function setError($error)
    {
        $this->error = $error;
    
        return $this;
    }

    /**
     * Get error
     *
     * @return boolean 
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set block
     *
     * @param boolean $block
     * @return SecurityLog
     */
    public function setBlock($block)
    {
        $this->block = $block;
    
        return $this;
    }

    /**
     * Get block
     *
     * @return boolean 
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set ip_remota
     *
     * @param string $ipRemota
     * @return SecurityLog
     */
    public function setIpRemota($ipRemota)
    {
        $this->ip_remota = $ipRemota;
    
        return $this;
    }

    /**
     * Get ip_remota
     *
     * @return string 
     */
    public function getIpRemota()
    {
        return $this->ip_remota;
    }

    /**
     * Set contador
     *
     * @param integer $contador
     * @return SecurityLog
     */
    public function setContador($contador)
    {
        $this->contador = $contador;
    
        return $this;
    }

    /**
     * Get contador
     *
     * @return integer 
     */
    public function getContador()
    {
        return $this->contador;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return SecurityLog
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    
        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set dia
     *
     * @param \DateTime $dia
     * @return SecurityLog
     */
    public function setDia($dia)
    {
        $this->dia = $dia;
    
        return $this;
    }

    /**
     * Get dia
     *
     * @return \DateTime 
     */
    public function getDia()
    {
        return $this->dia;
    }
}