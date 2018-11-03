<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Responsables
 *
 */
class Responsables implements UserInterface, \Serializable
{
    /**
     * @var integer $id_responsable
     */
    private $id_responsable;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $apellido
     */
    private $apellido;

    /**
     * @var string $direccion
     */
    private $direccion;

    /**
     * @var string $id_ciudad
     */
    private $id_ciudad;

    /**
     * @var integer $telefono_particular
     */
    private $telefono_particular;

    /**
     * @var integer $telefono_comercial
     */
    private $telefono_comercial;

    /**
     * @var string $celular
     */
    private $celular;

    /**
     * @var string $email
     */
    private $email;
    
    /**
     * @var string $username
     */
    private $username;
    
    /**
     * @var string $password
     */
    private $password;
    
    /**
     * @var string $salt
     */
    private $salt;
    
    /**
     * @var boolean $is_active
     */
    private $is_active;
    
    /**
     * @var integer $id_agencia
     */
    private $id_agencia;
    
    /**
     * @var string $roles
     */
    private $roles;

    /**
     * @var boolean $isLogged
     */
    private $isLogged;

    /**
     * @var time $loggedTime
     */
    private $loggedTime;
    
    public function __construct() {
        $this->roles = 'ROLE_USER';
        $this->salt = md5(uniqid(null, true));
        $this->isLogged = false;
    }
    
    /**
     * Get id_responsable
     *
     * @return integer 
     */
    public function getIdResponsable()
    {
        return $this->id_responsable;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Responsables
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
     * Set apellido
     *
     * @param string $apellido
     * @return Responsables
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
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
     * Set direccion
     *
     * @param string $direccion
     * @return Responsables
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
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
     * Set id_ciudad
     *
     * @param string $idCiudad
     * @return Responsables
     */
    public function setIdCiudad($idCiudad)
    {
        $this->id_ciudad = $idCiudad;
    
        return $this;
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

    /**
     * Set telefono_particular
     *
     * @param integer $telefonoParticular
     * @return Responsables
     */
    public function setTelefonoParticular($telefonoParticular)
    {
        $this->telefono_particular = $telefonoParticular;
    
        return $this;
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
     * Set telefono_comercial
     *
     * @param integer $telefonoComercial
     * @return Responsables
     */
    public function setTelefonoComercial($telefonoComercial)
    {
        $this->telefono_comercial = $telefonoComercial;
    
        return $this;
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
     * Set celular
     *
     * @param string $celular
     * @return Responsables
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    
        return $this;
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
     * Set email
     *
     * @param string $email
     * @return Responsables
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
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
     * Set username
     *
     * @param string $username
     * @return Responsables
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
     * Set password
     *
     * @param string $password
     * @return Responsables
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Responsables
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Responsables
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

    /**
     * Set roles
     *
     * @param string $roles
     * @return Responsables
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    
        return $this;
    }
    
    /**
     * Get roles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRoles()
    {
        return array($this->roles);
    }
    
    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user) {
        return array($this->username => $user->getUsername(), $this->password => $user->getPassword());
    }
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id_responsable,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id_responsable,
        ) = unserialize($serialized);
    }

    /**
     * Set id_agencia
     *
     * @param integer $idAgencia
     * @return Responsables
     */
    public function setIdAgencia($idAgencia)
    {
        $this->id_agencia = $idAgencia;
    
        return $this;
    }

    /**
     * Get id_agencia
     *
     * @return integer 
     */
    public function getIdAgencia()
    {
        return $this->id_agencia;
    }
    
    public function __toString() {
    	return strval($this->id_responsable);
    }

    /**
     * Set isLogged
     *
     * @param boolean $isLogged
     * @return Responsables
     */
    public function setIsLogged($isLogged)
    {
        $this->isLogged = $isLogged;
    
        return $this;
    }

    /**
     * Get isLogged
     *
     * @return boolean 
     */
    public function getIsLogged()
    {
        return $this->isLogged;
    }

    /**
     * Set loggedTime
     *
     * @param \DateTime $loggedTime
     * @return Responsables
     */
    public function setLoggedTime($loggedTime)
    {
        $this->loggedTime = $loggedTime;

        return $this;
    }

    /**
     * Get loggedTime
     *
     * @return \DateTime 
     */
    public function getLoggedTime()
    {
        return $this->loggedTime;
    }
}
