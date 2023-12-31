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
        $query = "SELECT * FROM product WHERE idPRODUCT=?";
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

      $lastIdAddrress = $this->db->insert_id;

      $query1 = "INSERT INTO customer_address (idCUSTOMER, idADDRESS)
      VALUES (?, ?)";
      $stmt1 = $this->db->prepare($query1);
      $stmt1->bind_param('ii',$this->getCustomerIdByEmail($email)[0]["idCUSTOMER"], $lastIdAddrress);
      $stmt1->execute();
    }

    public function checkLogin($email){
      $query = "SELECT * FROM customer WHERE email = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$email);
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
      $query = "SELECT a.idADDRESS as idADDRESS, a.street as street, a.province as province, a.city as city, a.zip_code as zip_code, a.name as name, a.surname as surname
      FROM customer as cu INNER JOIN customer_address as ca ON ca.idCUSTOMER = cu.idCUSTOMER INNER JOIN address as a
      ON ca.idADDRESS = a.idADDRESS WHERE cu.idCUSTOMER=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$idCUSTOMER);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getCartByCustomerID($idCUSTOMER){
      $query = "SELECT p.name as productName, cp.quantity as productQuantity, p.price as productPrice, p.idPRODUCT as idPRODUCT, p.quantity as stockQuantity FROM customer
      as cu INNER JOIN cart as ca ON ca.idCUSTOMER = cu.idCUSTOMER INNER JOIN cart_product
      as cp ON cp.idCART = ca.idCUSTOMER INNER JOIN product as p ON p.idPRODUCT = cp.idPRODUCT WHERE cu.idCUSTOMER = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCUSTOMER);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSubcategories($idCategory){
      $query = "SELECT s.name, s.idSUBCATEGORY AS id FROM subcategory s INNER JOIN category c ON s.idCATEGORY=c.idCATEGORY WHERE s.idCATEGORY=?";
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
      $query="SELECT p.idPRODUCT, p.name, p.price, p.quantity FROM product p WHERE true";
      foreach($wordsArray as $word){
        $query=$query . " AND LOWER(p.description) LIKE LOWER('%". $word . "%')";
      }

      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCoupon($couponCode){
        $query = "SELECT discount, validity FROM coupon WHERE code=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$couponCode);
        $result = $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCoustomerAddressID($idCUSTOMER, $idADDRESS){
        $query = "SELECT idCUSTOMER_ADDRESS FROM customer_address WHERE idCUSTOMER=? AND idADDRESS=?";
        $stmt = $this->db->prepare($query);
        //var_dump($stmt);
        $stmt->bind_param('ii',$idCUSTOMER, $idADDRESS);
        $result = $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addNewOrder($date, $idCUSTOMER, $idADDRESS, $coupon){
      $query = "INSERT INTO climb_9c.order (order.date, customer_address, shipping_date, COUPONcode) VALUES (?, ?, NULL, ?)";
      $stmt = $this->db->prepare($query);
      $IDcustomer_address = $this->getCoustomerAddressID($idCUSTOMER, $idADDRESS)[0]["idCUSTOMER_ADDRESS"];
      $stmt->bind_param('sis', $date, $IDcustomer_address, $coupon);
      $stmt->execute();

      $lastId = $this->db->insert_id;
      $product = $this->getCartByCustomerID($idCUSTOMER);

      foreach($product as $singleProduct){
        $query = "INSERT INTO product_order (idPRODUCT, idORDER, quantity, unit_price)
        VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iisd', $singleProduct["idPRODUCT"], $lastId, $singleProduct["productQuantity"], $singleProduct["productPrice"]);
        $stmt->execute();
      }
      return $lastId;
    }

    public function getBestSeller($limit){
      $query = "SELECT p.idPRODUCT, p.name, p.price, p.quantity FROM product p INNER JOIN product_order po ON p.idPRODUCT=po.idPRODUCT GROUP BY po.idPRODUCT ORDER BY SUM(po.quantity) DESC LIMIT ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$limit);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrders($idCUSTOMER){
      $query = "SELECT o.idORDER, o.date, o.shipping_date, o.COUPONcode, a.street, a.province, a.city, a.zip_code
      FROM (`order` o JOIN `customer_address` c ON o.customer_address=c.idCUSTOMER_ADDRESS)
      JOIN `address` a ON c.idADDRESS=a.idADDRESS
      WHERE c.idCUSTOMER=?
      GROUP BY o.idORDER";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCUSTOMER);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts($idOrder){
      $query = "SELECT `product`.`idPRODUCT`, `product`.`name`, `product`.`brand`,`product_order`.`quantity`, `product_order`.`unit_price`, `product`.`quantity` AS stock_quantity
      FROM (`order` JOIN `product_order` ON `order`.`idORDER`=`product_order`.`idORDER`)
      JOIN `product` ON `product_order`.`idPRODUCT`=`product`.`idPRODUCT`
      WHERE `order`.`idORDER`=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idOrder);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    //ADD TO CART
    public function addToCart($idCustomer, $idProduct, $quantity){
      //controllo la quantità in magazzino
      $querya = "SELECT quantity FROM product WHERE idPRODUCT = ?";
      $stmta = $this->db->prepare($querya);
      $stmta->bind_param('i',$idProduct);
      $stmta->execute();
      $resulta = $stmta->get_result();
      $valuea = $resulta->fetch_all(MYSQLI_ASSOC);

      $quantitaInMagazzino=$valuea[0]["quantity"];

      if($quantitaInMagazzino==0){
        echo "Articolo esaurito";
        return;
      }

      $dataAttuale = date("Y-m-d");

      //controllo se c'è già il carrello
      $query0 = "SELECT * FROM cart WHERE idCUSTOMER = ?";
      $stmt0 = $this->db->prepare($query0);
      $stmt0->bind_param('i',$idCustomer);
      $stmt0->execute();
      $result0 = $stmt0->get_result();
      $value0 = $result0->fetch_all(MYSQLI_ASSOC);
      if (count($value0) == 0) {
        //se non c'è faccio la insert
        $query1 = "INSERT INTO cart (idCUSTOMER, last_update)
        VALUES (?, ?)";
        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('is',$idCustomer, $dataAttuale);
        $stmt1->execute();
       }
       else{
         //se c'è faccio l'update
        $query2 = "UPDATE cart SET last_update = ? WHERE idCUSTOMER = ?";
        $stmt2 = $this->db->prepare($query2);
        $stmt2->bind_param('si', $dataAttuale, $idCustomer);
        $stmt2->execute();

       }

       //ora lavoro su cart_product
       //controllo se c'è il prodotto nel carrello
      $query3 = "SELECT * FROM cart_product WHERE idCART = ? AND idPRODUCT = ?";
      $stmt3 = $this->db->prepare($query3);
      $stmt3->bind_param('ii',$idCustomer, $idProduct);
      $stmt3->execute();
      $result3 = $stmt3->get_result();
      $value3 = $result3->fetch_all(MYSQLI_ASSOC);
      if (count($value3) == 0) {
        //se non c'è faccio la insert

        if($quantity>$quantitaInMagazzino){
          $quantity=$quantitaInMagazzino;
          echo "sono stati aggiunti ".$quantitaInMagazzino." pezzi nel carrello, che è la quantità disponibile in magazzino";
        } else{

          echo "Hai aggiunto questo articolo nel carrello, quantità: ".$quantity;
        }
        $query4 = "INSERT INTO cart_product (idCART, idPRODUCT, quantity)
        VALUES (?, ?, ?)";
        $stmt4 = $this->db->prepare($query4);
        $stmt4->bind_param('iii',$idCustomer, $idProduct, $quantity);
        $stmt4->execute();
      }
      else{
        //se c'è faccio l'update
        //conto quanti ne ho nel carrello
        $quantitaInCarrello=$value3[0]["quantity"];

        //li sommo a quelli acquistati (CHECK CHE NON SIA MAGGIORE DELLA QUANTITA IN MAGAZZINO)
        $nuovaQuantita=$quantity+$quantitaInCarrello;

        if($nuovaQuantita>$quantitaInMagazzino){
          $nuovaQuantita=$quantitaInMagazzino;
          echo "Sono stati aggiunti al carrello ".($nuovaQuantita-$quantitaInCarrello)." pezzi. Ora nel carrello hai ".$nuovaQuantita." pezzi, che sono tutti i pezzi disponibili in magazzino";
        } else{
          echo "Sono stati aggiunti al carrello ".$quantity." pezzi. Ora nel carrello hai ".$nuovaQuantita." pezzi";
        }
        //e metto la nuova quantità
        $query5 = "UPDATE cart_product SET quantity = ? WHERE idPRODUCT = ?";
        $stmt5 = $this->db->prepare($query5);
        $stmt5->bind_param('ii', $nuovaQuantita, $idProduct);
        $stmt5->execute();
        //$result = $stmt5->get_result();

        //return $result->fetch_all(MYSQLI_ASSOC);
      }
    }
    // END ADD TO CART

    public function getTagsBySubcategory($idSubcategory){
      $query = "SELECT DISTINCT t.name as chiave, tp.value as valore, t.idTAG as id FROM (((tag_product as tp INNER JOIN tag as t ON t.idTAG = tp.idTAG)
                                                                                  INNER JOIN tag_subcategory as ts ON ts.idTAG = t.idTAG)
                                                                                  INNER JOIN subcategory as s ON s.idSUBCATEGORY = ts.idSUBCATEGORY)
                                                                                  WHERE s.idSUBCATEGORY = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idSubcategory);
      $result = $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTagsNameBySubcategory($idSubcategory){
      $query = "SELECT t.name as name, t.idTAG as id FROM  tag_subcategory as ts INNER JOIN tag as t ON t.idTAG = ts.idTAG
                                                                    WHERE ts.idSUBCATEGORY = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idSubcategory);
      $result = $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteCart($idCUSTOMER){
      //update quantities in stock
      $product = $this->getCartByCustomerID($idCUSTOMER);
      foreach($product as $singleProduct){
        $query = "SELECT quantity FROM product WHERE idPRODUCT = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $singleProduct["idPRODUCT"]);
        $result = $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        $quantity = $result[0]["quantity"] - $singleProduct["productQuantity"];

        $query = "UPDATE product SET quantity = ? WHERE idPRODUCT = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $quantity, $singleProduct["idPRODUCT"]);
        $stmt->execute();
      }
      //delete from cart_product
      $query = "DELETE FROM cart_product WHERE idCART=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCUSTOMER);
      $stmt->execute();
      $result = $stmt->get_result();
      //delete cart
      $query = "DELETE FROM cart WHERE idCUSTOMER=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCUSTOMER);
      $stmt->execute();
      $result = $stmt->get_result();
    }

    public function deleteProductFromCart($idCUSTOMER, $idPRODUCT){
      $query = "DELETE FROM cart_product WHERE idCART=? AND idPRODUCT=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ii', $idCUSTOMER, $idPRODUCT);
      $stmt->execute();
      $result = $stmt->get_result();
    }


    public function updateCartQuantity($idCustomer, $idProduct, $newQuantity){
      //controllo la quantità in magazzino
      $query = "SELECT quantity FROM product WHERE idPRODUCT = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idProduct);
      $stmt->execute();
      $result = $stmt->get_result();
      $value = $result->fetch_all(MYSQLI_ASSOC);

      $quantitaInMagazzino=$value[0]["quantity"];

      if($newQuantity > $quantitaInMagazzino){
        echo "Spiacente, ".$newQuantity." pezzi non sono disponibili";

        //update cart_product
        $query1 = "UPDATE cart_product SET quantity = ? WHERE idPRODUCT = ?";
        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('ii', $quantitaInMagazzino, $idProduct);
        $stmt1->execute();
      }
      else{
        //update cart_product
        $query1 = "UPDATE cart_product SET quantity = ? WHERE idPRODUCT = ?";
        $stmt1 = $this->db->prepare($query1);
        $stmt1->bind_param('ii', $newQuantity, $idProduct);
        $stmt1->execute();
      }
      //aggiorno ultima modifica del carrello
      $dataAttuale = date("Y-m-d");
      $query2 = "UPDATE cart SET last_update = ? WHERE idCUSTOMER = ?";
      $stmt2 = $this->db->prepare($query2);
      $stmt2->bind_param('si', $dataAttuale, $idCustomer);
      $stmt2->execute();
    }

    public function filterProducts($idSubcategory, $chiave, $valore){

        if($valore=="Tutti"){
          return $this->getproductsInSubcategory($idSubcategory);
        }

        $query = "SELECT p.idPRODUCT, p.name, p.price, p.quantity
        FROM product as p INNER JOIN subcategory as s ON p.idSUBCATEGORY = s.idSUBCATEGORY
                          INNER JOIN tag_product as tp ON tp.idPRODUCT = p.idPRODUCT
                          INNER JOIN tag as t ON t.idTAG = tp.idTAG
                          INNER JOIN tag_subcategory as ts ON ts.idTAG = t.idTAG AND ts.idSUBCATEGORY = s.idSUBCATEGORY
                            WHERE s.idSUBCATEGORY = ? AND t.name = ? AND tp.value = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iss',$idSubcategory, $chiave, $valore);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkAdminLogin($email){
      $query="SELECT * FROM seller WHERE email = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$email);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCustomerNotifications($idCustomer){
      $query="SELECT * FROM `customer_notification` WHERE `customer_notification`.`id_customer`=? AND `customer_notification`.`visualized`=0";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idCustomer);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setCustomerNotificationVisualized($idCustomer, $idNotification){
      $query="UPDATE `customer_notification` SET `visualized` = '1' WHERE `customer_notification`.`id_customer_notification` = ? AND `customer_notification`.`id_customer`=?;";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ii',$idNotification, $idCustomer);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSellerNotifications(){
      $query="SELECT * FROM `seller_notification` WHERE `seller_notification`.`visualized`=0";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setSellerNotificationVisualized($idNotification){
      $query="UPDATE `seller_notification` SET `visualized` = 1 WHERE `seller_notification`.`id_seller_notification` = ?;";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idNotification);
      $stmt->execute();
    }

    public function addSellerNotification($title, $message){
      $query="INSERT INTO seller_notification (title, message)
      VALUES (?, ?);";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ss',$title, $message);
      $stmt->execute();
    }

    public function addCustomerNotification($title, $message, $idCustomer){
      $query="INSERT INTO `customer_notification` (`id_customer`, `title`, `message`) VALUES (?, ?, ?);";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('iss', $idCustomer, $title, $message);
      $stmt->execute();
    }

    public function getShippedOrders(){
      $query="SELECT o.idORDER, o.date, o.shipping_date, o.COUPONcode, a.street, a.province, a.city, a.zip_code
      FROM (`order` o JOIN `customer_address` c ON o.customer_address=c.idCUSTOMER_ADDRESS)
      JOIN `address` a ON c.idADDRESS=a.idADDRESS
      WHERE o.`shipping_date` IS NOT NULL
      GROUP BY o.idORDER LIMIT 50";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNewOrders(){
      $query="SELECT o.idORDER, o.date, o.COUPONcode, a.street, a.province, a.city, a.zip_code
      FROM (`order` o JOIN `customer_address` c ON o.customer_address=c.idCUSTOMER_ADDRESS)
      JOIN `address` a ON c.idADDRESS=a.idADDRESS
      WHERE o.`shipping_date` IS NULL
      GROUP BY o.idORDER";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function shipOrder($idOrder){
      $query="UPDATE `order` SET `shipping_date`=NOW() WHERE idORDER=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idOrder);
      $stmt->execute();
    }

    public function getOrderDetails($idOrder){
      $query="SELECT `order`.*, `address`.*, `customer_address`.idCUSTOMER, `coupon`.discount FROM
      ((`order` INNER JOIN `customer_address` ON `order`.customer_address=`customer_address`.idCUSTOMER_ADDRESS)
      INNER JOIN `address` ON `address`.idADDRESS=`customer_address`.idADDRESS)
      LEFT OUTER JOIN `coupon` ON `order`.COUPONcode=`coupon`.code
      WHERE `order`.`idORDER`=?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i',$idOrder);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCoupons(){
      $query="SELECT * FROM coupon";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addCoupon($code, $discount){
      $query = "INSERT INTO coupon (code, discount, validity) VALUES (?, ?, 1)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ss', $code, $discount);
      $stmt->execute();
    }

    public function editCoupon($code, $discount, $validity){
      $query = 'UPDATE `coupon` SET `discount` = ?, `validity` = ? WHERE `code` = ?';
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('sis', $discount, $validity, $code);
      $stmt->execute();
    }

    public function getCategoryAndSubcategoryFromProductID($idProduct){
      $query = "SELECT c.name as category, s.name as subcategory, s.idSUBCATEGORY as idSubcategory FROM product p INNER JOIN subcategory s ON p.idSUBCATEGORY = s.idSUBCATEGORY
                                                                                INNER JOIN category c ON c.idCATEGORY = s.idCATEGORY
                                                                                WHERE p.idPRODUCT = ?";
      $stmt = $this->db->prepare($query);

      $stmt->bind_param('i',$idProduct);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_all(MYSQLI_ASSOC);

      return $result[0];
    }

    public function AddNewProduct($name, $brand, $price, $idSubcategory, $description, $tecnical_specs, $quantity){
      $query = "INSERT INTO product (name, brand, price, idSUBCATEGORY, description, tecnical_specifications, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ssiissi',$name, $brand, $price, $idSubcategory, $description, $tecnical_specs, $quantity);
      $stmt->execute();
      return $this->db->insert_id;

    }

    public function addNewCategory($name){
      $query = "INSERT INTO category (name) VALUES (?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s',$name);
      $stmt->execute();
    }

    public function addNewSubcategory($idCategory, $name){
      $query = "INSERT INTO subcategory (idCATEGORY, name) VALUES (?, ?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('is',$idCategory, $name);
      $stmt->execute();
    }


    public function addNewTag($idSubcategory, $name){
      $query = "INSERT INTO tag (name) VALUES (?)";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s', $name);
      $stmt->execute();
      $insertedTagID = $this->db->insert_id;

      $query2 = "INSERT INTO tag_subcategory (idTAG, idSUBCATEGORY) VALUES (?, ?)";
      $stmt2 = $this->db->prepare($query2);
      $stmt2->bind_param('ii', $insertedTagID, $idSubcategory);
      $stmt2->execute();
    }

    public function addTagProduct($idTAG, $idPRODUCT, $value){
      $query2 = "INSERT INTO tag_product (idTAG, idPRODUCT, value) VALUES (?, ?, ?)";
      $stmt2 = $this->db->prepare($query2);
      $stmt2->bind_param('iis', $idTAG, $idPRODUCT, $value);
      $stmt2->execute();
    }


    public function getAllProducts(){
      $query = "SELECT * FROM product";
      $stmt = $this->db->prepare($query);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_all(MYSQLI_ASSOC);
      return $result;
    }

    public function editProduct($name, $brand, $price, $idSUBCATEGORY, $description, $tecnical_specifications, $quantity, $idPRODUCT){
      $query = "UPDATE `product` SET `name`=?,`brand`=?,`price`=?,`idSUBCATEGORY`=?,`description`=?,`tecnical_specifications`=?,`quantity`=? WHERE `idPRODUCT` = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ssiissii', $name, $brand, $price, $idSUBCATEGORY, $description, $tecnical_specifications, $quantity, $idPRODUCT);
      $stmt->execute();
    }

    public function getTagsByProductIDandSubID($idProduct, $idSubcategory){
      $query = "SELECT t.name as tagKey, tp.value as tagValue, tp.idTAG as id 
      FROM product p 
      INNER JOIN tag_product tp ON tp.idPRODUCT = p.idPRODUCT 
      INNER JOIN tag t ON t.idTAG = tp.idTAG 
      INNER JOIN tag_subcategory ts ON ts.idTAG = t.idTAG
      WHERE p.idPRODUCT = ? AND ts.idSUBCATEGORY = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ii',$idProduct, $idSubcategory);
      $result = $stmt->execute();
      $result = $stmt->get_result();

      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function editTagProduct($idTAG, $idPRODUCT, $value){
      
      $query = "SELECT * FROM tag_product WHERE idTAG = ? AND idPRODUCT = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ii', $idTAG, $idPRODUCT);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_all(MYSQLI_ASSOC);
      if (count($result) == 0) {
        //se non c'è faccio la insert
        $this->addTagProduct($idTAG, $idPRODUCT, $value);
       }
       else{
         //se c'è faccio l'update
         $query2 = "UPDATE tag_product SET value = ? WHERE idTAG = ? AND idPRODUCT = ?";
         $stmt2 = $this->db->prepare($query2);
         $stmt2->bind_param('sii', $value, $idTAG, $idPRODUCT);
         $stmt2->execute();
       }
    }

    public function existValueOfTagAndProduct($idTAG, $idPRODUCT){
      $query2 = "SELECT * FROM tag_product WHERE idTAG = ? AND idPRODUCT = ?";
      $stmt2 = $this->db->prepare($query2);
      $stmt2->bind_param('ii', $idTAG, $idPRODUCT);
      $stmt2->execute();
      $result = $stmt2->get_result();
      $result = $result->fetch_all(MYSQLI_ASSOC);
      if (count($result) != 0) {
        return $result[0];
      }
      else{
        return FALSE;
      }

      
    }

}
?>
