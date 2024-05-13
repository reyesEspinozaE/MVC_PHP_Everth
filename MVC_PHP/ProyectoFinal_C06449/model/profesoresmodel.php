<?php
include_once 'class/profesores.php';
include_once 'class/grupos.php';

class ProfesoresModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getProfesores(){        
        $items = [];

        try {
            //code...
            $stringSQL =  "SELECT id, cedula, correoelectronico, telefono, telefonocelular, 
            fechanacimiento, sexo, direccion, nombre, apellidopaterno, 
            apellidomaterno, nacionalidad, idCarreras, usuario FROM `profesor` order by id DESC;";  

            $query = $this->db->connect()->query($stringSQL);

            while ( $row = $query->fetch()){//obtiene todas las filas
                $item = new classProfesores();

                foreach ($row as $key => $value) {
                    # code...
                    $item->$key = $value;
                }
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $th) {
            //throw $th;
            return [];
        }
    }
    public function getGrupos(){
        $items = [];

        try {
            //code...
            $stringSQL = "SELECT * FROM `grupo` order by id DESC;";
            $query = $this->db->connect()->query($stringSQL);

            while ( $row = $query->fetch()){//obtiene todas las filas
                $item = new classGrupos();

                foreach ($row as $key => $value) {
                    # code...
                    $item->$key = $value;
                }
                array_push($items, $item);
            }
            return $items;
            
        } catch (PDOException $th) {
            //throw $th;
            return [];
        }
    }

    public function insertarProfesor($datos){
    //var_dump($datos);
    try {
        //code...
        $datos['id'] = "0";
        $datos['usuario'] = "Ev";

        $stringSQL = 'INSERT INTO profesor(id, cedula, correoelectronico, telefono, telefonocelular, 
        fechanacimiento, sexo, direccion, nombre, apellidopaterno, 
        apellidomaterno, nacionalidad, idCarreras, usuario) VALUES ( :id, :cedula, :correoelectronico, :telefono, :telefonocelular, 
        :fechanacimiento, :sexo, :direccion, :nombre, :apellidopaterno, 
        :apellidomaterno, :nacionalidad, :idCarreras, :usuario);';

      
        $query = $this->db->connect()->prepare($stringSQL);
        $query->execute($datos);
        return true;

    } catch (PDOException $th) {
        //throw $th;
        //var_dump($th);
        return false;
    }
    }

    public function verProfesores($id){
        try {
            $item = new classProfesores();
            //code...
            $stringSQL = "Select id, cedula, correoelectronico, telefono, telefonocelular, 
            fechanacimiento, sexo, direccion, nombre, apellidopaterno, 
            apellidomaterno, nacionalidad, idCarreras, usuario FROM `profesor` where id=:id;";
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id'=>$id]);

            while ( $row = $query->fetch()){//obtiene la fila
                foreach ($row as $key => $value) {
                    # code...
                    $item->$key = $value;
                }
            }
            return $item;
        } catch (PDOException $th) {
            //throw $th;
            return [];
        }           
    }
      //actualizarprofesor
      public function actualizarProfesores($datos){
        //var_dump($datos);
        try {
            //code... 
            $datos['usuario'] = "Ev";

            $stringSQL = 'UPDATE profesor SET cedula=:cedula,correoelectronico=:correoelectronico,telefono=:telefono,
            telefonocelular =:telefonocelular, fechanacimiento =:fechanacimiento, 
            sexo =:sexo, direccion=:direccion, nombre=:nombre, apellidopaterno=:apellidopaterno, apellidomaterno=:apellidomaterno, nacionalidad=:nacionalidad, idCarreras=:idCarreras, usuario=:usuario WHERE id=:id ;';
            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute($datos);
            return true;

        } catch (PDOException $th) {
            //throw $th;
            var_dump($th);
            return false;
        }
    }   

    //eliminarprofesor
    public function eliminarProfesores($id){        
        try {            
            //code...
            $stringSQL = "DELETE FROM `profesor` WHERE id =:id;";

            $query = $this->db->connect()->prepare($stringSQL);
            $query->execute(['id'=>$id]);
            
            return true;
        } catch (PDOException $th) {
            //throw $th;
            var_dump($th);
            return false;
        }           
    }
}
