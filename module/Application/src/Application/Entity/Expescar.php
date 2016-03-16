<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Expescar {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $ID;
    /** @ORM\Column(type="string") */
    protected $PADECIMIENTO;
     /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_CONS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $EDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $PRIMERHIJO_NOMBRE;
    /** @ORM\Column(type="string", nullable=true) */
    protected $PRIMERHIJO_EDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $SEGUNDOHIJO_NOMBRE;
    /** @ORM\Column(type="string", nullable=true) */
    protected $SEGUNDOHIJO_EDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $TERCERHIJO_NOMBRE;
    /** @ORM\Column(type="string", nullable=true) */
    protected $TERCERHIJO_EDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $MENARCA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $IVSA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $CICLOS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $DURACION;
    /** @ORM\Column(type="string", nullable=true) */
    protected $FUM;
    /** @ORM\Column(type="string", nullable=true) */
    protected $GESTAS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $PARTOS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ABORTOS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $CESAREAS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ECTOPICOS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $DISMENORREA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $FLUJO;
    /** @ORM\Column(type="string", nullable=true) */
    protected $SIST_URINARIO;
    /** @ORM\Column(type="string", nullable=true) */
    protected $SIST_DIGESTIVO;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ANTICONCEPTIVOS;
    /** @ORM\Column(type="string", nullable=true) */
    protected $PAP;
    /** @ORM\Column(type="string", nullable=true) */
    protected $COH;
    /** @ORM\Column(type="string", nullable=true) */
    protected $GALACTORREA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $HIRSUTISM;
    /** @ORM\Column(type="string", nullable=true) */
    protected $HSG_CAVIDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $HSG_D;
    /** @ORM\Column(type="string", nullable=true) */
    protected $HSG_I;
    /** @ORM\Column(type="string", nullable=true) */
    protected $LABORATORIO_NOTAS;
    /** @ORM\Column(type="string", nullable=true ) */
    protected $LABORATORIO_IMAGEN;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_FECHA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_CUENTA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_VOLUMEN;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_MOTIVIDAD;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_FN;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_DNA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_CULTIVO;
    /** @ORM\Column(type="string", nullable=true) */
    protected $ESPERMO_APP;
     /** @ORM\Column(type="string", nullable=true) */
    protected $CIRUGIAS_PREVIAS;
    /** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $PACIENTE;
    /** @ORM\Column(type="string", nullable=true) */
    protected $IMAGEN;
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
     * Gets the value of PADECIMIENTO.
     *
     * @return mixed
     */
    public function getPADECIMIENTO()
    {
        return $this->PADECIMIENTO;
    }

    /**
     * Sets the value of PADECIMIENTO.
     *
     * @param mixed $PADECIMIENTO the 
     *
     * @return self
     */
    public function setPADECIMIENTO($PADECIMIENTO)
    {
        $this->PADECIMIENTO = $PADECIMIENTO;

        return $this;
    }

    /**
     * Gets the value of PRIMERHIJO_NOMBRE.
     *
     * @return mixed
     */
    public function getPRIMERHIJONOMBRE()
    {
        return $this->PRIMERHIJO_NOMBRE;
    }

    /**
     * Sets the value of PRIMERHIJO_NOMBRE.
     *
     * @param mixed $PRIMERHIJO_NOMBRE the 
     *
     * @return self
     */
    public function setPRIMERHIJONOMBRE($PRIMERHIJO_NOMBRE)
    {
        $this->PRIMERHIJO_NOMBRE = $PRIMERHIJO_NOMBRE;

        return $this;
    }

    /**
     * Gets the value of PRIMERHIJO_EDAD.
     *
     * @return mixed
     */
    public function getPRIMERHIJOEDAD()
    {
        return $this->PRIMERHIJO_EDAD;
    }

    /**
     * Sets the value of PRIMERHIJO_EDAD.
     *
     * @param mixed $PRIMERHIJO_EDAD the 
     *
     * @return self
     */
    public function setPRIMERHIJOEDAD($PRIMERHIJO_EDAD)
    {
        $this->PRIMERHIJO_EDAD = $PRIMERHIJO_EDAD;

        return $this;
    }

    /**
     * Gets the value of SEGUNDOHIJO_NOMBRE.
     *
     * @return mixed
     */
    public function getSEGUNDOHIJONOMBRE()
    {
        return $this->SEGUNDOHIJO_NOMBRE;
    }

    /**
     * Sets the value of SEGUNDOHIJO_NOMBRE.
     *
     * @param mixed $SEGUNDOHIJO_NOMBRE the 
     *
     * @return self
     */
    public function setSEGUNDOHIJONOMBRE($SEGUNDOHIJO_NOMBRE)
    {
        $this->SEGUNDOHIJO_NOMBRE = $SEGUNDOHIJO_NOMBRE;

        return $this;
    }

    /**
     * Gets the value of SEGUNDOHIJO_EDAD.
     *
     * @return mixed
     */
    public function getSEGUNDOHIJOEDAD()
    {
        return $this->SEGUNDOHIJO_EDAD;
    }

    /**
     * Sets the value of SEGUNDOHIJO_EDAD.
     *
     * @param mixed $SEGUNDOHIJO_EDAD the 
     *
     * @return self
     */
    public function setSEGUNDOHIJOEDAD($SEGUNDOHIJO_EDAD)
    {
        $this->SEGUNDOHIJO_EDAD = $SEGUNDOHIJO_EDAD;

        return $this;
    }

    /**
     * Gets the value of TERCERHIJO_NOMBRE.
     *
     * @return mixed
     */
    public function getTERCERHIJONOMBRE()
    {
        return $this->TERCERHIJO_NOMBRE;
    }

    /**
     * Sets the value of TERCERHIJO_NOMBRE.
     *
     * @param mixed $TERCERHIJO_NOMBRE the 
     *
     * @return self
     */
    public function setTERCERHIJONOMBRE($TERCERHIJO_NOMBRE)
    {
        $this->TERCERHIJO_NOMBRE = $TERCERHIJO_NOMBRE;

        return $this;
    }

    /**
     * Gets the value of TERCERHIJO_EDAD.
     *
     * @return mixed
     */
    public function getTERCERHIJOEDAD()
    {
        return $this->TERCERHIJO_EDAD;
    }

    /**
     * Sets the value of TERCERHIJO_EDAD.
     *
     * @param mixed $TERCERHIJO_EDAD the 
     *
     * @return self
     */
    public function setTERCERHIJOEDAD($TERCERHIJO_EDAD)
    {
        $this->TERCERHIJO_EDAD = $TERCERHIJO_EDAD;

        return $this;
    }

    /**
     * Gets the value of MENARCA.
     *
     * @return mixed
     */
    public function getMENARCA()
    {
        return $this->MENARCA;
    }

    /**
     * Sets the value of MENARCA.
     *
     * @param mixed $MENARCA the 
     *
     * @return self
     */
    public function setMENARCA($MENARCA)
    {
        $this->MENARCA = $MENARCA;

        return $this;
    }

    /**
     * Gets the value of IVSA.
     *
     * @return mixed
     */
    public function getIVSA()
    {
        return $this->IVSA;
    }

    /**
     * Sets the value of IVSA.
     *
     * @param mixed $IVSA the 
     *
     * @return self
     */
    public function setIVSA($IVSA)
    {
        $this->IVSA = $IVSA;

        return $this;
    }

    /**
     * Gets the value of CICLOS.
     *
     * @return mixed
     */
    public function getCICLOS()
    {
        return $this->CICLOS;
    }

    /**
     * Sets the value of CICLOS.
     *
     * @param mixed $CICLOS the 
     *
     * @return self
     */
    public function setCICLOS($CICLOS)
    {
        $this->CICLOS = $CICLOS;

        return $this;
    }

    /**
     * Gets the value of DURACION.
     *
     * @return mixed
     */
    public function getDURACION()
    {
        return $this->DURACION;
    }

    /**
     * Sets the value of DURACION.
     *
     * @param mixed $DURACION the 
     *
     * @return self
     */
    public function setDURACION($DURACION)
    {
        $this->DURACION = $DURACION;

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

    /**
     * Gets the value of DISMENORREA.
     *
     * @return mixed
     */
    public function getDISMENORREA()
    {
        return $this->DISMENORREA;
    }

    /**
     * Sets the value of DISMENORREA.
     *
     * @param mixed $DISMENORREA the 
     *
     * @return self
     */
    public function setDISMENORREA($DISMENORREA)
    {
        $this->DISMENORREA = $DISMENORREA;

        return $this;
    }

    /**
     * Gets the value of FLUJO.
     *
     * @return mixed
     */
    public function getFLUJO()
    {
        return $this->FLUJO;
    }

    /**
     * Sets the value of FLUJO.
     *
     * @param mixed $FLUJO the 
     *
     * @return self
     */
    public function setFLUJO($FLUJO)
    {
        $this->FLUJO = $FLUJO;

        return $this;
    }

    /**
     * Gets the value of SIST_URINARIO.
     *
     * @return mixed
     */
    public function getSISTURINARIO()
    {
        return $this->SIST_URINARIO;
    }

    /**
     * Sets the value of SIST_URINARIO.
     *
     * @param mixed $SIST_URINARIO the 
     *
     * @return self
     */
    public function setSISTURINARIO($SIST_URINARIO)
    {
        $this->SIST_URINARIO = $SIST_URINARIO;

        return $this;
    }

    /**
     * Gets the value of SIST_DIGESTIVO.
     *
     * @return mixed
     */
    public function getSISTDIGESTIVO()
    {
        return $this->SIST_DIGESTIVO;
    }

    /**
     * Sets the value of SIST_DIGESTIVO.
     *
     * @param mixed $SIST_DIGESTIVO the 
     *
     * @return self
     */
    public function setSISTDIGESTIVO($SIST_DIGESTIVO)
    {
        $this->SIST_DIGESTIVO = $SIST_DIGESTIVO;

        return $this;
    }

    /**
     * Gets the value of ANTICONCEPTIVOS.
     *
     * @return mixed
     */
    public function getANTICONCEPTIVOS()
    {
        return $this->ANTICONCEPTIVOS;
    }

    /**
     * Sets the value of ANTICONCEPTIVOS.
     *
     * @param mixed $ANTICONCEPTIVOS the 
     *
     * @return self
     */
    public function setANTICONCEPTIVOS($ANTICONCEPTIVOS)
    {
        $this->ANTICONCEPTIVOS = $ANTICONCEPTIVOS;

        return $this;
    }

    /**
     * Gets the value of PAP.
     *
     * @return mixed
     */
    public function getPAP()
    {
        return $this->PAP;
    }

    /**
     * Sets the value of PAP.
     *
     * @param mixed $PAP the 
     *
     * @return self
     */
    public function setPAP($PAP)
    {
        $this->PAP = $PAP;

        return $this;
    }

    /**
     * Gets the value of COH.
     *
     * @return mixed
     */
    public function getCOH()
    {
        return $this->COH;
    }

    /**
     * Sets the value of COH.
     *
     * @param mixed $COH the 
     *
     * @return self
     */
    public function setCOH($COH)
    {
        $this->COH = $COH;

        return $this;
    }

    /**
     * Gets the value of GALACTORREA.
     *
     * @return mixed
     */
    public function getGALACTORREA()
    {
        return $this->GALACTORREA;
    }

    /**
     * Sets the value of GALACTORREA.
     *
     * @param mixed $GALACTORREA the 
     *
     * @return self
     */
    public function setGALACTORREA($GALACTORREA)
    {
        $this->GALACTORREA = $GALACTORREA;

        return $this;
    }

    /**
     * Gets the value of HIRSUTISM.
     *
     * @return mixed
     */
    public function getHIRSUTISM()
    {
        return $this->HIRSUTISM;
    }

    /**
     * Sets the value of HIRSUTISM.
     *
     * @param mixed $HIRSUTISM the 
     *
     * @return self
     */
    public function setHIRSUTISM($HIRSUTISM)
    {
        $this->HIRSUTISM = $HIRSUTISM;

        return $this;
    }

    /**
     * Gets the value of HSG_CAVIDAD.
     *
     * @return mixed
     */
    public function getHSGCAVIDAD()
    {
        return $this->HSG_CAVIDAD;
    }

    /**
     * Sets the value of HSG_CAVIDAD.
     *
     * @param mixed $HSG_CAVIDAD the 
     *
     * @return self
     */
    public function setHSGCAVIDAD($HSG_CAVIDAD)
    {
        $this->HSG_CAVIDAD = $HSG_CAVIDAD;

        return $this;
    }

    /**
     * Gets the value of HSG_D.
     *
     * @return mixed
     */
    public function getHSGD()
    {
        return $this->HSG_D;
    }

    /**
     * Sets the value of HSG_D.
     *
     * @param mixed $HSG_D the 
     *
     * @return self
     */
    public function setHSGD($HSG_D)
    {
        $this->HSG_D = $HSG_D;

        return $this;
    }

    /**
     * Gets the value of HSG_I.
     *
     * @return mixed
     */
    public function getHSGI()
    {
        return $this->HSG_I;
    }

    /**
     * Sets the value of HSG_I.
     *
     * @param mixed $HSG_I the 
     *
     * @return self
     */
    public function setHSGI($HSG_I)
    {
        $this->HSG_I = $HSG_I;

        return $this;
    }

    /**
     * Gets the value of LABORATORIO_NOTAS.
     *
     * @return mixed
     */
    public function getLABORATORIONOTAS()
    {
        return $this->LABORATORIO_NOTAS;
    }

    /**
     * Sets the value of LABORATORIO_NOTAS.
     *
     * @param mixed $LABORATORIO_NOTAS the 
     *
     * @return self
     */
    public function setLABORATORIONOTAS($LABORATORIO_NOTAS)
    {
        $this->LABORATORIO_NOTAS = $LABORATORIO_NOTAS;

        return $this;
    }

    /**
     * Gets the value of LABORATORIO_IMAGEN.
     *
     * @return mixed
     */
    public function getLABORATORIOIMAGEN()
    {
        return $this->LABORATORIO_IMAGEN;
    }

    /**
     * Sets the value of LABORATORIO_IMAGEN.
     *
     * @param mixed $LABORATORIO_IMAGEN the 
     *
     * @return self
     */
    public function setLABORATORIOIMAGEN($LABORATORIO_IMAGEN)
    {
        $this->LABORATORIO_IMAGEN = $LABORATORIO_IMAGEN;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_FECHA.
     *
     * @return mixed
     */
    public function getESPERMOFECHA()
    {
        return $this->ESPERMO_FECHA;
    }

    /**
     * Sets the value of ESPERMO_FECHA.
     *
     * @param mixed $ESPERMO_FECHA the 
     *
     * @return self
     */
    public function setESPERMOFECHA($ESPERMO_FECHA)
    {
        $this->ESPERMO_FECHA = $ESPERMO_FECHA;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_CUENTA.
     *
     * @return mixed
     */
    public function getESPERMOCUENTA()
    {
        return $this->ESPERMO_CUENTA;
    }

    /**
     * Sets the value of ESPERMO_CUENTA.
     *
     * @param mixed $ESPERMO_CUENTA the 
     *
     * @return self
     */
    public function setESPERMOCUENTA($ESPERMO_CUENTA)
    {
        $this->ESPERMO_CUENTA = $ESPERMO_CUENTA;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_VOLUMEN.
     *
     * @return mixed
     */
    public function getESPERMOVOLUMEN()
    {
        return $this->ESPERMO_VOLUMEN;
    }

    /**
     * Sets the value of ESPERMO_VOLUMEN.
     *
     * @param mixed $ESPERMO_VOLUMEN the 
     *
     * @return self
     */
    public function setESPERMOVOLUMEN($ESPERMO_VOLUMEN)
    {
        $this->ESPERMO_VOLUMEN = $ESPERMO_VOLUMEN;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_MOTIVIDAD.
     *
     * @return mixed
     */
    public function getESPERMOMOTIVIDAD()
    {
        return $this->ESPERMO_MOTIVIDAD;
    }

    /**
     * Sets the value of ESPERMO_MOTIVIDAD.
     *
     * @param mixed $ESPERMO_MOTIVIDAD the 
     *
     * @return self
     */
    public function setESPERMOMOTIVIDAD($ESPERMO_MOTIVIDAD)
    {
        $this->ESPERMO_MOTIVIDAD = $ESPERMO_MOTIVIDAD;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_FN.
     *
     * @return mixed
     */
    public function getESPERMOFN()
    {
        return $this->ESPERMO_FN;
    }

    /**
     * Sets the value of ESPERMO_FN.
     *
     * @param mixed $ESPERMO_FN the 
     *
     * @return self
     */
    public function setESPERMOFN($ESPERMO_FN)
    {
        $this->ESPERMO_FN = $ESPERMO_FN;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_DNA.
     *
     * @return mixed
     */
    public function getESPERMODNA()
    {
        return $this->ESPERMO_DNA;
    }

    /**
     * Sets the value of ESPERMO_DNA.
     *
     * @param mixed $ESPERMO_DNA the 
     *
     * @return self
     */
    public function setESPERMODNA($ESPERMO_DNA)
    {
        $this->ESPERMO_DNA = $ESPERMO_DNA;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_CULTIVO.
     *
     * @return mixed
     */
    public function getESPERMOCULTIVO()
    {
        return $this->ESPERMO_CULTIVO;
    }

    /**
     * Sets the value of ESPERMO_CULTIVO.
     *
     * @param mixed $ESPERMO_CULTIVO the 
     *
     * @return self
     */
    public function setESPERMOCULTIVO($ESPERMO_CULTIVO)
    {
        $this->ESPERMO_CULTIVO = $ESPERMO_CULTIVO;

        return $this;
    }

    /**
     * Gets the value of ESPERMO_APP.
     *
     * @return mixed
     */
    public function getESPERMOAPP()
    {
        return $this->ESPERMO_APP;
    }

    /**
     * Sets the value of ESPERMO_APP.
     *
     * @param mixed $ESPERMO_APP the 
     *
     * @return self
     */
    public function setESPERMOAPP($ESPERMO_APP)
    {
        $this->ESPERMO_APP = $ESPERMO_APP;

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
     * Gets the value of CIRUGIAS_PREVIAS.
     *
     * @return mixed
     */
    public function getCIRUGIASPREVIAS()
    {
        return $this->CIRUGIAS_PREVIAS;
    }

    /**
     * Sets the value of CIRUGIAS_PREVIAS.
     *
     * @param mixed $CIRUGIAS_PREVIAS the 
     *
     * @return self
     */
    public function setCIRUGIASPREVIAS($CIRUGIAS_PREVIAS)
    {
        $this->CIRUGIAS_PREVIAS = $CIRUGIAS_PREVIAS;

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
}