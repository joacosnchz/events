<?php

namespace DSNEmpresas\AsociacionP\AsociacionPBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asistentes
 */
class Asistentes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    private $nom_app;

    /**
     * @var integer
     */
    private $dni;

    /**
     * @var string
     */
    private $especialidad;

    /**
     * @var \DateTime
     */
    private $fechaNac;

    /**
     * @var \DateTime
     */
    private $fechaGrad;

    /**
     * @var string
     */
    private $profesion;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var integer
     */
    private $nroCalle;

    /**
     * @var integer
     */
    private $piso;

    /**
     * @var integer
     */
    private $depto;

    /**
     * @var integer
     */
    private $localidad;

    /**
     * @var integer
     */
    private $cp;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    protected $asistencia;

    /**
     * @var string
     */
    private $enCalidad;

    /**
     * @var integer
     */
    protected $impreso;


    public function __construct(){
        $this->impreso = 0;
    }

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
     * @return Asistentes
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
     * @return Asistentes
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
     * Set nom_app
     *
     * @param string $nom_app
     * @return Asistentes
     */
    public function setNomApp($nomapp)
    {
        $this->nomapp = $nomapp;

        return $this;
    }

    /**
     * Get nom_app
     *
     * @return string 
     */
    public function getNomApp()
    {
        return $this->apellido . ', ' . $this->nombre;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     * @return Asistentes
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
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
     * Set especialidad
     *
     * @param string $especialidad
     * @return Asistentes
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * Get especialidad
     *
     * @return string 
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set fechaNac
     *
     * @param \DateTime $fechaNac
     * @return Asistentes
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    /**
     * Get fechaNac
     *
     * @return \DateTime 
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set fechaGrad
     *
     * @param \DateTime $fechaGrad
     * @return Asistentes
     */
    public function setFechaGrad($fechaGrad)
    {
        $this->fechaGrad = $fechaGrad;

        return $this;
    }

    /**
     * Get fechaGrad
     *
     * @return \DateTime 
     */
    public function getFechaGrad()
    {
        return $this->fechaGrad;
    }

    /**
     * Set profesion
     *
     * @param string $profesion
     * @return Asistentes
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;

        return $this;
    }

    /**
     * Get profesion
     *
     * @return string 
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Asistentes
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set nroCalle
     *
     * @param integer $nroCalle
     * @return Asistentes
     */
    public function setNroCalle($nroCalle)
    {
        $this->nroCalle = $nroCalle;

        return $this;
    }

    /**
     * Get nroCalle
     *
     * @return integer 
     */
    public function getNroCalle()
    {
        return $this->nroCalle;
    }

    /**
     * Set piso
     *
     * @param integer $piso
     * @return Asistentes
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get piso
     *
     * @return integer 
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set depto
     *
     * @param integer $depto
     * @return Asistentes
     */
    public function setDepto($depto)
    {
        $this->depto = $depto;

        return $this;
    }

    /**
     * Get depto
     *
     * @return integer 
     */
    public function getDepto()
    {
        return $this->depto;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Asistentes
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Asistentes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Asistentes
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
     * Set asistencia
     *
     * @param boolean $asistencia
     * @return Asistentes
     */
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;

        return $this;
    }

    /**
     * Get asistencia
     *
     * @return boolean 
     */
    public function getAsistencia()
    {
        return $this->asistencia;
    }

    /**
     * Set enCalidad
     *
     * @param string $enCalidad
     * @return Asistentes
     */
    public function setEnCalidad($enCalidad)
    {
        $this->enCalidad = $enCalidad;

        return $this;
    }

    /**
     * Get enCalidad
     *
     * @return string 
     */
    public function getEnCalidad()
    {
        return $this->enCalidad;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     * @return Asistentes
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string 
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set impreso
     *
     * @param integer $impreso
     * @return Asistentes
     */
    public function setImpreso($impreso)
    {
        $this->impreso = $impreso;

        return $this;
    }

    /**
     * Get impreso
     *
     * @return integer
     */
    public function getImpreso()
    {
        return $this->impreso;
    }
}
