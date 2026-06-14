<?php

require_once BASE_PATH . '/core/Model.php';

class TareaModel extends Model {
    protected $table = 'tareas';

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO tareas (proyecto_id, usuario_id, titulo, descripcion, estado, prioridad, fecha_limite)
            VALUES (:proyecto_id, :usuario_id, :titulo, :descripcion, :estado, :prioridad, :fecha_limite)
        ");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE tareas 
            SET proyecto_id=:proyecto_id, usuario_id=:usuario_id, titulo=:titulo, 
                descripcion=:descripcion, estado=:estado, prioridad=:prioridad, fecha_limite=:fecha_limite
            WHERE id=:id
        ");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function updateEstado($id, $estado) {
        $stmt = $this->db->prepare("UPDATE tareas SET estado = ? WHERE id = ?");
        return $stmt->execute([$estado, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tareas WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function countAll() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM tareas");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function countPendientes() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM tareas WHERE estado != 'completado'");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    // Todas las tareas con info de proyecto y usuario
    public function findAllWithInfo() {
        $stmt = $this->db->prepare("
            SELECT t.*, p.nombre as proyecto_nombre, u.nombre as usuario_nombre
            FROM tareas t
            INNER JOIN proyectos p ON t.proyecto_id = p.id
            LEFT JOIN usuarios u ON t.usuario_id = u.id
            ORDER BY t.fecha_limite ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Tareas de un proyecto especifico (para Kanban)
    public function findByProyecto($proyectoId) {
        $stmt = $this->db->prepare("
            SELECT t.*, u.nombre as usuario_nombre
            FROM tareas t
            LEFT JOIN usuarios u ON t.usuario_id = u.id
            WHERE t.proyecto_id = ?
            ORDER BY t.created_at DESC
        ");
        $stmt->execute([$proyectoId]);
        return $stmt->fetchAll();
    }

    // Una tarea con info completa
    public function findByIdWithInfo($id) {
        $stmt = $this->db->prepare("
            SELECT t.*, p.nombre as proyecto_nombre, u.nombre as usuario_nombre
            FROM tareas t
            INNER JOIN proyectos p ON t.proyecto_id = p.id
            LEFT JOIN usuarios u ON t.usuario_id = u.id
            WHERE t.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
