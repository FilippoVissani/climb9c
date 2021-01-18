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
        $query = "SELECT idPRODUCT, name, price, description, tecnical_specifications FROM product WHERE idPRODUCT=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idProduct);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLatestArticlesAdded($n){
        $query = "SELECT * FROM (
                    SELECT * FROM product ORDER BY idPRODUCT DESC LIMIT ?
                    ) sub
                    ORDER BY idPRODUCT ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getSubcategoryById($idSubcategory){
        $query = "SELECT s.idSUBCATEGORY, s.idCATEGORY , s.name as subcategoryName, c.name as categoryName FROM subcategory as s INNER JOIN category as c ON s.idCATEGORY = c.idCATEGORY WHERE idSUBCATEGORY=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idSubcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getproductsInSubcategory($idSubcategory){
        $query = "SELECT p.idPRODUCT, p.name, p.price, p.quantity FROM product as p INNER JOIN subcategory as s ON p.idSUBCATEGORY = s.idSUBCATEGORY WHERE s.idSUBCATEGORY=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idSubcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>