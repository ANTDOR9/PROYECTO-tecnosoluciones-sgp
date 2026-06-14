<?php

require_once BASE_PATH . '/core/Model.php';

class TicketModel extends Model {
    protected $table = 'tickets';

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO tickets (cliente_id, proyecto_id, titulo, descripcion, estado, prioridad)
            VALUES (:cliente_id, :proyecto_id, :titulo, :descripcion, :estado, :prioridad)
        ");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE tickets 
            SET cliente_id=:cliente_id, proyecto_id=:proyecto_id, titulo=:titulo, 
                descripcion=:descripcion, estado=:estado, prioridad=:prioridad
            WHERE id=:id
        ");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tickets WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function countAbiertos() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM tickets WHERE estado IN ('abierto', 'en_proceso')");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function countByPrioridad($prioridad) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM tickets WHERE prioridad = ?");
        $stmt->execute([$prioridad]);
        return $stmt->fetch()['total'];
    }

    // Todos los tickets con info de cliente y proyecto
    public function findAllWithInfo() {
        $stmt = $this->db->prepare("
            SELECT t.*, c.nombre as cliente_nombre, p.nombre as proyecto_nombre
            FROM tickets t
            INNER JOIN clientes c ON t.cliente_id = c.id
            LEFT JOIN proyectos p ON t.proyecto_id = p.id
            ORDER BY t.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Un ticket con info completa
    public function findByIdWithInfo($id) {
        $stmt = $this->db->prepare("
            SELECT t.*, c.nombre as cliente_nombre, c.email as cliente_email, p.nombre as proyecto_nombre
            FROM tickets t
            INNER JOIN clientes c ON t.cliente_id = c.id
            LEFT JOIN proyectos p ON t.proyecto_id = p.id
            WHERE t.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Tickets recientes para el dashboard
    public function findRecientes($limit = 5) {
        $stmt = $this->db->prepare("
            SELECT t.*, c.nombre as cliente_nombre
            FROM tickets t
            INNER JOIN clientes c ON t.cliente_id = c.id
            ORDER BY t.created_at DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Proyectos de un cliente especifico (para el select dinamico)
    public function findProyectosByCliente($clienteId) {
        $stmt = $this->db->prepare("SELECT id, nombre FROM proyectos WHERE cliente_id = ?");
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }
}
