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
    /** @ORM\Column(type="string") */
    protected $ESPEC;
    /** @ORM\Column(type="string") */
    protected $MOTIVO;

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
}