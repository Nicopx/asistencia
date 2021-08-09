<?php 
    class user {
        private $db;
        
        //constructor para inicializar la conexion de la db
        function __construct($conn){
            $this -> db = $conn;
        }

        public function insertUser($nombre_usuario, $contrasena){
            try {
                //busco el nombre del usuario
                $result = $this->getUserByNombre($nombre_usuario);
                if ($result['num'] > 0) {//si existe un nombre quiere decir que ese user ya existe
                    return false;
                }else {
                    //encripto el pass concatenandolo con el nombre de usuario
                    $new_pass = password_hash($contrasena.$nombre_usuario, PASSWORD_DEFAULT);
                    //definición de la declaracion sql a ejecutar
                     $sql = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (:nombre_usuario, :contrasena)";
                    //preparo la declaracion sql para ejecucion
                    $stmt = $this->db->prepare($sql);

                    //Bindeo cada placeholder con el valor que se pasa por parametro.
                    $stmt->bindparam(':nombre_usuario',$nombre_usuario);
                    $stmt->bindparam(':contrasena',$new_pass);
          
                    $stmt->execute();
                    return true; //si stmt es exitoso retorna true   
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

        public function getUser($nombre_usuario, $contrasena){
            try {
                $sql = "SELECT * FROM `usuarios` WHERE nombre_usuario = :nombre_usuario AND contrasena = :contrasena";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nombre_usuario', $nombre_usuario);
                $stmt->bindparam(':contrasena', $contrasena);
                $stmt->execute();
                $resultado = $stmt->fetch();//fetcheo el resultado dentro de la variable.
                return $resultado;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }

        public function getUserByNombre($nombre_usuario){
            try {
                //trae la cantidad de usuarios 
                $sql = "SELECT count(*) as num FROM `usuarios` WHERE nombre_usuario = :nombre_usuario";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nombre_usuario', $nombre_usuario);
                $stmt->execute();
                $resultado = $stmt->fetch();//fetcheo el resultado dentro de la variable.
                return $resultado;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; //si hay error retorna false
            }
        }        

    }


?>