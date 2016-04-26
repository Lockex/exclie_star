<?php 
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Doctrine ORM implementation of Usuarios entity
 *
 * @ORM\Entity
 * @ORM\Table(name="`agendas`")
 */
class Agendas {
    /** @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")  
     * @ORM\Column(type="integer")
     */
    protected $id;
    /** @ORM\ManyToOne(targetEntity="Usuarios") @ORM\JoinColumn(referencedColumnName="id") */
    protected $usuariox;
    /** @ORM\ManyToOne(targetEntity="Pacientes") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $paciente;
    /** @ORM\ManyToOne(targetEntity="Doctores") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $refdocid;
    /** @ORM\Column(type="string",nullable=true) */
    protected $descripcion;
    /** @ORM\Column(type="string",nullable=true) */
    protected $edad;
    /** @ORM\Column(type="string",nullable=true) */
    protected $refdoctor;
    /** @ORM\ManyToOne(targetEntity="Dependencias") @ORM\JoinColumn(referencedColumnName="ID") */
    protected $dependencia;    
    /** @ORM\Column(type="string",nullable=true) */
    protected $telefono1;
    /** @ORM\Column(type="string",nullable=true) */
    protected $telefono2;
    /** @ORM\Column(type="string") */
    protected $title;
    /** @ORM\Column(type="string") */
    protected $pacientenr;
    /** @ORM\Column(type="boolean") */
    protected $allDay=false;
    /** @ORM\Column(type="string") */
    protected $start;
    /** @ORM\Column(type="string",nullable=true) */
    protected $end;
    /** @ORM\Column(type="string",nullable=true) */
    protected $url;
    /** @ORM\Column(type="string",nullable=true) */
    protected $className;
    /** @ORM\Column(type="string",nullable=true) */
    protected $color;
    /** @ORM\Column(type="string",nullable=true) */
    protected $editable;
    /** @ORM\Column(type="string",nullable=true) */
    protected $startEditable;
    /** @ORM\Column(type="string",nullable=true) */
    protected $durationEditable;
    /** @ORM\Column(type="string",nullable=true) */
    protected $source;
    /** @ORM\Column(type="string",nullable=true) */
    protected $backgroundColor;
    /** @ORM\Column(type="string",nullable=true) */
    protected $textColor;
    /** @ORM\Column(type="string",nullable=true) */
    protected $borderColor;
    /** @ORM\Column(type="string",nullable=true) */
    protected $country;
    /** @ORM\ManyToOne(targetEntity="Usuarios") @ORM\JoinColumn(referencedColumnName="id") */
    protected $doctor;
    /** @ORM\Column(type="string",nullable=true) */
    protected $reservado;
    /** @ORM\Column(type="string",nullable=true) */
    protected $tipoCargo;
    
    public function __construct()
    {
        $this->tipo = new ArrayCollection();
    }


    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of usuariox.
     *
     * @return mixed
     */
    public function getUsuariox()
    {
        return $this->usuariox;
    }
    
    /**
     * Sets the value of usuariox.
     *
     * @param mixed $usuariox the usuariox 
     *
     * @return self
     */
    public function setUsuariox($usuariox)
    {
        $this->usuariox = $usuariox;

        return $this;
    }

    /**
     * Gets the value of paciente.
     *
     * @return mixed
     */
    public function getPaciente()
    {
        return $this->paciente;
    }
    
    /**
     * Sets the value of paciente.
     *
     * @param mixed $paciente the paciente 
     *
     * @return self
     */
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Gets the value of descripcion.
     *
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
     * Sets the value of descripcion.
     *
     * @param mixed $descripcion the descripcion 
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the value of title.
     *
     * @param mixed $title the title 
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of allDay.
     *
     * @return mixed
     */
    public function getAllDay()
    {
        return $this->allDay;
    }
    
    /**
     * Sets the value of allDay.
     *
     * @param mixed $allDay the all day 
     *
     * @return self
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Gets the value of start.
     *
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }
    
    /**
     * Sets the value of start.
     *
     * @param mixed $start the start 
     *
     * @return self
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Gets the value of end.
     *
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }
    
    /**
     * Sets the value of end.
     *
     * @param mixed $end the end 
     *
     * @return self
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Gets the value of url.
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * Sets the value of url.
     *
     * @param mixed $url the url 
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Gets the value of className.
     *
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }
    
    /**
     * Sets the value of className.
     *
     * @param mixed $className the class name 
     *
     * @return self
     */
    public function setClassName($className)
    {
        $this->className = $className;

        return $this;
    }

    /**
     * Gets the value of color.
     *
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }
    
    /**
     * Sets the value of color.
     *
     * @param mixed $color the color 
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Gets the value of editable.
     *
     * @return mixed
     */
    public function getEditable()
    {
        return $this->editable;
    }
    
    /**
     * Sets the value of editable.
     *
     * @param mixed $editable the editable 
     *
     * @return self
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * Gets the value of startEditable.
     *
     * @return mixed
     */
    public function getStartEditable()
    {
        return $this->startEditable;
    }
    
    /**
     * Sets the value of startEditable.
     *
     * @param mixed $startEditable the start editable 
     *
     * @return self
     */
    public function setStartEditable($startEditable)
    {
        $this->startEditable = $startEditable;

        return $this;
    }

    /**
     * Gets the value of durationEditable.
     *
     * @return mixed
     */
    public function getDurationEditable()
    {
        return $this->durationEditable;
    }
    
    /**
     * Sets the value of durationEditable.
     *
     * @param mixed $durationEditable the duration editable 
     *
     * @return self
     */
    public function setDurationEditable($durationEditable)
    {
        $this->durationEditable = $durationEditable;

        return $this;
    }

    /**
     * Gets the value of source.
     *
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }
    
    /**
     * Sets the value of source.
     *
     * @param mixed $source the source 
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Gets the value of backgroundColor.
     *
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }
    
    /**
     * Sets the value of backgroundColor.
     *
     * @param mixed $backgroundColor the background color 
     *
     * @return self
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Gets the value of textColor.
     *
     * @return mixed
     */
    public function getTextColor()
    {
        return $this->textColor;
    }
    
    /**
     * Sets the value of textColor.
     *
     * @param mixed $textColor the text color 
     *
     * @return self
     */
    public function setTextColor($textColor)
    {
        $this->textColor = $textColor;

        return $this;
    }

    /**
     * Gets the value of borderColor.
     *
     * @return mixed
     */
    public function getBorderColor()
    {
        return $this->borderColor;
    }
    
    /**
     * Sets the value of borderColor.
     *
     * @param mixed $borderColor the border color 
     *
     * @return self
     */
    public function setBorderColor($borderColor)
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    /**
     * Gets the value of country.
     *
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Sets the value of country.
     *
     * @param mixed $country the country 
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Gets the value of edad.
     *
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }
    
    /**
     * Sets the value of edad.
     *
     * @param mixed $edad the edad 
     *
     * @return self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Gets the value of refdoctor.
     *
     * @return mixed
     */
    public function getRefdoctor()
    {
        return $this->refdoctor;
    }
    
    /**
     * Sets the value of refdoctor.
     *
     * @param mixed $refdoctor the refdoctor 
     *
     * @return self
     */
    public function setRefdoctor($refdoctor)
    {
        $this->refdoctor = $refdoctor;

        return $this;
    }

    /**
     * Gets the value of dependencia.
     *
     * @return mixed
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }
    
    /**
     * Sets the value of dependencia.
     *
     * @param mixed $dependencia the dependencia 
     *
     * @return self
     */
    public function setDependencia($dependencia)
    {
        $this->dependencia = $dependencia;

        return $this;
    }

    function setTipo($tipos) {
      $this->tipo = new ArrayCollection();
      $this->tipo[] = $tipos;
      return $this;
    }

    /**
     * Gets the value of estudios.
     *
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    

    /**
     * Gets the value of doctor.
     *
     * @return mixed
     */
    public function getDoctor()
    {
        return $this->doctor;
    }
    
    /**
     * Sets the value of doctor.
     *
     * @param mixed $doctor the doctor 
     *
     * @return self
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id 
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of ESTUDIO.
     *
     * @return mixed
     */
    public function getESTUDIO()
    {
        return $this->ESTUDIO;
    }
    
    /**
     * Sets the value of ESTUDIO.
     *
     * @param mixed $ESTUDIO the es tu di o 
     *
     * @return self
     */
    public function setESTUDIO($ESTUDIO)
    {
        $this->ESTUDIO = $ESTUDIO;

        return $this;
    }

    /**
     * Gets the value of telefono1.
     *
     * @return mixed
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * Sets the value of telefono1.
     *
     * @param mixed $telefono1 the telefono1
     *
     * @return self
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Gets the value of telefono2.
     *
     * @return mixed
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Sets the value of telefono2.
     *
     * @param mixed $telefono2 the telefono2
     *
     * @return self
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;

        return $this;
    }

    /**
     * Gets the value of refdocid.
     *
     * @return mixed
     */
    public function getRefdocid()
    {
        return $this->refdocid;
    }

    /**
     * Sets the value of refdocid.
     *
     * @param mixed $refdocid the refdocid
     *
     * @return self
     */
    public function setRefdocid($refdocid)
    {
        $this->refdocid = $refdocid;

        return $this;
    }

    /**
     * Gets the value of pacientenr.
     *
     * @return mixed
     */
    public function getPacientenr()
    {
        return $this->pacientenr;
    }

    /**
     * Sets the value of pacientenr.
     *
     * @param mixed $pacientenr the pacientenr
     *
     * @return self
     */
    public function setPacientenr($pacientenr)
    {
        $this->pacientenr = $pacientenr;

        return $this;
    }

    /**
     * Gets the value of fecha.
     *
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Sets the value of fecha.
     *
     * @param mixed $fecha the fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Gets the value of reservado.
     *
     * @return mixed
     */
    public function getReservado()
    {
        return $this->reservado;
    }

    /**
     * Sets the value of reservado.
     *
     * @param mixed $reservado the reservado
     *
     * @return self
     */
    public function setReservado($reservado)
    {
        $this->reservado = $reservado;

        return $this;
    }

    /**
     * Gets the value of tipoCargo.
     *
     * @return mixed
     */
    public function getTipoCargo()
    {
        return $this->tipoCargo;
    }

    /**
     * Sets the value of tipoCargo.
     *
     * @param mixed $tipoCargo the tipo cargo
     *
     * @return self
     */
    public function setTipoCargo($tipoCargo)
    {
        $this->tipoCargo = $tipoCargo;

        return $this;
    }
}