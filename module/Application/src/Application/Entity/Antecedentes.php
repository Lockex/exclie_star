<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`antecedentes`")
 */
class Antecedentes {
   /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   */
   protected $ID;
   /** @ORM\Column(type="string",nullable=true) */
   protected $TABAQUISMO;
   /** @ORM\Column(type="string",nullable=true) */
   protected $TOXICOMANIAS;
   /** @ORM\Column(type="string",nullable=true) */
   protected $ALCOHOLISMO;
   /** @ORM\Column(type="string",nullable=true) */
   protected $ALERGIAS;
   /** @ORM\Column(type="boolean",nullable=true) */
   protected $AUMENTO_PERDIDA;
   /** @ORM\Column(type="string",nullable=true) */
   protected $CIRUGIAS;
   /** @ORM\Column(type="string",nullable=true) */
   protected $AHF;
   /** @ORM\Column(type="string",nullable=true) */
   protected $CANCER;
   /** @ORM\Column(type="string",nullable=true) */
   protected $TIROIDES;
   /** @ORM\Column(type="string",nullable=true) */
   protected $CARDIOPATIAS;
   /** @ORM\Column(type="string",nullable=true) */
   protected $LUPUS;
   /** @ORM\Column(type="string",nullable=true) */
   protected $EJERCICIO;
   /** @ORM\Column(type="string",nullable=true) */
   protected $DROGAS;
   /** @ORM\Column(type="string",nullable=true) */
   protected $DIABETES;
   /** @ORM\Column(type="string",nullable=true) */
   protected $ARTRITIS;
   /** @ORM\Column(type="string",nullable=true) */
   protected $HIPERTENSION;
   /** @ORM\Column(type="string",nullable=true) */
   protected $ANTECEDENTES_NP;
     /** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID",onDelete="CASCADE") */
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
     * Gets the value of TABAQUISMO.
     *
     * @return mixed
     */
    public function getTABAQUISMO()
    {
        return $this->TABAQUISMO;
    }

    /**
     * Sets the value of TABAQUISMO.
     *
     * @param mixed $TABAQUISMO the 
     *
     * @return self
     */
    public function setTABAQUISMO($TABAQUISMO)
    {
        $this->TABAQUISMO = $TABAQUISMO;

        return $this;
    }

    /**
     * Gets the value of TOXICOMANIAS.
     *
     * @return mixed
     */
    public function getTOXICOMANIAS()
    {
        return $this->TOXICOMANIAS;
    }

    /**
     * Sets the value of TOXICOMANIAS.
     *
     * @param mixed $TOXICOMANIAS the 
     *
     * @return self
     */
    public function setTOXICOMANIAS($TOXICOMANIAS)
    {
        $this->TOXICOMANIAS = $TOXICOMANIAS;

        return $this;
    }

    /**
     * Gets the value of ALCOHOLISMO.
     *
     * @return mixed
     */
    public function getALCOHOLISMO()
    {
        return $this->ALCOHOLISMO;
    }

    /**
     * Sets the value of ALCOHOLISMO.
     *
     * @param mixed $ALCOHOLISMO the 
     *
     * @return self
     */
    public function setALCOHOLISMO($ALCOHOLISMO)
    {
        $this->ALCOHOLISMO = $ALCOHOLISMO;

        return $this;
    }

    /**
     * Gets the value of ALERGIAS.
     *
     * @return mixed
     */
    public function getALERGIAS()
    {
        return $this->ALERGIAS;
    }

    /**
     * Sets the value of ALERGIAS.
     *
     * @param mixed $ALERGIAS the 
     *
     * @return self
     */
    public function setALERGIAS($ALERGIAS)
    {
        $this->ALERGIAS = $ALERGIAS;

        return $this;
    }

    /**
     * Gets the value of AUMENTO_PERDIDA.
     *
     * @return mixed
     */
    public function getAUMENTOPERDIDA()
    {
        return $this->AUMENTO_PERDIDA;
    }

    /**
     * Sets the value of AUMENTO_PERDIDA.
     *
     * @param mixed $AUMENTO_PERDIDA the 
     *
     * @return self
     */
    public function setAUMENTOPERDIDA($AUMENTO_PERDIDA)
    {
        $this->AUMENTO_PERDIDA = $AUMENTO_PERDIDA;

        return $this;
    }

    /**
     * Gets the value of CIRUGIAS.
     *
     * @return mixed
     */
    public function getCIRUGIAS()
    {
        return $this->CIRUGIAS;
    }

    /**
     * Sets the value of CIRUGIAS.
     *
     * @param mixed $CIRUGIAS the 
     *
     * @return self
     */
    public function setCIRUGIAS($CIRUGIAS)
    {
        $this->CIRUGIAS = $CIRUGIAS;

        return $this;
    }

    /**
     * Gets the value of AHF.
     *
     * @return mixed
     */
    public function getAHF()
    {
        return $this->AHF;
    }

    /**
     * Sets the value of AHF.
     *
     * @param mixed $AHF the 
     *
     * @return self
     */
    public function setAHF($AHF)
    {
        $this->AHF = $AHF;

        return $this;
    }

    /**
     * Gets the value of ANTECEDENTES_PERSONALES.
     *
     * @return mixed
     */
    public function getANTECEDENTESPERSONALES()
    {
        return $this->ANTECEDENTES_PERSONALES;
    }

    /**
     * Sets the value of ANTECEDENTES_PERSONALES.
     *
     * @param mixed $ANTECEDENTES_PERSONALES the 
     *
     * @return self
     */
    public function setANTECEDENTESPERSONALES($ANTECEDENTES_PERSONALES)
    {
        $this->ANTECEDENTES_PERSONALES = $ANTECEDENTES_PERSONALES;

        return $this;
    }

    /**
     * Gets the value of ANTECEDENTES_NP.
     *
     * @return mixed
     */
    public function getANTECEDENTESNP()
    {
        return $this->ANTECEDENTES_NP;
    }

    /**
     * Sets the value of ANTECEDENTES_NP.
     *
     * @param mixed $ANTECEDENTES_NP the 
     *
     * @return self
     */
    public function setANTECEDENTESNP($ANTECEDENTES_NP)
    {
        $this->ANTECEDENTES_NP = $ANTECEDENTES_NP;

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
     * Gets the value of TIROIDES.
     *
     * @return mixed
     */
    public function getTIROIDES()
    {
        return $this->TIROIDES;
    }

    /**
     * Sets the value of TIROIDES.
     *
     * @param mixed $TIROIDES the 
     *
     * @return self
     */
    public function setTIROIDES($TIROIDES)
    {
        $this->TIROIDES = $TIROIDES;

        return $this;
    }

    /**
     * Gets the value of CARDIOPATIAS.
     *
     * @return mixed
     */
    public function getCARDIOPATIAS()
    {
        return $this->CARDIOPATIAS;
    }

    /**
     * Sets the value of CARDIOPATIAS.
     *
     * @param mixed $CARDIOPATIAS the 
     *
     * @return self
     */
    public function setCARDIOPATIAS($CARDIOPATIAS)
    {
        $this->CARDIOPATIAS = $CARDIOPATIAS;

        return $this;
    }

    /**
     * Gets the value of LUPUS.
     *
     * @return mixed
     */
    public function getLUPUS()
    {
        return $this->LUPUS;
    }

    /**
     * Sets the value of LUPUS.
     *
     * @param mixed $LUPUS the 
     *
     * @return self
     */
    public function setLUPUS($LUPUS)
    {
        $this->LUPUS = $LUPUS;

        return $this;
    }

    /**
     * Gets the value of EJERCICIO.
     *
     * @return mixed
     */
    public function getEJERCICIO()
    {
        return $this->EJERCICIO;
    }

    /**
     * Sets the value of EJERCICIO.
     *
     * @param mixed $EJERCICIO the 
     *
     * @return self
     */
    public function setEJERCICIO($EJERCICIO)
    {
        $this->EJERCICIO = $EJERCICIO;

        return $this;
    }

    /**
     * Gets the value of DROGAS.
     *
     * @return mixed
     */
    public function getDROGAS()
    {
        return $this->DROGAS;
    }

    /**
     * Sets the value of DROGAS.
     *
     * @param mixed $DROGAS the 
     *
     * @return self
     */
    public function setDROGAS($DROGAS)
    {
        $this->DROGAS = $DROGAS;

        return $this;
    }

    /**
     * Gets the value of DIABETES.
     *
     * @return mixed
     */
    public function getDIABETES()
    {
        return $this->DIABETES;
    }

    /**
     * Sets the value of DIABETES.
     *
     * @param mixed $DIABETES the 
     *
     * @return self
     */
    public function setDIABETES($DIABETES)
    {
        $this->DIABETES = $DIABETES;

        return $this;
    }

    /**
     * Gets the value of ARTRITIS.
     *
     * @return mixed
     */
    public function getARTRITIS()
    {
        return $this->ARTRITIS;
    }

    /**
     * Sets the value of ARTRITIS.
     *
     * @param mixed $ARTRITIS the 
     *
     * @return self
     */
    public function setARTRITIS($ARTRITIS)
    {
        $this->ARTRITIS = $ARTRITIS;

        return $this;
    }

    /**
     * Gets the value of CANCER.
     *
     * @return mixed
     */
    public function getCANCER()
    {
        return $this->CANCER;
    }

    /**
     * Sets the value of CANCER.
     *
     * @param mixed $CANCER the 
     *
     * @return self
     */
    public function setCANCER($CANCER)
    {
        $this->CANCER = $CANCER;

        return $this;
    }

    /**
     * Gets the value of HIPERTENSION.
     *
     * @return mixed
     */
    public function getHIPERTENSION()
    {
        return $this->HIPERTENSION;
    }

    /**
     * Sets the value of HIPERTENSION.
     *
     * @param mixed $HIPERTENSION the 
     *
     * @return self
     */
    public function setHIPERTENSION($HIPERTENSION)
    {
        $this->HIPERTENSION = $HIPERTENSION;

        return $this;
    }
}