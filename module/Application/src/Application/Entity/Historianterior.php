<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Historianterior {
	/** @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $ID;
	/** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
	protected $PACIENTE;
	/** @ORM\Column(type="string") */
	protected $ARCHIVO;
	/** @ORM\Column(type="date") */
	protected $FECHA;

	/**
	 * Gets the value of ID.
	 *
	 * @return mixed
	 */
	public function getID() {
		return $this->ID;
	}

	/**
	 * Sets the value of ID.
	 *
	 * @param mixed $ID the
	 *
	 * @return self
	 */
	public function setID($ID) {
		$this->ID = $ID;

		return $this;
	}

	/**
	 * Gets the value of PACIENTE.
	 *
	 * @return mixed
	 */
	public function getPACIENTE() {
		return $this->PACIENTE;
	}

	/**
	 * Sets the value of PACIENTE.
	 *
	 * @param mixed $PACIENTE the
	 *
	 * @return self
	 */
	public function setPACIENTE($PACIENTE) {
		$this->PACIENTE = $PACIENTE;

		return $this;
	}

	/**
	 * Gets the value of FECHA.
	 *
	 * @return mixed
	 */
	public function getFECHA() {
		return $this->FECHA;
	}

	/**
	 * Sets the value of FECHA.
	 *
	 * @param mixed $FECHA the
	 *
	 * @return self
	 */
	public function setFECHA($FECHA) {
		$this->FECHA = $FECHA;

		return $this;
	}

    /**
     * Gets the value of ARCHIVO.
     *
     * @return mixed
     */
    public function getARCHIVO()
    {
        return $this->ARCHIVO;
    }

    /**
     * Sets the value of ARCHIVO.
     *
     * @param mixed $ARCHIVO the 
     *
     * @return self
     */
    public function setARCHIVO($ARCHIVO)
    {
        $this->ARCHIVO = $ARCHIVO;

        return $this;
    }
}
