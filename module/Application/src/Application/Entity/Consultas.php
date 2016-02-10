<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Consultas {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="date") */
    protected $FECHA_CONS;
    /** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $PACIENTE;
    /** @ORM\ManyToOne(targetEntity="Usuarios") @ORM\JoinColumn(referencedColumnName="id") */
    protected $MEDICO;
    /** @ORM\Column(type="integer") */
    protected $CONSULTA;
    /** @ORM\Column(type="string",nullable=true) */
    protected $ESPEC;
    /** @ORM\Column(type="string",nullable=true) */
    protected $MOTIVO;
      /** @ORM\Column(type="string",length=10,nullable=true) */
    protected $FC;
      /** @ORM\Column(type="string",length=10,nullable=true) */
    protected $FR;
      /** @ORM\Column(type="string",length=10,nullable=true) */
    protected $TA;
      /** @ORM\Column(type="string",length=10,nullable=true) */
    protected $T;
      /** @ORM\Column(type="string",length=10,nullable=true) */
    protected $ALTURA;
      /** @ORM\Column(type="decimal",length=10,nullable=true) */
    protected $PESO;
      /** @ORM\Column(type="decimal",length=10,nullable=true) */
    protected $IMC;
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
     * Gets the value of PACIENTE.
     *
     * @return mixed
     */
    public function getPACIENTE()
    {
        return $this->PACIENTE;
    }

    /**
     * Sets the value of PACIENTE.
     *
     * @param mixed $PACIENTE the 
     *
     * @return self
     */
    public function setPACIENTE($PACIENTE)
    {
        $this->PACIENTE = $PACIENTE;

        return $this;
    }

    /**
     * Gets the value of MEDICO.
     *
     * @return mixed
     */
    public function getMEDICO()
    {
        return $this->MEDICO;
    }

    /**
     * Sets the value of MEDICO.
     *
     * @param mixed $MEDICO the 
     *
     * @return self
     */
    public function setMEDICO($MEDICO)
    {
        $this->MEDICO = $MEDICO;

        return $this;
    }

    /**
     * Gets the value of CONSULTA.
     *
     * @return mixed
     */
    public function getCONSULTA()
    {
        return $this->CONSULTA;
    }

    /**
     * Sets the value of CONSULTA.
     *
     * @param mixed $CONSULTA the 
     *
     * @return self
     */
    public function setCONSULTA($CONSULTA)
    {
        $this->CONSULTA = $CONSULTA;

        return $this;
    }

    /**
     * Gets the value of ESPEC.
     *
     * @return mixed
     */
    public function getESPEC()
    {
        return $this->ESPEC;
    }

    /**
     * Sets the value of ESPEC.
     *
     * @param mixed $ESPEC the 
     *
     * @return self
     */
    public function setESPEC($ESPEC)
    {
        $this->ESPEC = $ESPEC;

        return $this;
    }

    /**
     * Gets the value of MOTIVO.
     *
     * @return mixed
     */
    public function getMOTIVO()
    {
        return $this->MOTIVO;
    }

    /**
     * Sets the value of MOTIVO.
     *
     * @param mixed $MOTIVO the 
     *
     * @return self
     */
    public function setMOTIVO($MOTIVO)
    {
        $this->MOTIVO = $MOTIVO;

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
     * Gets the value of FC.
     *
     * @return mixed
     */
    public function getFC()
    {
        return $this->FC;
    }

    /**
     * Sets the value of FC.
     *
     * @param mixed $FC the 
     *
     * @return self
     */
    public function setFC($FC)
    {
        $this->FC = $FC;

        return $this;
    }

    /**
     * Gets the value of FR.
     *
     * @return mixed
     */
    public function getFR()
    {
        return $this->FR;
    }

    /**
     * Sets the value of FR.
     *
     * @param mixed $FR the 
     *
     * @return self
     */
    public function setFR($FR)
    {
        $this->FR = $FR;

        return $this;
    }

    /**
     * Gets the value of TA.
     *
     * @return mixed
     */
    public function getTA()
    {
        return $this->TA;
    }

    /**
     * Sets the value of TA.
     *
     * @param mixed $TA the 
     *
     * @return self
     */
    public function setTA($TA)
    {
        $this->TA = $TA;

        return $this;
    }

    /**
     * Gets the value of T.
     *
     * @return mixed
     */
    public function getT()
    {
        return $this->T;
    }

    /**
     * Sets the value of T.
     *
     * @param mixed $T the 
     *
     * @return self
     */
    public function setT($T)
    {
        $this->T = $T;

        return $this;
    }

    /**
     * Gets the value of ALTURA.
     *
     * @return mixed
     */
    public function getALTURA()
    {
        return $this->ALTURA;
    }

    /**
     * Sets the value of ALTURA.
     *
     * @param mixed $ALTURA the 
     *
     * @return self
     */
    public function setALTURA($ALTURA)
    {
        $this->ALTURA = $ALTURA;

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
     * Gets the value of IMC.
     *
     * @return mixed
     */
    public function getIMC()
    {
        return $this->IMC;
    }

    /**
     * Sets the value of IMC.
     *
     * @param mixed $IMC the 
     *
     * @return self
     */
    public function setIMC($IMC)
    {
        $this->IMC = $IMC;

        return $this;
    }
}