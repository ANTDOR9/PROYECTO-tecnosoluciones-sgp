<?php

require_once BASE_PATH . '/core/Model.php';

class ProyectoModel extends Model {
    protected $table = 'proyectos';

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO proyectos (cliente_id, nombre, descripcion, estado, fecha_inicio, fecha_fin, presupuesto)
            VALUES (:cliente_id, :nombre, :descripcion, :estado, :fecha_inicio, :fecha_fin, :presupuesto)
        ");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE proyectos 
            SET cliente_id=:cliente_id, nombre=:nombre, descripcion=:descripcion, 
                estado=:estado, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, presupuesto=:presupuesto
            WHERE id=:id
        ");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM proyectos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function countAll() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM proyectos");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function countByEstado($estado) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM proyectos WHERE estado = ?");
        $stmt->execute([$estado]);
        return $stmt->fetch()['total'];
    }

    public function findAllWithCliente() {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre as cliente_nombre 
            FROM proyectos p
            INNER JOIN clientes c ON p.cliente_id = c.id
            ORDER BY p.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findByIdWithCliente($id) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre as cliente_nombre, c.email as cliente_email
            FROM proyectos p
            INNER JOIN clientes c ON p.cliente_id = c.id
            WHERE p.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function findRecientes($limit = 5) {
        $stmt = $this->db->prepare("
            SELECT p.*, c.nombre as cliente_nombre 
            FROM proyectos p
            INNER JOIN clientes c ON p.cliente_id = c.id
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
