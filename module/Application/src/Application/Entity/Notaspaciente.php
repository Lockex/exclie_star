<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Notaspaciente {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="text",nullable=true) */
    protected $NOTAS;
    /** @ORM\Column(type="date") */
    protected $FECHA;
     /** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $PACIENTE;



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
     * Gets the value of NOTAS.
     *
     * @return mixed
     */
    public function getNOTAS()
    {
        return $this->NOTAS;
    }

    /**
     * Sets the value of NOTAS.
     *
     * @param mixed $NOTAS the 
     *
     * @return self
     */
    public function setNOTAS($NOTAS)
    {
        $this->NOTAS = $NOTAS;

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
     * Gets the value of FECHA.
     *
     * @return mixed
     */
    public function getFECHA()
    {
        return $this->FECHA;
    }

    /**
     * Sets the value of FECHA.
     *
     * @param mixed $FECHA the 
     *
     * @return self
     */
    public function setFECHA($FECHA)
    {
        $this->FECHA = $FECHA;

        return $this;
    }
}