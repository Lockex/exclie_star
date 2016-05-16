<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Doctrine ORM implementation of Monitoreo entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`monitoreo`")
 */
class Monitoreo {
	/** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="string",nullable=true) */
    protected $REPRODUCCION;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PROTOCOLO;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FUR;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PROGESTINA;
    /** @ORM\Column(type="date",nullable=true) */
    protected $PROGESTINA_DEL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $PROGESTINA_AL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FPM;
    /** @ORM\Column(type="string",nullable=true) */
    protected $GNRH;
    /** @ORM\Column(type="date",nullable=true) */
    protected $GNRHD_EL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $GNRH_AL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $MENOTROPINAS;
    /** @ORM\Column(type="date",nullable=true) */
    protected $MENOTROPINAS_DEL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $MENOTROPINAL_AL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $FSH;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FSH_DEL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FSH_AL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $PRIMOGYN;
    /** @ORM\Column(type="date",nullable=true) */
    protected $PRIMOGYN_DEL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $PRIMOGYN_AL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $OTROS;
    /** @ORM\Column(type="date",nullable=true) */
    protected $OTROS_DEL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $OTROS_AL;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_PROCEDIIENTO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $RESIDENTE;
    /** @ORM\Column(type="string",nullable=true) */
    protected $AUTORIZADO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $ENVIADO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $DOCTOR;
    /** @ORM\Column(type="string",nullable=true) */
    protected $IMAGEN;
    /** @ORM\Column(type="integer") */
    protected $FIN;




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
     * Gets the value of REPRODUCCION.
     *
     * @return mixed
     */
    public function getREPRODUCCION()
    {
        return $this->REPRODUCCION;
    }

    /**
     * Sets the value of REPRODUCCION.
     *
     * @param mixed $REPRODUCCION the 
     *
     * @return self
     */
    public function setREPRODUCCION($REPRODUCCION)
    {
        $this->REPRODUCCION = $REPRODUCCION;

        return $this;
    }

    /**
     * Gets the value of PROTOCOLO.
     *
     * @return mixed
     */
    public function getPROTOCOLO()
    {
        return $this->PROTOCOLO;
    }

    /**
     * Sets the value of PROTOCOLO.
     *
     * @param mixed $PROTOCOLO the 
     *
     * @return self
     */
    public function setPROTOCOLO($PROTOCOLO)
    {
        $this->PROTOCOLO = $PROTOCOLO;

        return $this;
    }

    /**
     * Gets the value of FUR.
     *
     * @return mixed
     */
    public function getFUR()
    {
        return $this->FUR;
    }

    /**
     * Sets the value of FUR.
     *
     * @param mixed $FUR the 
     *
     * @return self
     */
    public function setFUR($FUR)
    {
        $this->FUR = $FUR;

        return $this;
    }

    /**
     * Gets the value of PROGESTINA.
     *
     * @return mixed
     */
    public function getPROGESTINA()
    {
        return $this->PROGESTINA;
    }

    /**
     * Sets the value of PROGESTINA.
     *
     * @param mixed $PROGESTINA the 
     *
     * @return self
     */
    public function setPROGESTINA($PROGESTINA)
    {
        $this->PROGESTINA = $PROGESTINA;

        return $this;
    }

    /**
     * Gets the value of PROGESTINA_DEL.
     *
     * @return mixed
     */
    public function getPROGESTINADEL()
    {
        return $this->PROGESTINA_DEL;
    }

    /**
     * Sets the value of PROGESTINA_DEL.
     *
     * @param mixed $PROGESTINA_DEL the 
     *
     * @return self
     */
    public function setPROGESTINADEL($PROGESTINA_DEL)
    {
        $this->PROGESTINA_DEL = $PROGESTINA_DEL;

        return $this;
    }

    /**
     * Gets the value of PROGESTINA_AL.
     *
     * @return mixed
     */
    public function getPROGESTINAAL()
    {
        return $this->PROGESTINA_AL;
    }

    /**
     * Sets the value of PROGESTINA_AL.
     *
     * @param mixed $PROGESTINA_AL the 
     *
     * @return self
     */
    public function setPROGESTINAAL($PROGESTINA_AL)
    {
        $this->PROGESTINA_AL = $PROGESTINA_AL;

        return $this;
    }

    /**
     * Gets the value of FPM.
     *
     * @return mixed
     */
    public function getFPM()
    {
        return $this->FPM;
    }

    /**
     * Sets the value of FPM.
     *
     * @param mixed $FPM the 
     *
     * @return self
     */
    public function setFPM($FPM)
    {
        $this->FPM = $FPM;

        return $this;
    }

    /**
     * Gets the value of GNRH.
     *
     * @return mixed
     */
    public function getGNRH()
    {
        return $this->GNRH;
    }

    /**
     * Sets the value of GNRH.
     *
     * @param mixed $GNRH the 
     *
     * @return self
     */
    public function setGNRH($GNRH)
    {
        $this->GNRH = $GNRH;

        return $this;
    }

    /**
     * Gets the value of GNRHD_EL.
     *
     * @return mixed
     */
    public function getGNRHDEL()
    {
        return $this->GNRHD_EL;
    }

    /**
     * Sets the value of GNRHD_EL.
     *
     * @param mixed $GNRHD_EL the 
     *
     * @return self
     */
    public function setGNRHDEL($GNRHD_EL)
    {
        $this->GNRHD_EL = $GNRHD_EL;

        return $this;
    }

    /**
     * Gets the value of GNRH_AL.
     *
     * @return mixed
     */
    public function getGNRHAL()
    {
        return $this->GNRH_AL;
    }

    /**
     * Sets the value of GNRH_AL.
     *
     * @param mixed $GNRH_AL the 
     *
     * @return self
     */
    public function setGNRHAL($GNRH_AL)
    {
        $this->GNRH_AL = $GNRH_AL;

        return $this;
    }

    /**
     * Gets the value of MENOTROPINAS.
     *
     * @return mixed
     */
    public function getMENOTROPINAS()
    {
        return $this->MENOTROPINAS;
    }

    /**
     * Sets the value of MENOTROPINAS.
     *
     * @param mixed $MENOTROPINAS the 
     *
     * @return self
     */
    public function setMENOTROPINAS($MENOTROPINAS)
    {
        $this->MENOTROPINAS = $MENOTROPINAS;

        return $this;
    }

    /**
     * Gets the value of MENOTROPINAS_DEL.
     *
     * @return mixed
     */
    public function getMENOTROPINASDEL()
    {
        return $this->MENOTROPINAS_DEL;
    }

    /**
     * Sets the value of MENOTROPINAS_DEL.
     *
     * @param mixed $MENOTROPINAS_DEL the 
     *
     * @return self
     */
    public function setMENOTROPINASDEL($MENOTROPINAS_DEL)
    {
        $this->MENOTROPINAS_DEL = $MENOTROPINAS_DEL;

        return $this;
    }

    /**
     * Gets the value of MENOTROPINAL_AL.
     *
     * @return mixed
     */
    public function getMENOTROPINALAL()
    {
        return $this->MENOTROPINAL_AL;
    }

    /**
     * Sets the value of MENOTROPINAL_AL.
     *
     * @param mixed $MENOTROPINAL_AL the 
     *
     * @return self
     */
    public function setMENOTROPINALAL($MENOTROPINAL_AL)
    {
        $this->MENOTROPINAL_AL = $MENOTROPINAL_AL;

        return $this;
    }

    /**
     * Gets the value of FSH.
     *
     * @return mixed
     */
    public function getFSH()
    {
        return $this->FSH;
    }

    /**
     * Sets the value of FSH.
     *
     * @param mixed $FSH the 
     *
     * @return self
     */
    public function setFSH($FSH)
    {
        $this->FSH = $FSH;

        return $this;
    }

    /**
     * Gets the value of FSH_DEL.
     *
     * @return mixed
     */
    public function getFSHDEL()
    {
        return $this->FSH_DEL;
    }

    /**
     * Sets the value of FSH_DEL.
     *
     * @param mixed $FSH_DEL the 
     *
     * @return self
     */
    public function setFSHDEL($FSH_DEL)
    {
        $this->FSH_DEL = $FSH_DEL;

        return $this;
    }

    /**
     * Gets the value of FSH_AL.
     *
     * @return mixed
     */
    public function getFSHAL()
    {
        return $this->FSH_AL;
    }

    /**
     * Sets the value of FSH_AL.
     *
     * @param mixed $FSH_AL the 
     *
     * @return self
     */
    public function setFSHAL($FSH_AL)
    {
        $this->FSH_AL = $FSH_AL;

        return $this;
    }

    /**
     * Gets the value of PRIMOGYN.
     *
     * @return mixed
     */
    public function getPRIMOGYN()
    {
        return $this->PRIMOGYN;
    }

    /**
     * Sets the value of PRIMOGYN.
     *
     * @param mixed $PRIMOGYN the 
     *
     * @return self
     */
    public function setPRIMOGYN($PRIMOGYN)
    {
        $this->PRIMOGYN = $PRIMOGYN;

        return $this;
    }

    /**
     * Gets the value of PRIMOGYN_DEL.
     *
     * @return mixed
     */
    public function getPRIMOGYNDEL()
    {
        return $this->PRIMOGYN_DEL;
    }

    /**
     * Sets the value of PRIMOGYN_DEL.
     *
     * @param mixed $PRIMOGYN_DEL the 
     *
     * @return self
     */
    public function setPRIMOGYNDEL($PRIMOGYN_DEL)
    {
        $this->PRIMOGYN_DEL = $PRIMOGYN_DEL;

        return $this;
    }

    /**
     * Gets the value of PRIMOGYN_AL.
     *
     * @return mixed
     */
    public function getPRIMOGYNAL()
    {
        return $this->PRIMOGYN_AL;
    }

    /**
     * Sets the value of PRIMOGYN_AL.
     *
     * @param mixed $PRIMOGYN_AL the 
     *
     * @return self
     */
    public function setPRIMOGYNAL($PRIMOGYN_AL)
    {
        $this->PRIMOGYN_AL = $PRIMOGYN_AL;

        return $this;
    }

    /**
     * Gets the value of OTROS.
     *
     * @return mixed
     */
    public function getOTROS()
    {
        return $this->OTROS;
    }

    /**
     * Sets the value of OTROS.
     *
     * @param mixed $OTROS the 
     *
     * @return self
     */
    public function setOTROS($OTROS)
    {
        $this->OTROS = $OTROS;

        return $this;
    }

    /**
     * Gets the value of OTROS_DEL.
     *
     * @return mixed
     */
    public function getOTROSDEL()
    {
        return $this->OTROS_DEL;
    }

    /**
     * Sets the value of OTROS_DEL.
     *
     * @param mixed $OTROS_DEL the 
     *
     * @return self
     */
    public function setOTROSDEL($OTROS_DEL)
    {
        $this->OTROS_DEL = $OTROS_DEL;

        return $this;
    }

    /**
     * Gets the value of OTROS_AL.
     *
     * @return mixed
     */
    public function getOTROSAL()
    {
        return $this->OTROS_AL;
    }

    /**
     * Sets the value of OTROS_AL.
     *
     * @param mixed $OTROS_AL the 
     *
     * @return self
     */
    public function setOTROSAL($OTROS_AL)
    {
        $this->OTROS_AL = $OTROS_AL;

        return $this;
    }

    /**
     * Gets the value of FECHA_PROCEDIIENTO.
     *
     * @return mixed
     */
    public function getFECHAPROCEDIIENTO()
    {
        return $this->FECHA_PROCEDIIENTO;
    }

    /**
     * Sets the value of FECHA_PROCEDIIENTO.
     *
     * @param mixed $FECHA_PROCEDIIENTO the 
     *
     * @return self
     */
    public function setFECHAPROCEDIIENTO($FECHA_PROCEDIIENTO)
    {
        $this->FECHA_PROCEDIIENTO = $FECHA_PROCEDIIENTO;

        return $this;
    }

    /**
     * Gets the value of RESIDENTE.
     *
     * @return mixed
     */
    public function getRESIDENTE()
    {
        return $this->RESIDENTE;
    }

    /**
     * Sets the value of RESIDENTE.
     *
     * @param mixed $RESIDENTE the 
     *
     * @return self
     */
    public function setRESIDENTE($RESIDENTE)
    {
        $this->RESIDENTE = $RESIDENTE;

        return $this;
    }

    /**
     * Gets the value of AUTORIZADO.
     *
     * @return mixed
     */
    public function getAUTORIZADO()
    {
        return $this->AUTORIZADO;
    }

    /**
     * Sets the value of AUTORIZADO.
     *
     * @param mixed $AUTORIZADO the 
     *
     * @return self
     */
    public function setAUTORIZADO($AUTORIZADO)
    {
        $this->AUTORIZADO = $AUTORIZADO;

        return $this;
    }

    /**
     * Gets the value of ENVIADO.
     *
     * @return mixed
     */
    public function getENVIADO()
    {
        return $this->ENVIADO;
    }

    /**
     * Sets the value of ENVIADO.
     *
     * @param mixed $ENVIADO the 
     *
     * @return self
     */
    public function setENVIADO($ENVIADO)
    {
        $this->ENVIADO = $ENVIADO;

        return $this;
    }

    /**
     * Gets the value of DOCTOR.
     *
     * @return mixed
     */
    public function getDOCTOR()
    {
        return $this->DOCTOR;
    }

    /**
     * Sets the value of DOCTOR.
     *
     * @param mixed $DOCTOR the 
     *
     * @return self
     */
    public function setDOCTOR($DOCTOR)
    {
        $this->DOCTOR = $DOCTOR;

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
     * Gets the value of FIN.
     *
     * @return mixed
     */
    public function getFIN()
    {
        return $this->FIN;
    }

    /**
     * Sets the value of FIN.
     *
     * @param mixed $FIN the 
     *
     * @return self
     */
    public function setFIN($FIN)
    {
        $this->FIN = $FIN;

        return $this;
    }
}