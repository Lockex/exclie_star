<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Cgineco entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`cgineco`")
 */
class Cgineco {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_CONS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $MOTIVO_CONS; 
    /** @ORM\Column(type="string",nullable=true) */
    protected $EDAD; 
    /** @ORM\Column(type="date",nullable=true) */
    protected $FUM;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CICLO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $GESTAS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PARTOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CESAREAS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $ABORTOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $ECTOPICOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $TIROIDESNUM;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PESO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PLAN;
    /** @ORM\Column(type="string",nullable=true) */
    protected $IMX;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PRESION;
    /** @ORM\Column(type="string",nullable=true) */
    protected $IMAGEN;
    
 
    

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
     * Gets the value of FECHA_CONS.
     *
     * @return mixed
     */
    public function getFECHACONS()
    {
        return $this->FECHA_CONS;
    }

    /**
     * Sets the value of FECHA_CONS.
     *
     * @param mixed $FECHA_CONS the 
     *
     * @return self
     */
    public function setFECHACONS($FECHA_CONS)
    {
        $this->FECHA_CONS = $FECHA_CONS;

        return $this;
    }

    /**
     * Gets the value of MOTIVO_CONS.
     *
     * @return mixed
     */
    public function getMOTIVOCONS()
    {
        return $this->MOTIVO_CONS;
    }

    /**
     * Sets the value of MOTIVO_CONS.
     *
     * @param mixed $MOTIVO_CONS the 
     *
     * @return self
     */
    public function setMOTIVOCONS($MOTIVO_CONS)
    {
        $this->MOTIVO_CONS = $MOTIVO_CONS;

        return $this;
    }

    /**
     * Gets the value of EDAD.
     *
     * @return mixed
     */
    public function getEDAD()
    {
        return $this->EDAD;
    }

    /**
     * Sets the value of EDAD.
     *
     * @param mixed $EDAD the 
     *
     * @return self
     */
    public function setEDAD($EDAD)
    {
        $this->EDAD = $EDAD;

        return $this;
    }

    /**
     * Gets the value of FUM.
     *
     * @return mixed
     */
    public function getFUM()
    {
        return $this->FUM;
    }

    /**
     * Sets the value of FUM.
     *
     * @param mixed $FUM the 
     *
     * @return self
     */
    public function setFUM($FUM)
    {
        $this->FUM = $FUM;

        return $this;
    }

    /**
     * Gets the value of CICLO.
     *
     * @return mixed
     */
    public function getCICLO()
    {
        return $this->CICLO;
    }

    /**
     * Sets the value of CICLO.
     *
     * @param mixed $CICLO the 
     *
     * @return self
     */
    public function setCICLO($CICLO)
    {
        $this->CICLO = $CICLO;

        return $this;
    }

    /**
     * Gets the value of GESTAS.
     *
     * @return mixed
     */
    public function getGESTAS()
    {
        return $this->GESTAS;
    }

    /**
     * Sets the value of GESTAS.
     *
     * @param mixed $GESTAS the 
     *
     * @return self
     */
    public function setGESTAS($GESTAS)
    {
        $this->GESTAS = $GESTAS;

        return $this;
    }

    /**
     * Gets the value of PARTOS.
     *
     * @return mixed
     */
    public function getPARTOS()
    {
        return $this->PARTOS;
    }

    /**
     * Sets the value of PARTOS.
     *
     * @param mixed $PARTOS the 
     *
     * @return self
     */
    public function setPARTOS($PARTOS)
    {
        $this->PARTOS = $PARTOS;

        return $this;
    }

    /**
     * Gets the value of CESAREAS.
     *
     * @return mixed
     */
    public function getCESAREAS()
    {
        return $this->CESAREAS;
    }

    /**
     * Sets the value of CESAREAS.
     *
     * @param mixed $CESAREAS the 
     *
     * @return self
     */
    public function setCESAREAS($CESAREAS)
    {
        $this->CESAREAS = $CESAREAS;

        return $this;
    }

    /**
     * Gets the value of ABORTOS.
     *
     * @return mixed
     */
    public function getABORTOS()
    {
        return $this->ABORTOS;
    }

    /**
     * Sets the value of ABORTOS.
     *
     * @param mixed $ABORTOS the 
     *
     * @return self
     */
    public function setABORTOS($ABORTOS)
    {
        $this->ABORTOS = $ABORTOS;

        return $this;
    }

    /**
     * Gets the value of TIROIDESNUM.
     *
     * @return mixed
     */
    public function getTIROIDESNUM()
    {
        return $this->TIROIDESNUM;
    }

    /**
     * Sets the value of TIROIDESNUM.
     *
     * @param mixed $TIROIDESNUM the 
     *
     * @return self
     */
    public function setTIROIDESNUM($TIROIDESNUM)
    {
        $this->TIROIDESNUM = $TIROIDESNUM;

        return $this;
    }

    /**
     * Gets the value of PESO.
     *
     * @return mixed
     */
    public function getPESO()
    {
        return $this->PESO;
    }

    /**
     * Sets the value of PESO.
     *
     * @param mixed $PESO the 
     *
     * @return self
     */
    public function setPESO($PESO)
    {
        $this->PESO = $PESO;

        return $this;
    }

    /**
     * Gets the value of PLAN.
     *
     * @return mixed
     */
    public function getPLAN()
    {
        return $this->PLAN;
    }

    /**
     * Sets the value of PLAN.
     *
     * @param mixed $PLAN the 
     *
     * @return self
     */
    public function setPLAN($PLAN)
    {
        $this->PLAN = $PLAN;

        return $this;
    }

    /**
     * Gets the value of IMX.
     *
     * @return mixed
     */
    public function getIMX()
    {
        return $this->IMX;
    }

    /**
     * Sets the value of IMX.
     *
     * @param mixed $IMX the 
     *
     * @return self
     */
    public function setIMX($IMX)
    {
        $this->IMX = $IMX;

        return $this;
    }

    /**
     * Gets the value of PRESION.
     *
     * @return mixed
     */
    public function getPRESION()
    {
        return $this->PRESION;
    }

    /**
     * Sets the value of PRESION.
     *
     * @param mixed $PRESION the 
     *
     * @return self
     */
    public function setPRESION($PRESION)
    {
        $this->PRESION = $PRESION;

        return $this;
    }

    /**
     * Gets the value of IMAGEN.
     *
     * @return mixed
     */
    public function getIMAGEN()
    {
        return $this->IMAGEN;
    }

    /**
     * Sets the value of IMAGEN.
     *
     * @param mixed $IMAGEN the 
     *
     * @return self
     */
    public function setIMAGEN($IMAGEN)
    {
        $this->IMAGEN = $IMAGEN;

        return $this;
    }

    /**
     * Gets the value of ECTOPICOS.
     *
     * @return mixed
     */
    public function getECTOPICOS()
    {
        return $this->ECTOPICOS;
    }

    /**
     * Sets the value of ECTOPICOS.
     *
     * @param mixed $ECTOPICOS the 
     *
     * @return self
     */
    public function setECTOPICOS($ECTOPICOS)
    {
        $this->ECTOPICOS = $ECTOPICOS;

        return $this;
    }
}