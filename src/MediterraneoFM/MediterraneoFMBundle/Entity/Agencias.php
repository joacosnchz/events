<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Agencias
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Agencias
{
    /**
     * @var integer $id_agencia
     */
    protected $id_agencia;

    /**
     * @var string $nombre
     */
    protected $nombre;

    /**
     * @var string $apellido
     */
    protected $apellido;

    /**
     * @var string $direccion
     */
    protected $direccion;

    /**
     * @var string $id_ciudad
     * 
     */
    protected $id_ciudad;

    /**
     * @var integer $telefono_particular
     */
    protected $telefono_particular;

    /**
     * @var integer $telefono_comercial
     */
    protected $telefono_comercial;

    /**
     * @var string $celular
     */
    protected $celular;

    /**
     * @var string $email
     */
    protected $email;
    
    /**
     * @var boolean $isActive
     */
    protected $isActive;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    protected $imagen;

    /**
     * @Assert\File(maxSize="6000000")
     */
    protected $membrete;
    
    /**
     * @var string $path
     */
    protected $path;

    /**
     * @var string $pathMembrete
     */
    protected $pathMembrete;
    
    /**
     * @var date $mail
     */
    protected $mail;

    /**
     * @var integer $idComision
     */
    protected $idComision;

    /**
     * @var string $razonSocial
     */
    protected $razonSocial;

    protected $nomapp;


    /**
     * Get id_agencia
     *
     * @return integer 
     */
    public function getIdAgencia()
    {
        return $this->id_agencia;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Agencias
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
     * @return Agencias
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
     * @return Agencias
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
     * @return Agencias
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
     * @return Agencias
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
     * @return Agencias
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
     * @return Agencias
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
     * @return Agencias
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
     * Sets imagen.
     *
     * @param UploadedFile $imagen
     */
    public function setMembrete(UploadedFile $membrete = null)
    {
        $this->membrete = $membrete;
    }

    /**
     * Get imagen.
     *
     * @return UploadedFile
     */
    public function getMembrete()
    {
        return $this->membrete;
    }

    public function getAbsolutePathMembrete()
    {
        return null === $this->pathMembrete
            ? null
            : $this->getUploadRootDir().'/'.$this->pathMembrete;
    }

    public function getWebPathMembrete()
    {
        return null === $this->pathMembrete
            ? null
            : $this->getUploadDir().'/'.$this->pathMembrete;
    }
    
    public function uploadMembrete()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getMembrete()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getMembrete()->move(
            $this->getUploadRootDir(),
            $this->getMembrete()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->pathMembrete = $this->getMembrete()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setMembrete(null);
    }

    /**
     * Sets imagen.
     *
     * @param UploadedFile $imagen
     */
    public function setImagen(UploadedFile $imagen = null)
    {
        $this->imagen = $imagen;
    }

    /**
     * Get imagen.
     *
     * @return UploadedFile
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImagen()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getImagen()->move(
            $this->getUploadRootDir(),
            $this->getImagen()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->path = $this->getImagen()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setImagen(null);
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'bundles/template/images/agencias';
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Agencias
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set pathMembrete
     *
     * @param string $pathMembrete
     * @return Agencias
     */
    public function setPathMembrete($pathMembrete)
    {
        $this->pathMembrete = $pathMembrete;
    
        return $this;
    }

    /**
     * Get pathMembrete
     *
     * @return string 
     */
    public function getPathMembrete()
    {
        return $this->pathMembrete;
    }

    /**
     * Set mail
     *
     * @param \DateTime $mail
     * @return Agencias
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Get mail
     *
     * @return \DateTime 
     */
    public function getMail()
    {
        return $this->mail;
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
     * Set idComision
     *
     * @param \MediterraneoFM\MediterraneoFMBundle\Entity\Comisiones $idComision
     * @return Agencias
     */
    public function setIdComision(\MediterraneoFM\MediterraneoFMBundle\Entity\Comisiones $idComision = null)
    {
        $this->idComision = $idComision;
    
        return $this;
    }

    /**
     * Get idComision
     *
     * @return \MediterraneoFM\MediterraneoFMBundle\Entity\Comisiones 
     */
    public function getIdComision()
    {
        return $this->idComision;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     * @return Agencias
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string 
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }
    
    public function __toString() {
        return strval($this->id_agencia);
    }
}
