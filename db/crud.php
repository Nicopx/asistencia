<?php
   class crud
   {
        private $db;
        
        //constructor para inicializar la conexion de la db
        function __construct($conn){
            $this -> db = $conn;
        }

        //parametros que recibe el metodo insert son los que el usuario ingresa en el formulario de registro.
        public function insert($nomb, $apell, $fecha_n,$email, $cel, $especialidad, $destinacion){
            try {
                //definición de la declaracion sql a ejecutar
                $sql = "INSERT INTO `asistentes` (`nombres`, `apellido`, `fecha_nacimiento`, `email`, `celular`, `especialidad_id`, `avatar_path`) VALUES (:nomb, :apell, :fecha_n, :email, :cel, :especialidad, :avatar)";
                //preparo la declaracion sql para ejecucion
                $stmt = $this->db->prepare($sql);

                //Bindeo cada placehober con el valor que se pasa por parametro.
                $stmt->bindparam(':nomb',$nomb);
                $stmt->bindparam(':apell',$apell);
                $stmt->bindparam(':fecha_n',$fecha_n);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':cel',$cel);
                $stmt->bindparam(':especialidad',$especialidad);
                $stmt->bindparam(':avatar',$destinacion);

                $stmt->execute();
                return true;//si stmt es exitoso retorna true
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

        //actualiza los datos de un asistente
        public function editarAsistente($id, $nomb, $apell, $fecha_n, $email, $cel, $especialidad) {
           try{ 
                $sql = "UPDATE `asistentes` SET `nombres`=:nomb,`apellido`=:apell,`fecha_nacimiento`=:fecha_n,
                `email`=:email,`celular`=:cel,`especialidad_id`=:especialidad WHERE id=:id";
                //preparo la declaracion sql para ejecucion
                $stmt = $this->db->prepare($sql);

                    //Bindeo cada placehober con el valor que se pasa por parametro.
                    $stmt->bindparam(':id',$id);
                    $stmt->bindparam(':nomb',$nomb);
                    $stmt->bindparam(':apell',$apell);
                    $stmt->bindparam(':fecha_n',$fecha_n);
                    $stmt->bindparam(':email',$email);
                    $stmt->bindparam(':cel',$cel);
                    $stmt->bindparam(':especialidad',$especialidad);

                    $stmt->execute();
                    return true;//si stmt es exitoso retorna true

           }catch (PDOException $e) {
            echo $e->getMessage();
            return false; //si hay error retorna false
            }
        }

        //Trae la lista de asistentes con su especialidad asociada
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

        //Trae el detalle de un asistente con su especialidad asociada
        public function verDetallesAsistentes($id){
                //une los datos de ambas tablas con lo que tienen en comúm 
                //que es la FK le paso el id de la especilidad de la tabla de asistentens y la referencion en la tabla de especialidades
                //entonces puedo acceder al valor a traves del nombre la especialidad
                try {
                    $sql = "SELECT * FROM `asistentes` a inner join especialidades s on a.especialidad_id = s.especialidad_id WHERE  id = :id";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(':id', $id);
                    $stmt->execute();
                    $resultado = $stmt->fetch();//fetcheo el resultado dentro de la variable.
                    return $resultado;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false; //si hay error retorna false
                }
                
        }

        //Trae la lista de especialidades
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

        //Trae la especialidad seleccionada por id
        public function verEspecialidadesById($id){
            try {
                $sql = "SELECT * FROM `especialidades` WHERE especialidad_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                $resultado = $stmt->fetch(); 
                return $resultado;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

        //elimina el asistente seleccionado.
        public function eliminarAsistentes($id){
            try {
                //declaracion de la consulta
                $sql = "DELETE FROM `asistentes` WHERE id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

    }
    
?>