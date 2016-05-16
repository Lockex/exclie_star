<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Doctores entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`doctores`")
 */
class Doctores {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $ID;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CLAVE;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PROCEDENCIA;
    /** @ORM\Column(type="string",nullable=true) */
    protected $NOMBRE;
    /** @ORM\Column(type="string",nullable=true) */
    protected $APELLIDO1;
    /** @ORM\Column(type="string",nullable=true) */
    protected $APELLIDO2;
    /** @ORM\ManyToOne(targetEntity="Especialidades") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $ESPECIALIDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $EMAIL;
    /** @ORM\ManyToOne(targetEntity="Dependencias") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $DEPENDENCIA;
    /** @ORM\Column(type="string",nullable=true) */
    protected $TELEFONO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CELULAR;

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
     * @param mixed $ID the id 
     *
     * @return self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Gets the value of NOMBRE.
     *
     * @return mixed
     */
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }
    
    /**
     * Sets the value of NOMBRE.
     *
     * @param mixed $NOMBRE the no mb re 
     *
     * @return self
     */
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }

    /**
     * Gets the value of APELLIDO1.
     *
     * @return mixed
     */
    public function getAPELLIDO1()
    {
        return $this->APELLIDO1;
    }
    
    /**
     * Sets the value of APELLIDO1.
     *
     * @param mixed $APELLIDO1 the ap el li do1 
     *
     * @return self
     */
    public function setAPELLIDO1($APELLIDO1)
    {
        $this->APELLIDO1 = $APELLIDO1;

        return $this;
    }

    /**
     * Gets the value of APELLIDO2.
     *
     * @return mixed
     */
    public function getAPELLIDO2()
    {
        return $this->APELLIDO2;
    }
    
    /**
     * Sets the value of APELLIDO2.
     *
     * @param mixed $APELLIDO2 the ap el li do2 
     *
     * @return self
     */
    public function setAPELLIDO2($APELLIDO2)
    {
        $this->APELLIDO2 = $APELLIDO2;

        return $this;
    }

    /**
     * Gets the value of ESPECIALIDAD.
     *
     * @return mixed
     */
    public function getESPECIALIDAD()
    {
        return $this->ESPECIALIDAD;
    }
    
    /**
     * Sets the value of ESPECIALIDAD.
     *
     * @param mixed $ESPECIALIDAD the es pe ci al id ad 
     *
     * @return self
     */
    public function setESPECIALIDAD($ESPECIALIDAD)
    {
        $this->ESPECIALIDAD = $ESPECIALIDAD;

        return $this;
    }

    /**
     * Gets the value of EMAIL.
     *
     * @return mixed
     */
    public function getEMAIL()
    {
        return $this->EMAIL;
    }
    
    /**
     * Sets the value of EMAIL.
     *
     * @param mixed $EMAIL the em ai l 
     *
     * @return self
     */
    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }

    /**
     * Gets the value of DEPENDENCIA.
     *
     * @return mixed
     */
    public function getDEPENDENCIA()
    {
        return $this->DEPENDENCIA;
    }
    
    /**
     * Sets the value of DEPENDENCIA.
     *
     * @param mixed $DEPENDENCIA the de pe nd en ci a 
     *
     * @return self
     */
    public function setDEPENDENCIA($DEPENDENCIA)
    {
        $this->DEPENDENCIA = $DEPENDENCIA;

        return $this;
    }

    /**
     * Gets the value of TELEFONO.
     *
     * @return mixed
     */
    public function getTELEFONO()
    {
        return $this->TELEFONO;
    }
    
    /**
     * Sets the value of TELEFONO.
     *
     * @param mixed $TELEFONO the te le fo no 
     *
     * @return self
     */
    public function setTELEFONO($TELEFONO)
    {
        $this->TELEFONO = $TELEFONO;

        return $this;
    }

    /**
     * Gets the value of CLAVE.
     *
     * @return mixed
     */
    public function getCLAVE()
    {
        return $this->CLAVE;
    }

    /**
     * Sets the value of CLAVE.
     *
     * @param mixed $CLAVE the 
     *
     * @return self
     */
    public function setCLAVE($CLAVE)
    {
        $this->CLAVE = $CLAVE;

        return $this;
    }

    /**
     * Gets the value of CELULAR.
     *
     * @return mixed
     */
    public function getCELULAR()
    {
        return $this->CELULAR;
    }

    /**
     * Sets the value of CELULAR.
     *
     * @param mixed $CELULAR the 
     *
     * @return self
     */
    public function setCELULAR($CELULAR)
    {
        $this->CELULAR = $CELULAR;

        return $this;
    }

    /**
     * Gets the value of PROCEDENCIA.
     *
     * @return mixed
     */
    public function getPROCEDENCIA()
    {
        return $this->PROCEDENCIA;
    }

    /**
     * Sets the value of PROCEDENCIA.
     *
     * @param mixed $PROCEDENCIA the 
     *
     * @return self
     */
    public function setPROCEDENCIA($PROCEDENCIA)
    {
        $this->PROCEDENCIA = $PROCEDENCIA;

        return $this;
    }
}