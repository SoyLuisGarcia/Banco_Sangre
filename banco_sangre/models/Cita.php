<?php

class Cita {

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    // AGENDAR CITA
    public function agendar($user_id,$fecha,$hora,$tipo_donacion,$sede,$peso,$donado_antes,$medicamentos,$cirugia,$tipo_donante){

        $sql = "INSERT INTO citas 
        (user_id,fecha,hora,tipo_donacion,sede,peso,donado_antes,medicamentos,cirugia,tipo_donante,estado)
        VALUES (?,?,?,?,?,?,?,?,?,?,'Pendiente')";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $user_id,
            $fecha,
            $hora,
            $tipo_donacion,
            $sede,
            $peso,
            $donado_antes,
            $medicamentos,
            $cirugia,
            $tipo_donante
        ]);
    }

    // OBTENER CITAS DEL USUARIO
    public function getByUser($user_id){

        $sql = "SELECT * FROM citas WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}