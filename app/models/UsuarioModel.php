<?php

require_once BASE_PATH . '/core/Model.php';

class UsuarioModel extends Model {
    protected $table = 'usuarios';

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("
            INSERT INTO usuarios (nombre, email, password, rol, activo)
            VALUES (:nombre, :email, :password, :rol, :activo)
        ");
        return $stmt->execute($data);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("
            UPDATE usuarios 
            SET nombre=:nombre, email=:email, rol=:rol, activo=:activo
            WHERE id=:id
        ");
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function updatePassword($id, $hashedPassword) {
        $stmt = $this->db->prepare("UPDATE usuarios SET password = ? WHERE id = ?");
        return $stmt->execute([$hashedPassword, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Solo trabajadores (no admin), para asignar tareas
    public function findWorkers() {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE rol != 'admin' AND activo = 1 ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Todos los trabajadores (incluyendo inactivos) para el panel admin
    public function findAllWorkers() {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE rol != 'admin' ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countActivos() {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM usuarios WHERE rol != 'admin' AND activo = 1");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }
}
