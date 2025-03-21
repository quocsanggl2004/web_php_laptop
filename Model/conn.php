<?php
class clsKetNoi {
    private $conn;

    public function KetNoi() {
        $host = 'localhost';
        $user = 'quocsang05';
        $pwd = '123456';
        $db = 'quanlylaptop';

        $this->conn = new mysqli($host, $user, $pwd, $db);
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
        $this->conn->set_charset('utf8');
        return $this->conn;
    }

    public function DongKetNoi() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
