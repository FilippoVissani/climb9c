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
        $query = "SELECT idPRODUCT, name, price, description, tecnical_specifications, quantity FROM product WHERE idPRODUCT=?";
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

    public function checkEmailPresence($email){
      $query = ("SELECT idCUSTOMER FROM customer WHERE email = ?");
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();
      $value = $result->fetch_all(MYSQLI_ASSOC);
      if (count($value) != 0) {
         return TRUE;
       }
       else{
         return FALSE;
       }
    }

    public function getCustomerIdByEmail($email){
      $query = ("SELECT idCUSTOMER FROM customer WHERE email = ?");
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addNewCustomer($email, $password, $name, $surname, $telephone, $gender, $bithdate){
      $query = "INSERT INTO customer (name, surname, email, password, telephone, gender, birthdate)
      VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('sssssis',$name, $surname, $email, $password, $telephone, $gender, $bithdate);
      $stmt->execute();
    }

    public function addNewAddressToCustomer($email, $name, $surname, $address, $province, $city, $zip_code){
      $query = "INSERT INTO climb_9c.address (street, province, city, zip_code, name, surname)
      VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ssssss',$address, $province, $city, $zip_code, $name, $surname);
      $stmt->execute();

      //$query1 = "INSERT INTO climb_9c.customer_address (idCUSTOMER, idADDRESS)
      //VALUES (?, ?)";
      //$stmt1 = $this->db->prepare($query);
      //$stmt1->bind_param('ii',this->getCustomerIdByEmail($email), $surname);
      //$stmt1->execute();
    }

    public function checkLogin($email, $password){
      $query = "SELECT * FROM customer WHERE email = ? AND password = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ss',$email, $password);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories(){
      $query = "SELECT name, idCATEGORY AS id FROM category";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAddressByCustomerID($idCUSTOMER){

    }

    public function getCartByCustomerID($idCUSTOMER){
      $query = "SELECT p.name as productName, cp.quantity as productQuantity, p.price as productPrice, p.idPRODUCT as idPRODUCT FROM customer
      as cu INNER JOIN cart as ca ON ca.idCUSTOMER = cu.idCUSTOMER INNER JOIN cart_product
      as cp ON cp.idCART = ca.idCUSTOMER INNER JOIN product as p ON p.idPRODUCT = cp.idPRODUCT WHERE cu.idCUSTOMER = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCUSTOMER);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSubcategories($idCategory){
      $query = "SELECT s.name, s.idSUBCATEGORY AS id FROM subcategory s, category c WHERE s.idCATEGORY=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCategory);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addJson($json){
      $query = "UPDATE product SET tecnical_specifications = ? WHERE idPRODUCT = 1";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$json);
      $stmt->execute();
    }

    public function searchElements($wordsArray){

    }
}
?>
