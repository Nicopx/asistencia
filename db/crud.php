<?php
   class crud
   {
        private $db;
        
        //constructor para inicializar la variable privada db con conexion de la db
        function __construct($conn){
            $this -> db = $conn;
        }

        //parametros que recibe el metood insert son los que el usuario ingresa 
        // en el formulario de registro.
        public function insert($nomb, $apell, $fecha_n,$email, $cel, $especialidad){
            try {
                //definición de la declaracion sql a ejecutar
                $sql = "INSERT INTO asistentes (nombre, apellido, fecha_nacimiento, email, celular, especialidad_id) VALUES (:nomb, :apell, :fecha_n, :email, :cel, :especialidad)";
                //preparo la declaracion sql para ejecucion
                $stmt = $this->db->prepare($sql);

                //Bindeo cada placehober con el valor que se pasa por parametro.
                $stmt->bindparam(':nomb',$nomb);
                $stmt->bindparam(':apell',$apell);
                $stmt->bindparam(':fecha_n',$fecha_n);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':cel',$cel);
                $stmt->bindparam(':especialidad',$especialidad);

                $stmt->execute();
                return true;//si stmt es exitoso retorna true
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

        public function verAsistentes(){
            try {
                //une los datos de ambas tablas con lo que tienen en comun 
                //que es la FK especialidad_id
                $sql = "SELECT * FROM `asistentes` a inner join especialidades s on a.especialidad_id = s.especialidad_id";
                $resultado = $this->db->query($sql);
                return $resultado;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

        public function verEspecialidades(){
            try {
                $sql = "SELECT * FROM `especialidades`";
                $resultado = $this->db->query($sql);
                return $resultado;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

    }

    
?>