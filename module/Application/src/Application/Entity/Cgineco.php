<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Cgineco {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="date") */
    protected $FECHA_CONS;
    /** @ORM\Column(type="string") */
    protected $MOTIVO_CONS; 
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
    protected $TIROIDESIMAGEN;
    /** @ORM\Column(type="string",nullable=true) */
    protected $SENOSIMAGEN;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CERVIXIMAGEN;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CUELLOIMAGEN;
    /** @ORM\Column(type="string",nullable=true) */
    protected $OVARIOSIMAGEN;
     /** @ORM\Column(type="string",nullable=true) */
    protected $TIROIDESDATOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $SENOSDATOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $SENOSTAMANO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $SENOSNUMERO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CERVIXDATOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CUELLODATOS;
    /** @ORM\Column(type="string",nullable=true) */
    protected $OVARIOSMEDIDA;
    /** @ORM\Column(type="boolean",nullable=true) */
    protected $OVARIOSCAPSULA;
    /** @ORM\Column(type="string",nullable=true) */
    protected $OVARIOSDATOS;
 
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
     * Gets the value of TIROIDESIMAGEN.
     *
     * @return mixed
     */
    public function getTIROIDESIMAGEN()
    {
        return $this->TIROIDESIMAGEN;
    }

    /**
     * Sets the value of TIROIDESIMAGEN.
     *
     * @param mixed $TIROIDESIMAGEN the 
     *
     * @return self
     */
    public function setTIROIDESIMAGEN($TIROIDESIMAGEN)
    {
        $this->TIROIDESIMAGEN = $TIROIDESIMAGEN;

        return $this;
    }

    /**
     * Gets the value of SENOSIMAGEN.
     *
     * @return mixed
     */
    public function getSENOSIMAGEN()
    {
        return $this->SENOSIMAGEN;
    }

    /**
     * Sets the value of SENOSIMAGEN.
     *
     * @param mixed $SENOSIMAGEN the 
     *
     * @return self
     */
    public function setSENOSIMAGEN($SENOSIMAGEN)
    {
        $this->SENOSIMAGEN = $SENOSIMAGEN;

        return $this;
    }

    /**
     * Gets the value of CERVIXIMAGEN.
     *
     * @return mixed
     */
    public function getCERVIXIMAGEN()
    {
        return $this->CERVIXIMAGEN;
    }

    /**
     * Sets the value of CERVIXIMAGEN.
     *
     * @param mixed $CERVIXIMAGEN the 
     *
     * @return self
     */
    public function setCERVIXIMAGEN($CERVIXIMAGEN)
    {
        $this->CERVIXIMAGEN = $CERVIXIMAGEN;

        return $this;
    }

    /**
     * Gets the value of CUELLOIMAGEN.
     *
     * @return mixed
     */
    public function getCUELLOIMAGEN()
    {
        return $this->CUELLOIMAGEN;
    }

    /**
     * Sets the value of CUELLOIMAGEN.
     *
     * @param mixed $CUELLOIMAGEN the 
     *
     * @return self
     */
    public function setCUELLOIMAGEN($CUELLOIMAGEN)
    {
        $this->CUELLOIMAGEN = $CUELLOIMAGEN;

        return $this;
    }

    /**
     * Gets the value of OVARIOSIMAGEN.
     *
     * @return mixed
     */
    public function getOVARIOSIMAGEN()
    {
        return $this->OVARIOSIMAGEN;
    }

    /**
     * Sets the value of OVARIOSIMAGEN.
     *
     * @param mixed $OVARIOSIMAGEN the 
     *
     * @return self
     */
    public function setOVARIOSIMAGEN($OVARIOSIMAGEN)
    {
        $this->OVARIOSIMAGEN = $OVARIOSIMAGEN;

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
     * Gets the value of TIROIDESDATOS.
     *
     * @return mixed
     */
    public function getTIROIDESDATOS()
    {
        return $this->TIROIDESDATOS;
    }

    /**
     * Sets the value of TIROIDESDATOS.
     *
     * @param mixed $TIROIDESDATOS the 
     *
     * @return self
     */
    public function setTIROIDESDATOS($TIROIDESDATOS)
    {
        $this->TIROIDESDATOS = $TIROIDESDATOS;

        return $this;
    }

    /**
     * Gets the value of SENOSDATOS.
     *
     * @return mixed
     */
    public function getSENOSDATOS()
    {
        return $this->SENOSDATOS;
    }

    /**
     * Sets the value of SENOSDATOS.
     *
     * @param mixed $SENOSDATOS the 
     *
     * @return self
     */
    public function setSENOSDATOS($SENOSDATOS)
    {
        $this->SENOSDATOS = $SENOSDATOS;

        return $this;
    }

    /**
     * Gets the value of CERVIXDATOS.
     *
     * @return mixed
     */
    public function getCERVIXDATOS()
    {
        return $this->CERVIXDATOS;
    }

    /**
     * Sets the value of CERVIXDATOS.
     *
     * @param mixed $CERVIXDATOS the 
     *
     * @return self
     */
    public function setCERVIXDATOS($CERVIXDATOS)
    {
        $this->CERVIXDATOS = $CERVIXDATOS;

        return $this;
    }

    /**
     * Gets the value of CUELLODATOS.
     *
     * @return mixed
     */
    public function getCUELLODATOS()
    {
        return $this->CUELLODATOS;
    }

    /**
     * Sets the value of CUELLODATOS.
     *
     * @param mixed $CUELLODATOS the 
     *
     * @return self
     */
    public function setCUELLODATOS($CUELLODATOS)
    {
        $this->CUELLODATOS = $CUELLODATOS;

        return $this;
    }

    /**
     * Gets the value of OVARIOSDATOS.
     *
     * @return mixed
     */
    public function getOVARIOSDATOS()
    {
        return $this->OVARIOSDATOS;
    }

    /**
     * Sets the value of OVARIOSDATOS.
     *
     * @param mixed $OVARIOSDATOS the 
     *
     * @return self
     */
    public function setOVARIOSDATOS($OVARIOSDATOS)
    {
        $this->OVARIOSDATOS = $OVARIOSDATOS;

        return $this;
    }

    /**
     * Gets the value of SENOSNUMERO.
     *
     * @return mixed
     */
    public function getSENOSNUMERO()
    {
        return $this->SENOSNUMERO;
    }

    /**
     * Sets the value of SENOSNUMERO.
     *
     * @param mixed $SENOSNUMERO the 
     *
     * @return self
     */
    public function setSENOSNUMERO($SENOSNUMERO)
    {
        $this->SENOSNUMERO = $SENOSNUMERO;

        return $this;
    }

    /**
     * Gets the value of OVARIOSMEDIDA.
     *
     * @return mixed
     */
    public function getOVARIOSMEDIDA()
    {
        return $this->OVARIOSMEDIDA;
    }

    /**
     * Sets the value of OVARIOSMEDIDA.
     *
     * @param mixed $OVARIOSMEDIDA the 
     *
     * @return self
     */
    public function setOVARIOSMEDIDA($OVARIOSMEDIDA)
    {
        $this->OVARIOSMEDIDA = $OVARIOSMEDIDA;

        return $this;
    }

    /**
     * Gets the value of OVARIOSCAPSULA.
     *
     * @return mixed
     */
    public function getOVARIOSCAPSULA()
    {
        return $this->OVARIOSCAPSULA;
    }

    /**
     * Sets the value of OVARIOSCAPSULA.
     *
     * @param mixed $OVARIOSCAPSULA the 
     *
     * @return self
     */
    public function setOVARIOSCAPSULA($OVARIOSCAPSULA)
    {
        $this->OVARIOSCAPSULA = $OVARIOSCAPSULA;

        return $this;
    }

    /**
     * Gets the value of SENOSTAMANO.
     *
     * @return mixed
     */
    public function getSENOSTAMANO()
    {
        return $this->SENOSTAMANO;
    }

    /**
     * Sets the value of SENOSTAMANO.
     *
     * @param mixed $SENOSTAMANO the 
     *
     * @return self
     */
    public function setSENOSTAMANO($SENOSTAMANO)
    {
        $this->SENOSTAMANO = $SENOSTAMANO;

        return $this;
    }
}