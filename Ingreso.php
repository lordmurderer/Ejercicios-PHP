<?php

class Persona { 
    private $nombre;
    private $apellido;
    private $edad;
    private $ingresos;
    //private $ingresosMen;
    //private $ingresosAn;




   public function __construct($nombre, $apellido, $edad,$ingresos) {
       $this->set_nombre($nombre); 
       $this->set_apellido($apellido);
       $this->set_edad($edad);
       $this->ingresos= $ingresos; //arreglo
    } 
    public function getIngresos(){
        return $this->ingresos;
    }
    public function get_nombre(){
       return $this->nombre;
    }
    public function set_nombre($nombre){
       $this->nombre = $nombre;
    }
    public function get_apellido(){
        return $this->apellido;
    }
    public function set_apellido($apellido){
        $this->apellido= $apellido;
    }
    public function get_edad(){
        return $this->edad;
    }
    public function  set_edad($edad){
        $this->edad=$edad;
    }
    public function get_ingresosMen(){
        return $this->ingresosMen;     
    }
    public function set_ingresosMen($ingresosMen){
        $this->ingresosMen=$ingresosMen;
    }
     public function get_ingresosAn(){
        return $this->ingresosAn;     
    }
    public function set_ingresosAn($ingresosAn){
        $this->ingresosAn=$ingresosAn;
    }
 //si la edad es mayor que 65 automaticamente se vaya a Jubilado, 
 //si no entonces q se vaya a la clase 'empleado'
   
    /*public function calcular_tipoPersona($edad) {
        if ($edad > 65) {
            'Persona JUBILADA';
        }
    }
*/   
     
          public function sumarIngresos($ingresos) {
        foreach($ingresos as $valor){
            echo "Suma(monto_mensual + aguinaldo):  ".($valor->get_monto_mensual() + $valor->get_aguinaldo())."<br>";
        } 
        
          }
      

    public function calcular_ingreso_mensual() {
        foreach ($this->getIngresos() as $ingresoMen) {
            $total=($ingresoMen->get_monto_mensual() + $ingresoMen->get_aguinaldo());
            $total2 += $total;
        }
        echo "suma de los ingresos mensuales: ".$total2."<br>";
    }

    public function calcular_ingreso_anual() {
        foreach ($this->getIngresos() as $ingresoAn) {
            $total=(($ingresoAn->get_monto_mensual()*12 )+ $ingresoAn->get_aguinaldo());
            $total2 += $total;
        }
        echo "suma de los ingresos anuales: ".$total2."<br>";
    }

}

//Clases hijas de la clase 'Persona'
class Empleado extends Persona {
    public $id_empleado;
    public $departamento;
    public $sueldo;
    
    
    public function __construct($id_empleado,$departamento){
        $this->id_empleado= $id_empleado;
        $this->departamento=$departamento;
        $this->sueldo= new Salario();  
    }
     public function get_id_empleado(){
       return $this->id_empleado;
    }
    public function set_id_empleado($id_empleado){
       $this->id_empleado = $id_empleado;
    }
     public function get_departamento(){
       return $this->departamento;
    }
    public function set_departamento($departamento){
       $this->departamento = $departamento;
    }
     public function get_sueldo(){
       return $this->sueldo;
    }
    public function set_sueldo($sueldo){
       $this->sueldo = $sueldo;
    }



}


class Jubilado extends Persona {
    public $pension;
    
    public function __construct($pension) {
        $this->pension=$pension;
           }
           
    public function get_pension(){
       return $this->pension;
    }
    public function set_pension($pension){
       $this->pension = $pension;    
    }
    
    
    public function calcularPension(){
        $this->pension = ((pension* $edad)/2);
        
    }
}

class Ingreso {
    
    private $monto_mensual;
    private $aguinaldo; 
   
    public function __construct ($monto_mensual,$aguinaldo){
        $this->monto_mensual = $monto_mensual;
        $this->aguinaldo=$aguinaldo;
    }
    
    public function get_monto_mensual(){
       return $this->monto_mensual;
    }
    public function set_monto_mensual($monto_mensual){
       $this->monto_mensual = $monto_mensual;
    }
    public function get_aguinaldo(){
       return $this->aguinaldo;
    }
    public function set_aguinaldo($aguinaldo){
       $this->aguinaldo = $aguinaldo;
    }

}



$persona = new Persona('Adrian', 'Juarez',45,array(new Ingreso(5,5),new Ingreso(8,8)));
$persona->sumarIngresos($persona->getIngresos());
$persona->calcular_ingreso_mensual();
$persona->calcular_ingreso_anual();
//var_dump($persona);


//$persona->sumarIngresos($ingreso);
/*
echo $persona->get_apellido();
echo $persona->get_edad();
echo $persona->get_nombre();
echo $persona->get_ingresos();
*/


//clases hijas de la clase 'Ingreso'
//dejarlas vacÃ­as
class Pension {
    
}

class Salario{
    public $s;
    public function __construct(){
        
    }
          
}
