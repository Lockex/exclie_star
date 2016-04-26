<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`recetas`")
 */
class Recetas {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_INICIO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $INDICACIONES_ADICIONALES;
      /** @ORM\ManyToOne(targetEntity="Consultas") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
    protected $CONSULTAS;

   
   

    /**
     * Gets the value of ID.
     *
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Sets the value of ID.
     *
     * @param mixed $ID the 
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Gets the value of FECHA_INICIO.
     *
     * @return mixed
     */
    public function getFECHAINICIO()
    {
        return $this->FECHA_INICIO;
    }

    /**
     * Sets the value of FECHA_INICIO.
     *
     * @param mixed $FECHA_INICIO the 
     *
     * @return self
     */
    public function setFECHAINICIO($FECHA_INICIO)
    {
        $this->FECHA_INICIO = $FECHA_INICIO;

        return $this;
    }

    /**
     * Gets the value of INDICACIONES_ADICIONALES.
     *
     * @return mixed
     */
    public function getINDICACIONESADICIONALES()
    {
        return $this->INDICACIONES_ADICIONALES;
    }

    /**
     * Sets the value of INDICACIONES_ADICIONALES.
     *
     * @param mixed $INDICACIONES_ADICIONALES the 
     *
     * @return self
     */
    public function setINDICACIONESADICIONALES($INDICACIONES_ADICIONALES)
    {
        $this->INDICACIONES_ADICIONALES = $INDICACIONES_ADICIONALES;

        return $this;
    }

    /**
     * Gets the value of CONSULTAS.
     *
     * @return mixed
     */
    public function getCONSULTAS()
    {
        return $this->CONSULTAS;
    }

    /**
     * Sets the value of CONSULTAS.
     *
     * @param mixed $CONSULTAS the 
     *
     * @return self
     */
    public function setCONSULTAS($CONSULTAS)
    {
        $this->CONSULTAS = $CONSULTAS;

        return $this;
    }
}