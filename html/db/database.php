<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getProductById($idProduct){
        $query = "SELECT idPRODUCT, name, price, description, tecnical_specifications FROM PRODUCT WHERE idPRODUCT=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idProduct);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>