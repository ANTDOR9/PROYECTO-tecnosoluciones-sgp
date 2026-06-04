<?php

require_once BASE_PATH . '/core/Model.php';

class ClienteModel extends Model {
    protected $table = 'clientes';

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO clientes (nombre, empresa, email, telefono, direccion)
            VALUES (:nombre, :empresa, :email, :telefono, :direccion)
        ");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE clientes 
            SET nombre=:nombre, empresa=:empresa, email=:email, 
                telefono=:telefono, direccion=:direccion
            WHERE id=:id
        ");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function countAll() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM clientes WHERE activo = 1");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function findActivos() {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE activo = 1 ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
