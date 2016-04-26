<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`videoconsulta`")
 */
class Videoconsulta {
	/** @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @ORM\Column(type="integer")
	 */
	protected $ID;
	/** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
	protected $PACIENTE;
	/** @ORM\Column(type="string") */
	protected $VIDEO;
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
	 * Gets the value of VIDEO.
	 *
	 * @return mixed
	 */
	public function getVIDEO() {
		return $this->VIDEO;
	}

	/**
	 * Sets the value of VIDEO.
	 *
	 * @param mixed $VIDEO the
	 *
	 * @return self
	 */
	public function setVIDEO($VIDEO) {
		$this->VIDEO = $VIDEO;

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
}
