<?php

require_once BASE_PATH . '/core/Model.php';

class UsuarioModel extends Model {
    protected $table = 'usuarios';

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
