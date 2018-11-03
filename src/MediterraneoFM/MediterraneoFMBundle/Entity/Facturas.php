<?php

namespace MediterraneoFM\MediterraneoFMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediterraneoFM\MediterraneoFMBundle\Entity\Facturas
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Facturas
{
    /**
     * @var integer $id
     */
    private $id;
    
    /**
     * @var integer $n_factura
     */
    private $n_factura;

    /**
     * @var string $tipo_factura
     */
    private $tipo_factura;

    /**
     * @var \DateTime $fecha
     */
    private $fecha;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $domicilio
     */
    private $domicilio;

    /**
     * @var string $id_ciudad
     */
    private $id_ciudad;

    /**
     * @var string $cuit
     */
    private $cuit;

    /**
     * @var integer $remito_n
     */
    private $remito_n;

    /**
     * @var string $iva
     */
    private $iva;

    /**
     * @var string $condicion_venta
     */
    private $condicion_venta;

    /**
     * @var string $cantidad
     */
    private $cantidad;

    /**
     * @var string $descripcion
     */
    private $descripcion;

    /**
     * @var string $p_unitario
     */
    private $p_unitario;

    /**
     * @var integer $p_total
     */
    private $p_total;

    /**
     * @var integer $total
     */
    private $total;


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
     * Set n_factura
     *
     * @param integer $nFactura
     * @return Facturas
     */
    public function setNFactura($nFactura)
    {
        $this->n_factura = $nFactura;
    
        return $this;
    }

    /**
     * Get n_factura
     *
     * @return integer 
     */
    public function getNFactura()
    {
        return $this->n_factura;
    }

    /**
     * Set tipo_factura
     *
     * @param string $tipoFactura
     * @return Facturas
     */
    public function setTipoFactura($tipoFactura)
    {
        $this->tipo_factura = $tipoFactura;
    
        return $this;
    }

    /**
     * Get tipo_factura
     *
     * @return string 
     */
    public function getTipoFactura()
    {
        return $this->tipo_factura;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Facturas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Facturas
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
     * Set domicilio
     *
     * @param string $domicilio
     * @return Facturas
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;
    
        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set id_ciudad
     *
     * @param string $idCiudad
     * @return Facturas
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
     * Set cuit
     *
     * @param string $cuit
     * @return Facturas
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    
        return $this;
    }

    /**
     * Get cuit
     *
     * @return string 
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * Set remito_n
     *
     * @param integer $remitoN
     * @return Facturas
     */
    public function setRemitoN($remitoN)
    {
        $this->remito_n = $remitoN;
    
        return $this;
    }

    /**
     * Get remito_n
     *
     * @return integer 
     */
    public function getRemitoN()
    {
        return $this->remito_n;
    }

    /**
     * Set iva
     *
     * @param string $iva
     * @return Facturas
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
     * Set condicion_venta
     *
     * @param string $condicionVenta
     * @return Facturas
     */
    public function setCondicionVenta($condicionVenta)
    {
        $this->condicion_venta = $condicionVenta;
    
        return $this;
    }

    /**
     * Get condicion_venta
     *
     * @return string 
     */
    public function getCondicionVenta()
    {
        return $this->condicion_venta;
    }

    /**
     * Set cantidad
     *
     * @param string $cantidad
     * @return Facturas
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Facturas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set p_unitario
     *
     * @param string $pUnitario
     * @return Facturas
     */
    public function setPUnitario($pUnitario)
    {
        $this->p_unitario = $pUnitario;
    
        return $this;
    }

    /**
     * Get p_unitario
     *
     * @return string 
     */
    public function getPUnitario()
    {
        return $this->p_unitario;
    }

    /**
     * Set p_total
     *
     * @param integer $pTotal
     * @return Facturas
     */
    public function setPTotal($pTotal)
    {
        $this->p_total = $pTotal;
    
        return $this;
    }

    /**
     * Get p_total
     *
     * @return integer 
     */
    public function getPTotal()
    {
        return $this->p_total;
    }

    /**
     * Set total
     *
     * @param integer $total
     * @return Facturas
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return integer 
     */
    public function getTotal()
    {
        return $this->total;
    }
}
