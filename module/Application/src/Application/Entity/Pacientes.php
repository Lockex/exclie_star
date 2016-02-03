<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/** @ORM\Entity 
*/
class Pacientes {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $ID;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CURP;
    /** @ORM\Column(type="integer",nullable=true) */
    protected $SEXO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $NOMBRE;
    /** @ORM\Column(type="string",nullable=true) */
    protected $APELLIDO_PATERNO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $APELLIDO_MATERNO;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_NACIMIENTO;
    /** @ORM\ManyToOne(targetEntity="Nivelessocioeconomicos") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $NIVEL_SOCIOECONOMICO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $OCUPACION;
    /** @ORM\Column(type="integer",nullable=true) */
    protected $EMBARAZO;
    /** @ORM\ManyToOne(targetEntity="Tipossanguineos") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $TIPO_SANGUINEO;
    /** @ORM\ManyToOne(targetEntity="Discapacidades") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $DISCAPACIDAD;
    /** @ORM\ManyToOne(targetEntity="Gruposetnicos") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $GRUPO_ETNICO;
    /** @ORM\ManyToOne(targetEntity="Estados") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $ESTADO;
    /** @ORM\ManyToOne(targetEntity="Religiones") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $RELIGION;
    /** @ORM\ManyToOne(targetEntity="Municipios") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $MUNICIPIO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $CALLE;
    /** @ORM\Column(type="string",nullable=true) */
    protected $NUMERO_EXT;
    /** @ORM\Column(type="string",nullable=true) */
    protected $NUMERO_INT;
    /** @ORM\ManyToOne(targetEntity="Viviendas") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $VIVIENDA;
    /** @ORM\Column(type="integer",nullable=true) */
    protected $CODIGO_POSTAL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $COLONIA;
    /** @ORM\Column(type="string",nullable=true) */
    protected $TELEFONO_1;
    /** @ORM\Column(type="string",nullable=true) */
    protected $TELEFONO_2;
    /** @ORM\Column(type="string",nullable=true) */
    protected $EMAIL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $RFC;
    /** @ORM\Column(type="datetime") */
    protected $FECHA_REGISTRO;
    /** @ORM\ManyToOne(targetEntity="Usuarios") @ORM\JoinColumn(referencedColumnName="id") */
    protected $USUARIO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $ESTADO_CIVIL;
    /** @ORM\Column(type="string",nullable=true) */
    protected $REFERIDO;
    /** @ORM\Column(type="string",nullable=true) */
    protected $IMAGEN;
    /** @ORM\Column(type="date",nullable=true) */
    protected $FECHA_MODIFICACION;
    /** @ORM\ManyToOne(targetEntity="Dependencias") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $DEPENDENCIA;
    /** @ORM\Column(type="string", nullable=true) */
    protected $AFILIACION;
    /** @ORM\Column(type="string", nullable=true) */
    protected $CLINICA;

    public function __construct()
    {        
        $this->ANTECEDENTES = new ArrayCollection();
    }
    // getters/setters
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
     * Gets the value of CURP.
     *
     * @return mixed
     */
    public function getCURP()
    {
        return $this->CURP;
    }
    
    /**
     * Sets the value of CURP.
     *
     * @param mixed $CURP the cu rp 
     *
     * @return self
     */
    public function setCURP($CURP)
    {
        $this->CURP = $CURP;

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
     * Gets the value of APELLIDO_PATERNO.
     *
     * @return mixed
     */
    public function getAPELLIDO_PATERNO()
    {
        return $this->APELLIDO_PATERNO;
    }
    
    /**
     * Sets the value of APELLIDO_PATERNO.
     *
     * @param mixed $APELLIDO_PATERNO the ap el li do  pa te rn o 
     *
     * @return self
     */
    public function setAPELLIDO_PATERNO($APELLIDO_PATERNO)
    {
        $this->APELLIDO_PATERNO = $APELLIDO_PATERNO;

        return $this;
    }

    /**
     * Gets the value of APELLIDO_MATERNO.
     *
     * @return mixed
     */
    public function getAPELLIDO_MATERNO()
    {
        return $this->APELLIDO_MATERNO;
    }
    
    /**
     * Sets the value of APELLIDO_MATERNO.
     *
     * @param mixed $APELLIDO_MATERNO the ap el li do  ma te rn o 
     *
     * @return self
     */
    public function setAPELLIDO_MATERNO($APELLIDO_MATERNO)
    {
        $this->APELLIDO_MATERNO = $APELLIDO_MATERNO;

        return $this;
    }

    /**
     * Gets the value of NIVEL_SOCIOECONOMICO.
     *
     * @return mixed
     */
    public function getNIVEL_SOCIOECONOMICO()
    {
        return $this->NIVEL_SOCIOECONOMICO;
    }
    
    /**
     * Sets the value of NIVEL_SOCIOECONOMICO.
     *
     * @param mixed $NIVEL_SOCIOECONOMICO the ni ve l  so ci oe co no mi co 
     *
     * @return self
     */
    public function setNIVEL_SOCIOECONOMICO($NIVEL_SOCIOECONOMICO)
    {
        $this->NIVEL_SOCIOECONOMICO = $NIVEL_SOCIOECONOMICO;

        return $this;
    }

    /**
     * Gets the value of TIPO_SANGUINEO.
     *
     * @return mixed
     */
    public function getTIPO_SANGUINEO()
    {
        return $this->TIPO_SANGUINEO;
    }
    
    /**
     * Sets the value of TIPO_SANGUINEO.
     *
     * @param mixed $TIPO_SANGUINEO the ti po  sa ng ui ne o 
     *
     * @return self
     */
    public function setTIPO_SANGUINEO($TIPO_SANGUINEO)
    {
        $this->TIPO_SANGUINEO = $TIPO_SANGUINEO;

        return $this;
    }

    /**
     * Gets the value of DISCAPACIDAD.
     *
     * @return mixed
     */
    public function getDISCAPACIDAD()
    {
        return $this->DISCAPACIDAD;
    }
    
    /**
     * Sets the value of DISCAPACIDAD.
     *
     * @param mixed $DISCAPACIDAD the di sc ap ac id ad 
     *
     * @return self
     */
    public function setDISCAPACIDAD($DISCAPACIDAD)
    {
        $this->DISCAPACIDAD = $DISCAPACIDAD;

        return $this;
    }

    /**
     * Gets the value of GRUPO_ETNICO.
     *
     * @return mixed
     */
    public function getGRUPO_ETNICO()
    {
        return $this->GRUPO_ETNICO;
    }
    
    /**
     * Sets the value of GRUPO_ETNICO.
     *
     * @param mixed $GRUPO_ETNICO the gr up o  et ni co 
     *
     * @return self
     */
    public function setGRUPO_ETNICO($GRUPO_ETNICO)
    {
        $this->GRUPO_ETNICO = $GRUPO_ETNICO;

        return $this;
    }

    /**
     * Gets the value of ESTADO.
     *
     * @return mixed
     */
    public function getESTADO()
    {
        return $this->ESTADO;
    }
    
    /**
     * Sets the value of ESTADO.
     *
     * @param mixed $ESTADO the es ta do 
     *
     * @return self
     */
    public function setESTADO($ESTADO)
    {
        $this->ESTADO = $ESTADO;

        return $this;
    }

    /**
     * Gets the value of MUNICIPIO.
     *
     * @return mixed
     */
    public function getMUNICIPIO()
    {
        return $this->MUNICIPIO;
    }
    
    /**
     * Sets the value of MUNICIPIO.
     *
     * @param mixed $MUNICIPIO the mu ni ci pi o 
     *
     * @return self
     */
    public function setMUNICIPIO($MUNICIPIO)
    {
        $this->MUNICIPIO = $MUNICIPIO;

        return $this;
    }

    /**
     * Gets the value of CALLE.
     *
     * @return mixed
     */
    public function getCALLE()
    {
        return $this->CALLE;
    }
    
    /**
     * Sets the value of CALLE.
     *
     * @param mixed $CALLE the ca ll e 
     *
     * @return self
     */
    public function setCALLE($CALLE)
    {
        $this->CALLE = $CALLE;

        return $this;
    }

    /**
     * Gets the value of NUMERO_EXT.
     *
     * @return mixed
     */
    public function getNUMERO_EXT()
    {
        return $this->NUMERO_EXT;
    }
    
    /**
     * Sets the value of NUMERO_EXT.
     *
     * @param mixed $NUMERO_EXT the nu me ro  ex t 
     *
     * @return self
     */
    public function setNUMERO_EXT($NUMERO_EXT)
    {
        $this->NUMERO_EXT = $NUMERO_EXT;

        return $this;
    }

    /**
     * Gets the value of NUMERO_INT.
     *
     * @return mixed
     */
    public function getNUMERO_INT()
    {
        return $this->NUMERO_INT;
    }
    
    /**
     * Sets the value of NUMERO_INT.
     *
     * @param mixed $NUMERO_INT the nu me ro  in t 
     *
     * @return self
     */
    public function setNUMERO_INT($NUMERO_INT)
    {
        $this->NUMERO_INT = $NUMERO_INT;

        return $this;
    }

    /**
     * Gets the value of VIVIENDA.
     *
     * @return mixed
     */
    public function getVIVIENDA()
    {
        return $this->VIVIENDA;
    }
    
    /**
     * Sets the value of VIVIENDA.
     *
     * @param mixed $VIVIENDA the vi vi en da 
     *
     * @return self
     */
    public function setVIVIENDA($VIVIENDA)
    {
        $this->VIVIENDA = $VIVIENDA;

        return $this;
    }

    /**
     * Gets the value of CODIGO_POSTAL.
     *
     * @return mixed
     */
    public function getCODIGO_POSTAL()
    {
        return $this->CODIGO_POSTAL;
    }
    
    /**
     * Sets the value of CODIGO_POSTAL.
     *
     * @param mixed $CODIGO_POSTAL the co di go  po st al 
     *
     * @return self
     */
    public function setCODIGO_POSTAL($CODIGO_POSTAL)
    {
        $this->CODIGO_POSTAL = $CODIGO_POSTAL;

        return $this;
    }

    /**
     * Gets the value of COLONIA.
     *
     * @return mixed
     */
    public function getCOLONIA()
    {
        return $this->COLONIA;
    }
    
    /**
     * Sets the value of COLONIA.
     *
     * @param mixed $COLONIA the co lo ni a 
     *
     * @return self
     */
    public function setCOLONIA($COLONIA)
    {
        $this->COLONIA = $COLONIA;

        return $this;
    }

    /**
     * Gets the value of TELEFONO_1.
     *
     * @return mixed
     */
    public function getTELEFONO_1()
    {
        return $this->TELEFONO_1;
    }
    
    /**
     * Sets the value of TELEFONO_1.
     *
     * @param mixed $TELEFONO_1 the te le fo no  1 
     *
     * @return self
     */
    public function setTELEFONO_1($TELEFONO_1)
    {
        $this->TELEFONO_1 = $TELEFONO_1;

        return $this;
    }

    /**
     * Gets the value of TELEFONO_2.
     *
     * @return mixed
     */
    public function getTELEFONO_2()
    {
        return $this->TELEFONO_2;
    }
    
    /**
     * Sets the value of TELEFONO_2.
     *
     * @param mixed $TELEFONO_2 the te le fo no  2 
     *
     * @return self
     */
    public function setTELEFONO_2($TELEFONO_2)
    {
        $this->TELEFONO_2 = $TELEFONO_2;

        return $this;
    }

    /**
     * Get ANTECEDENTES 
     *
     * @return Collection
     */
    public function getANTECEDENTES()
    {
        return $this->ANTECEDENTES;
    }
    
    /**
     * Get ANTECEDENTES
     *
     * @param Collection
     *
     * @return CIE10
     */
    public function addANTECEDENTES(Collection $ANTECEDENTES)
    {
        foreach ($ANTECEDENTES as $ANTECEDENTE) {
            $this->addANTECEDENTE($ANTECEDENTE);
        }

        return $this;
    }
    public function addANTECEDENTE(\Application\Entity\CIE10 $CIE10)
    {
        $this->ANTECEDENTES[] = $CIE10;

        return $this;
    }

    /**
     * Gets the value of FECHA_REGISTRO.
     *
     * @return mixed
     */
    public function getFECHA_REGISTRO()
    {
        return $this->FECHA_REGISTRO;
    }
    
    /**
     * Sets the value of FECHA_REGISTRO.
     *
     * @param mixed $FECHA_REGISTRO the fe ch a  re gi st ro 
     *
     * @return self
     */
    public function setFECHA_REGISTRO($FECHA_REGISTRO)
    {
        $this->FECHA_REGISTRO = $FECHA_REGISTRO;

        return $this;
    }

    /**
     * Gets the value of FECHA_NACIMIENTO.
     *
     * @return mixed
     */
    public function getFECHA_NACIMIENTO()
    {
        return $this->FECHA_NACIMIENTO;
    }
    
    /**
     * Sets the value of FECHA_NACIMIENTO.
     *
     * @param mixed $FECHA_NACIMIENTO the fe ch a  na ci mi en to 
     *
     * @return self
     */
    public function setFECHA_NACIMIENTO($FECHA_NACIMIENTO)
    {
        $this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;

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
     * Gets the value of SEXO.
     *
     * @return mixed
     */
    public function getSEXO()
    {
        return $this->SEXO;
    }
    
    /**
     * Sets the value of SEXO.
     *
     * @param mixed $SEXO the se xo 
     *
     * @return self
     */
    public function setSEXO($SEXO)
    {
        $this->SEXO = $SEXO;

        return $this;
    }

    /**
     * Gets the value of OCUPACION.
     *
     * @return mixed
     */
    public function getOCUPACION()
    {
        return $this->OCUPACION;
    }
    
    /**
     * Sets the value of OCUPACION.
     *
     * @param mixed $OCUPACION the oc up ac io n 
     *
     * @return self
     */
    public function setOCUPACION($OCUPACION)
    {
        $this->OCUPACION = $OCUPACION;

        return $this;
    }

    /**
     * Gets the value of EMBARAZO.
     *
     * @return mixed
     */
    public function getEMBARAZO()
    {
        return $this->EMBARAZO;
    }
    
    /**
     * Sets the value of EMBARAZO.
     *
     * @param mixed $EMBARAZO the em ba ra zo 
     *
     * @return self
     */
    public function setEMBARAZO($EMBARAZO)
    {
        $this->EMBARAZO = $EMBARAZO;

        return $this;
    }

    /**
     * Gets the value of RFC.
     *
     * @return mixed
     */
    public function getRFC()
    {
        return $this->RFC;
    }
    
    /**
     * Sets the value of RFC.
     *
     * @param mixed $RFC the rf c 
     *
     * @return self
     */
    public function setRFC($RFC)
    {
        $this->RFC = $RFC;

        return $this;
    }

    /**
     * Gets the value of CLIENTE.
     *
     * @return mixed
     */
    public function getCLIENTE()
    {
        return $this->CLIENTE;
    }
    
    /**
     * Sets the value of CLIENTE.
     *
     * @param mixed $CLIENTE the cl ie nt e 
     *
     * @return self
     */
    public function setCLIENTE($CLIENTE)
    {
        $this->CLIENTE = $CLIENTE;

        return $this;
    }

    /**
     * Gets the value of APELLIDO_PATERNO.
     *
     * @return mixed
     */
    public function getAPELLIDOPATERNO()
    {
        return $this->APELLIDO_PATERNO;
    }

    /**
     * Sets the value of APELLIDO_PATERNO.
     *
     * @param mixed $APELLIDO_PATERNO the 
     *
     * @return self
     */
    public function setAPELLIDOPATERNO($APELLIDO_PATERNO)
    {
        $this->APELLIDO_PATERNO = $APELLIDO_PATERNO;

        return $this;
    }

    /**
     * Gets the value of APELLIDO_MATERNO.
     *
     * @return mixed
     */
    public function getAPELLIDOMATERNO()
    {
        return $this->APELLIDO_MATERNO;
    }

    /**
     * Sets the value of APELLIDO_MATERNO.
     *
     * @param mixed $APELLIDO_MATERNO the 
     *
     * @return self
     */
    public function setAPELLIDOMATERNO($APELLIDO_MATERNO)
    {
        $this->APELLIDO_MATERNO = $APELLIDO_MATERNO;

        return $this;
    }

    /**
     * Gets the value of FECHA_NACIMIENTO.
     *
     * @return mixed
     */
    public function getFECHANACIMIENTO()
    {
        return $this->FECHA_NACIMIENTO;
    }

    /**
     * Sets the value of FECHA_NACIMIENTO.
     *
     * @param mixed $FECHA_NACIMIENTO the 
     *
     * @return self
     */
    public function setFECHANACIMIENTO($FECHA_NACIMIENTO)
    {
        $this->FECHA_NACIMIENTO = $FECHA_NACIMIENTO;

        return $this;
    }

    /**
     * Gets the value of NIVEL_SOCIOECONOMICO.
     *
     * @return mixed
     */
    public function getNIVELSOCIOECONOMICO()
    {
        return $this->NIVEL_SOCIOECONOMICO;
    }

    /**
     * Sets the value of NIVEL_SOCIOECONOMICO.
     *
     * @param mixed $NIVEL_SOCIOECONOMICO the 
     *
     * @return self
     */
    public function setNIVELSOCIOECONOMICO($NIVEL_SOCIOECONOMICO)
    {
        $this->NIVEL_SOCIOECONOMICO = $NIVEL_SOCIOECONOMICO;

        return $this;
    }

    /**
     * Gets the value of TIPO_SANGUINEO.
     *
     * @return mixed
     */
    public function getTIPOSANGUINEO()
    {
        return $this->TIPO_SANGUINEO;
    }

    /**
     * Sets the value of TIPO_SANGUINEO.
     *
     * @param mixed $TIPO_SANGUINEO the 
     *
     * @return self
     */
    public function setTIPOSANGUINEO($TIPO_SANGUINEO)
    {
        $this->TIPO_SANGUINEO = $TIPO_SANGUINEO;

        return $this;
    }

    /**
     * Gets the value of GRUPO_ETNICO.
     *
     * @return mixed
     */
    public function getGRUPOETNICO()
    {
        return $this->GRUPO_ETNICO;
    }

    /**
     * Sets the value of GRUPO_ETNICO.
     *
     * @param mixed $GRUPO_ETNICO the 
     *
     * @return self
     */
    public function setGRUPOETNICO($GRUPO_ETNICO)
    {
        $this->GRUPO_ETNICO = $GRUPO_ETNICO;

        return $this;
    }

    /**
     * Gets the value of RELIGION.
     *
     * @return mixed
     */
    public function getRELIGION()
    {
        return $this->RELIGION;
    }

    /**
     * Sets the value of RELIGION.
     *
     * @param mixed $RELIGION the 
     *
     * @return self
     */
    public function setRELIGION($RELIGION)
    {
        $this->RELIGION = $RELIGION;

        return $this;
    }

    /**
     * Gets the value of NUMERO_EXT.
     *
     * @return mixed
     */
    public function getNUMEROEXT()
    {
        return $this->NUMERO_EXT;
    }

    /**
     * Sets the value of NUMERO_EXT.
     *
     * @param mixed $NUMERO_EXT the 
     *
     * @return self
     */
    public function setNUMEROEXT($NUMERO_EXT)
    {
        $this->NUMERO_EXT = $NUMERO_EXT;

        return $this;
    }

    /**
     * Gets the value of NUMERO_INT.
     *
     * @return mixed
     */
    public function getNUMEROINT()
    {
        return $this->NUMERO_INT;
    }

    /**
     * Sets the value of NUMERO_INT.
     *
     * @param mixed $NUMERO_INT the 
     *
     * @return self
     */
    public function setNUMEROINT($NUMERO_INT)
    {
        $this->NUMERO_INT = $NUMERO_INT;

        return $this;
    }

    /**
     * Gets the value of CODIGO_POSTAL.
     *
     * @return mixed
     */
    public function getCODIGOPOSTAL()
    {
        return $this->CODIGO_POSTAL;
    }

    /**
     * Sets the value of CODIGO_POSTAL.
     *
     * @param mixed $CODIGO_POSTAL the 
     *
     * @return self
     */
    public function setCODIGOPOSTAL($CODIGO_POSTAL)
    {
        $this->CODIGO_POSTAL = $CODIGO_POSTAL;

        return $this;
    }

    /**
     * Gets the value of TELEFONO_1.
     *
     * @return mixed
     */
    public function getTELEFONO1()
    {
        return $this->TELEFONO_1;
    }

    /**
     * Sets the value of TELEFONO_1.
     *
     * @param mixed $TELEFONO_1 the 1
     *
     * @return self
     */
    public function setTELEFONO1($TELEFONO_1)
    {
        $this->TELEFONO_1 = $TELEFONO_1;

        return $this;
    }

    /**
     * Gets the value of TELEFONO_2.
     *
     * @return mixed
     */
    public function getTELEFONO2()
    {
        return $this->TELEFONO_2;
    }

    /**
     * Sets the value of TELEFONO_2.
     *
     * @param mixed $TELEFONO_2 the 2
     *
     * @return self
     */
    public function setTELEFONO2($TELEFONO_2)
    {
        $this->TELEFONO_2 = $TELEFONO_2;

        return $this;
    }

    /**
     * Gets the value of FECHA_REGISTRO.
     *
     * @return mixed
     */
    public function getFECHAREGISTRO()
    {
        return $this->FECHA_REGISTRO;
    }

    /**
     * Sets the value of FECHA_REGISTRO.
     *
     * @param mixed $FECHA_REGISTRO the 
     *
     * @return self
     */
    public function setFECHAREGISTRO($FECHA_REGISTRO)
    {
        $this->FECHA_REGISTRO = $FECHA_REGISTRO;

        return $this;
    }

    /**
     * Gets the value of AFILIACION.
     *
     * @return mixed
     */
    public function getAFILIACION()
    {
        return $this->AFILIACION;
    }

    /**
     * Sets the value of AFILIACION.
     *
     * @param mixed $AFILIACION the 
     *
     * @return self
     */
    public function setAFILIACION($AFILIACION)
    {
        $this->AFILIACION = $AFILIACION;

        return $this;
    }

    /**
     * Gets the value of USUARIO.
     *
     * @return mixed
     */
    public function getUSUARIO()
    {
        return $this->USUARIO;
    }

    /**
     * Sets the value of USUARIO.
     *
     * @param mixed $USUARIO the 
     *
     * @return self
     */
    public function setUSUARIO($USUARIO)
    {
        $this->USUARIO = $USUARIO;

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
     * @param mixed $DEPENDENCIA the 
     *
     * @return self
     */
    public function setDEPENDENCIA($DEPENDENCIA)
    {
        $this->DEPENDENCIA = $DEPENDENCIA;

        return $this;
    }

    /**
     * Gets the value of CLINICA.
     *
     * @return mixed
     */
    public function getCLINICA()
    {
        return $this->CLINICA;
    }

    /**
     * Sets the value of CLINICA.
     *
     * @param mixed $CLINICA the 
     *
     * @return self
     */
    public function setCLINICA($CLINICA)
    {
        $this->CLINICA = $CLINICA;

        return $this;
    }

    /**
     * Gets the value of ESTADO_CIVIL.
     *
     * @return mixed
     */
    public function getESTADOCIVIL()
    {
        return $this->ESTADO_CIVIL;
    }

    /**
     * Sets the value of ESTADO_CIVIL.
     *
     * @param mixed $ESTADO_CIVIL the 
     *
     * @return self
     */
    public function setESTADOCIVIL($ESTADO_CIVIL)
    {
        $this->ESTADO_CIVIL = $ESTADO_CIVIL;

        return $this;
    }

    /**
     * Gets the value of REFERIDO.
     *
     * @return mixed
     */
    public function getREFERIDO()
    {
        return $this->REFERIDO;
    }

    /**
     * Sets the value of REFERIDO.
     *
     * @param mixed $REFERIDO the 
     *
     * @return self
     */
    public function setREFERIDO($REFERIDO)
    {
        $this->REFERIDO = $REFERIDO;

        return $this;
    }

    /**
     * Gets the value of NOMBRE_C.
     *
     * @return mixed
     */
    public function getNOMBREC()
    {
        return $this->NOMBRE_C;
    }

    /**
     * Sets the value of NOMBRE_C.
     *
     * @param mixed $NOMBRE_C the 
     *
     * @return self
     */
    public function setNOMBREC($NOMBRE_C)
    {
        $this->NOMBRE_C = $NOMBRE_C;

        return $this;
    }

    /**
     * Gets the value of DIRECCIONC.
     *
     * @return mixed
     */
    public function getDIRECCIONC()
    {
        return $this->DIRECCIONC;
    }

    /**
     * Sets the value of DIRECCIONC.
     *
     * @param mixed $DIRECCIONC the 
     *
     * @return self
     */
    public function setDIRECCIONC($DIRECCIONC)
    {
        $this->DIRECCIONC = $DIRECCIONC;

        return $this;
    }

    /**
     * Gets the value of TELEFONOC.
     *
     * @return mixed
     */
    public function getTELEFONOC()
    {
        return $this->TELEFONOC;
    }

    /**
     * Sets the value of TELEFONOC.
     *
     * @param mixed $TELEFONOC the 
     *
     * @return self
     */
    public function setTELEFONOC($TELEFONOC)
    {
        $this->TELEFONOC = $TELEFONOC;

        return $this;
    }

    /**
     * Gets the value of APELLIDOPATERNOC.
     *
     * @return mixed
     */
    public function getAPELLIDOPATERNOC()
    {
        return $this->APELLIDOPATERNOC;
    }

    /**
     * Sets the value of APELLIDOPATERNOC.
     *
     * @param mixed $APELLIDOPATERNOC the 
     *
     * @return self
     */
    public function setAPELLIDOPATERNOC($APELLIDOPATERNOC)
    {
        $this->APELLIDOPATERNOC = $APELLIDOPATERNOC;

        return $this;
    }

    /**
     * Gets the value of APELLIDOMATERNOC.
     *
     * @return mixed
     */
    public function getAPELLIDOMATERNOC()
    {
        return $this->APELLIDOMATERNOC;
    }

    /**
     * Sets the value of APELLIDOMATERNOC.
     *
     * @param mixed $APELLIDOMATERNOC the 
     *
     * @return self
     */
    public function setAPELLIDOMATERNOC($APELLIDOMATERNOC)
    {
        $this->APELLIDOMATERNOC = $APELLIDOMATERNOC;

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
     * Gets the value of OTROS_PAT.
     *
     * @return mixed
     */
    public function getOTROSPAT()
    {
        return $this->OTROS_PAT;
    }

    /**
     * Sets the value of OTROS_PAT.
     *
     * @param mixed $OTROS_PAT the 
     *
     * @return self
     */
    public function setOTROSPAT($OTROS_PAT)
    {
        $this->OTROS_PAT = $OTROS_PAT;

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
     * Gets the value of C1.
     *
     * @return mixed
     */
    public function getC1()
    {
        return $this->C1;
    }

    /**
     * Sets the value of C1.
     *
     * @param mixed $C1 the c1
     *
     * @return self
     */
    public function setC1($C1)
    {
        $this->C1 = $C1;

        return $this;
    }

    /**
     * Gets the value of C2.
     *
     * @return mixed
     */
    public function getC2()
    {
        return $this->C2;
    }

    /**
     * Sets the value of C2.
     *
     * @param mixed $C2 the c2
     *
     * @return self
     */
    public function setC2($C2)
    {
        $this->C2 = $C2;

        return $this;
    }

    /**
     * Gets the value of C3.
     *
     * @return mixed
     */
    public function getC3()
    {
        return $this->C3;
    }

    /**
     * Sets the value of C3.
     *
     * @param mixed $C3 the c3
     *
     * @return self
     */
    public function setC3($C3)
    {
        $this->C3 = $C3;

        return $this;
    }

    /**
     * Gets the value of C4.
     *
     * @return mixed
     */
    public function getC4()
    {
        return $this->C4;
    }

    /**
     * Sets the value of C4.
     *
     * @param mixed $C4 the c4
     *
     * @return self
     */
    public function setC4($C4)
    {
        $this->C4 = $C4;

        return $this;
    }

    /**
     * Gets the value of C5.
     *
     * @return mixed
     */
    public function getC5()
    {
        return $this->C5;
    }

    /**
     * Sets the value of C5.
     *
     * @param mixed $C5 the c5
     *
     * @return self
     */
    public function setC5($C5)
    {
        $this->C5 = $C5;

        return $this;
    }

    /**
     * Gets the value of C6.
     *
     * @return mixed
     */
    public function getC6()
    {
        return $this->C6;
    }

    /**
     * Sets the value of C6.
     *
     * @param mixed $C6 the c6
     *
     * @return self
     */
    public function setC6($C6)
    {
        $this->C6 = $C6;

        return $this;
    }

    /**
     * Gets the value of ESCOLARIDAD.
     *
     * @return mixed
     */
    public function getESCOLARIDAD()
    {
        return $this->ESCOLARIDAD;
    }

    /**
     * Sets the value of ESCOLARIDAD.
     *
     * @param mixed $ESCOLARIDAD the 
     *
     * @return self
     */
    public function setESCOLARIDAD($ESCOLARIDAD)
    {
        $this->ESCOLARIDAD = $ESCOLARIDAD;

        return $this;
    }

    /**
     * Gets the value of CARGO.
     *
     * @return mixed
     */
    public function getCARGO()
    {
        return $this->CARGO;
    }

    /**
     * Sets the value of CARGO.
     *
     * @param mixed $CARGO the 
     *
     * @return self
     */
    public function setCARGO($CARGO)
    {
        $this->CARGO = $CARGO;

        return $this;
    }

    /**
     * Gets the value of COMENTARIOS.
     *
     * @return mixed
     */
    public function getCOMENTARIOS()
    {
        return $this->COMENTARIOS;
    }

    /**
     * Sets the value of COMENTARIOS.
     *
     * @param mixed $COMENTARIOS the 
     *
     * @return self
     */
    public function setCOMENTARIOS($COMENTARIOS)
    {
        $this->COMENTARIOS = $COMENTARIOS;

        return $this;
    }

    /**
     * Gets the value of FECHA_MODIFICACION.
     *
     * @return mixed
     */
    public function getFECHAMODIFICACION()
    {
        return $this->FECHA_MODIFICACION;
    }

    /**
     * Sets the value of FECHA_MODIFICACION.
     *
     * @param mixed $FECHA_MODIFICACION the 
     *
     * @return self
     */
    public function setFECHAMODIFICACION($FECHA_MODIFICACION)
    {
        $this->FECHA_MODIFICACION = $FECHA_MODIFICACION;

        return $this;
    }

    /**
     * Gets the value of NOTAS_GENERALES.
     *
     * @return mixed
     */
    public function getNOTASGENERALES()
    {
        return $this->NOTAS_GENERALES;
    }

    /**
     * Sets the value of NOTAS_GENERALES.
     *
     * @param mixed $NOTAS_GENERALES the 
     *
     * @return self
     */
    public function setNOTASGENERALES($NOTAS_GENERALES)
    {
        $this->NOTAS_GENERALES = $NOTAS_GENERALES;

        return $this;
    }

    /**
     * Gets the value of PADECIMIENTO_ACTUAL.
     *
     * @return mixed
     */
    public function getPADECIMIENTOACTUAL()
    {
        return $this->PADECIMIENTO_ACTUAL;
    }

    /**
     * Sets the value of PADECIMIENTO_ACTUAL.
     *
     * @param mixed $PADECIMIENTO_ACTUAL the 
     *
     * @return self
     */
    public function setPADECIMIENTOACTUAL($PADECIMIENTO_ACTUAL)
    {
        $this->PADECIMIENTO_ACTUAL = $PADECIMIENTO_ACTUAL;

        return $this;
    }

    /**
     * Gets the value of SECUENCIAL.
     *
     * @return mixed
     */
    public function getSECUENCIAL()
    {
        return $this->SECUENCIAL;
    }

    /**
     * Sets the value of SECUENCIAL.
     *
     * @param mixed $SECUENCIAL the 
     *
     * @return self
     */
    public function setSECUENCIAL($SECUENCIAL)
    {
        $this->SECUENCIAL = $SECUENCIAL;

        return $this;
    }
}