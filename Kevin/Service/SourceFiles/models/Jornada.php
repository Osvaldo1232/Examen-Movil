<?php
class Jornada {
    private $conn;
    private $table_name = "jornadas";

    public $id;
    public $usuario_id;
    public $nombre_empleado;
    public $horas;
    public $turno;
    public $es_festivo;
    public $tarifa_base;
    public $tarifa_final;
    public $pago_total;
    public $fecha_registro;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear nueva jornada
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . "
                SET usuario_id=:usuario_id,
                    nombre_empleado=:nombre_empleado,
                    horas=:horas,
                    turno=:turno,
                    es_festivo=:es_festivo,
                    tarifa_base=:tarifa_base,
                    tarifa_final=:tarifa_final,
                    pago_total=:pago_total";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":usuario_id", $this->usuario_id);
        $stmt->bindParam(":nombre_empleado", $this->nombre_empleado);
        $stmt->bindParam(":horas", $this->horas);
        $stmt->bindParam(":turno", $this->turno);
        $stmt->bindParam(":es_festivo", $this->es_festivo);
        $stmt->bindParam(":tarifa_base", $this->tarifa_base);
        $stmt->bindParam(":tarifa_final", $this->tarifa_final);
        $stmt->bindParam(":pago_total", $this->pago_total);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer jornadas por usuario
    public function leerPorUsuario() {
        $query = "SELECT * FROM " . $this->table_name . " 
                WHERE usuario_id = ?
                ORDER BY fecha_registro DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->usuario_id);
        $stmt->execute();
        return $stmt;
    }

    // Leer una jornada específica
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " 
                WHERE id = ? AND usuario_id = ? 
                LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->bindParam(2, $this->usuario_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nombre_empleado = $row['nombre_empleado'];
            $this->horas = $row['horas'];
            $this->turno = $row['turno'];
            $this->es_festivo = $row['es_festivo'];
            $this->tarifa_base = $row['tarifa_base'];
            $this->tarifa_final = $row['tarifa_final'];
            $this->pago_total = $row['pago_total'];
            $this->fecha_registro = $row['fecha_registro'];
            return true;
        }
        return false;
    }

    // Actualizar jornada
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . "
                SET nombre_empleado=:nombre_empleado,
                    horas=:horas,
                    turno=:turno,
                    es_festivo=:es_festivo,
                    tarifa_base=:tarifa_base,
                    tarifa_final=:tarifa_final,
                    pago_total=:pago_total
                WHERE id=:id AND usuario_id=:usuario_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre_empleado", $this->nombre_empleado);
        $stmt->bindParam(":horas", $this->horas);
        $stmt->bindParam(":turno", $this->turno);
        $stmt->bindParam(":es_festivo", $this->es_festivo);
        $stmt->bindParam(":tarifa_base", $this->tarifa_base);
        $stmt->bindParam(":tarifa_final", $this->tarifa_final);
        $stmt->bindParam(":pago_total", $this->pago_total);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":usuario_id", $this->usuario_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar jornada
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " 
                WHERE id = ? AND usuario_id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->bindParam(2, $this->usuario_id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Calcular pago
    public function calcularPago() {
        $tarifaDiurna = 100;
        $tarifaNocturna = 135;

        if ($this->turno === 'diurno') {
            $this->tarifa_base = $tarifaDiurna;
            $incrementoFestivo = 0.10;
        } else {
            $this->tarifa_base = $tarifaNocturna;
            $incrementoFestivo = 0.15;
        }

        if ($this->es_festivo == 1 || $this->es_festivo === true) {
            $this->tarifa_final = $this->tarifa_base + ($this->tarifa_base * $incrementoFestivo);
        } else {
            $this->tarifa_final = $this->tarifa_base;
        }

        $this->pago_total = $this->horas * $this->tarifa_final;
    }
}
?>