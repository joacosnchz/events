<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Clientes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Clientes
{
    /**
     * @var integer $id_cliente
     */
    private $id_cliente;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $apellido
     */
    private $apellido;
    
    private $nomapp;
    
    private $nomappraziva;

    /**
     * @var string $direccion
     */
    private $direccion;

    /**
     * @var string $razon_social
     */
    private $razon_social;

    /**
     * @var string $comercio
     */
    private $comercio;

    /** 
     * @var integer $dni
     */
    private $dni;

    /**
     * @var integer $cuit
     */
    private $cuit;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var integer $telefono_comercial
     */
    private $telefono_comercial;

    /**
     * @var integer $telefono_particular
     */
    private $telefono_particular;

    /**
     * @var string $celular
     */
    private $celular;
    
    /**
     * @var boolean $isActive
     */
    private $isActive;
    
    /**
     * @var string $iva
     */
    private $iva;
    
    /**
     * @var integer $id_agencia
     */
    private $id_agencia;


    /**
     * Get id_cliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
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
     * Set apellido
     *
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }
    
    /**
     * Set nomapp
     *
     * @param string $nomapp
     */
    public function setNomApp($nomapp)
    {
        $this->nomapp = $nomapp;
    }

    /**
     * Get nomapp
     *
     * @return string 
     */
    public function getNomApp()
    {
        return $this->nombre . ', ' . $this->apellido;
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
     * Set razon_social
     *
     * @param string $razonSocial
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razon_social = $razonSocial;
    }

    /**
     * Get razon_social
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * Set comercio
     *
     * @param string $comercio
     */
    public function setComercio($comercio)
    {
        $this->comercio = $comercio;
    }

    /**
     * Get comercio
     *
     * @return string 
     */
    public function getComercio()
    {
        return $this->comercio;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * Get dni
     *
     * @return integer 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set cuit
     *
     * @param integer $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    }

    /**
     * Get cuit
     *
     * @return integer 
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set telefono_particular
     *
     * @param integer $telefonoParticular
     */
    public function setTelefonoParticular($telefonoParticular)
    {
        $this->telefono_particular = $telefonoParticular;
    }

    /**
     * Get telefono_particular
     *
     * @return integer 
     */
    public function getTelefonoParticular()
    {
        return $this->telefono_particular;
    }

    /**
     * Set celular
     *
     * @param string $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }
    
    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Responsables
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set iva
     *
     * @param string $iva
     * @return Clientes
     */
    public function setIva($iva)
    {
        $this->iva = $iva;
    
        return $this;
    }

    /**
     * Get iva
     *
     * @return string 
     */
    public function getIva()
    {
        return $this->iva;
    }
    
    /**
     * Set nomappraziva
     *
     * @param string $nomappraziva
     */
    public function setNomAppRazIva($nomappraziva)
    {
        $this->nomappraziva = $nomappraziva;
    }

    /**
     * Get nomappraziva
     *
     * @return string 
     */
    public function getNomAppRazIva()
    {
        return $this->comercio;
    }

    /**
     * Set id_agencia
     *
     * @param MediterraneoFM\MediterraneoFMBundle\Entity\Agencias $idAgencia
     * @return Clientes
     */
    public function setIdAgencia(\MediterraneoFM\MediterraneoFMBundle\Entity\Agencias $idAgencia = null)
    {
        $this->id_agencia = $idAgencia;
    
        return $this;
    }

    /**
     * Get id_agencia
     *
     * @return MediterraneoFM\MediterraneoFMBundle\Entity\Agencias 
     */
    public function getIdAgencia()
    {
        return $this->id_agencia;
    }
    
    public function __toString() {
    	return strval($this->id_cliente);
    }
}