<?php
require "../../config/DatabaseConfig.php";
Class LgCustomer{
    private dbconnect $database;
    public function __construct()
    {
        $this->database = new dbconnect();
    }

    /**
     * Add Customers to the system such as companies, authorities in the university(e.g. AR)
     * @return bool
     */
    public function addCustomer():bool{
        $status = false;
        if(isset($_POST['submit'])){
            $rs = $this->database->addData("INSERT INTO customer_company VALUES('".$_POST["customerID"]."','".$_POST["customerName"]."','".$_POST["street"]."','".$_POST["zip"]."','".$_POST["city"]."','".$_POST["country"]."','".$_POST["url"]."','".$_POST["comment"]."',1,'".date("Y-m-d H:i:s")."',1,'".date("Y-m-d H:i:s")."',1)");
            if($rs)
                $status = true;
        }


        return $status;
    }

    /**
     * Add Customer Users to the System ie. actual persons to access the customer side
     * @return bool
     */
    public function addCustomerUser(): bool{
        $status = false;
        if (isset($_POST['submit'])){
            if($_POST["password"] == $_POST["repassword"]) {
                $rs = $this->database->addData("INSERT INTO customeruser(login,email,customer_id,pw,title,first_name,last_name,phone,fax,mobile,street,zip,city,country,comments,valid_id,create_time,create_by,change_time,change_by) VALUES('".$_POST["username"]."','" . $_POST["email"] . "','" . $_POST["customerID"] . "','" . $_POST["password"] . "','" . $_POST["title"] . "','" . $_POST["fname"] . "','" . $_POST["lname"] . "','" . $_POST["phone"] . "','" . $_POST["fax"] . "','" . $_POST["mobile"] . "','" . $_POST["street"] . "','" . $_POST["zip"] . "','" . $_POST["city"] . "','" . $_POST["country"] . "','" . $_POST["comment"] . "','1','".date("Y-m-d H:i:s")."','1','".date("Y-m-d H:i:s")."','2')");
                if ($rs) $status = true;
            }
        }

        return $status;
    }

    public function uploadCustomers(): void{
        include "../../config/Others/SimpleCSV.php";
        include '../../config/Others/SimpleXLS.php';
        include '../../config/Others/SimpleXLSX.php';

        if(isset($_POST['submit_customers'])){
            $target_dir = "../uploads/publications/";
            $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if ($imageFileType == "csv" || $imageFileType == "xls" || $imageFileType == "xlsx" || $imageFileType == "numbers"){
                if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                    ////extracting data from the file
                    if ($imageFileType == "csv") {
                        $load = SimpleCSV::import($target_file);
                        if ($load[0][0] == 'author' || $load[0][0] == 'AUTHOR') {
                            try {
                                $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                echo 'connected successfully';

                                $statement = $this->Connect->conn->prepare("INSERT INTO peer_reviewed_publications(author,title,publication_year,`type`,publisher,volume_number,ISBN,meta_id) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f,:g,".$_SESSION['meta_id'].")");

                                for ($i = 1; $i < sizeof($load); $i++) {
                                    for ($i = 1; $i < sizeof($load); $i++) {

                                        $statement->bindParam(':a', $load[$i][0]);
                                        $statement->bindParam(':b', $load[$i][1]);
                                        $statement->bindParam(':c', $load[$i][2]);
                                        $statement->bindParam(':d', $load[$i][3]);
                                        $statement->bindParam(':e', $load[$i][4]);
                                        $statement->bindParam(':f', $load[$i][5]);
                                        $statement->bindParam(':g', $load[$i][6]);
                                        $statement->execute();

                                        $id = $this->Connect->conn->lastInsertId();
                                        $this->Connect->conn->exec("INSERT INTO peer_reviewed_publications_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                                    }

                                }


                                header("location:profc.php");

                            } catch (PDOException $e) {
                                $this->Connect->CloseConnection();
                                echo "Something went wrong \n" . $e->getMessage();
                                echo '<script>alert("an error occurred")</script>';
                            }
                            $this->Connect->CloseConnection();
                            exit();


                        }else {
                            echo 'invalid order of data in file, please organize the data then upload it again!!';
                            return;
                        }



                    }else if ($imageFileType == "xls") {
                        $load = SimpleXLS::parse($target_file);
                        if(!$load) {
                            echo 'Invalid file';
                            return;
                        }

                        if ($load->rows()[0][0] == 'author' || $load->rows()[0][0] == 'AUTHOR') {
                            try {
                                $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                echo 'connected successfully';

                                $statement = $this->Connect->conn->prepare("INSERT INTO peer_reviewed_publications(author,title,publication_year,`type`,publisher,volume_number,ISBN,meta_id) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f,:g,".$_SESSION['meta_id'].")");

                                for ($i = 1; $i < sizeof($load->rows()); $i++) {

                                    $statement->bindParam(':a', $load->rows()[$i][0]);
                                    $statement->bindParam(':b', $load->rows()[$i][1]);
                                    $statement->bindParam(':c', $load->rows()[$i][2]);
                                    $statement->bindParam(':d', $load->rows()[$i][3]);
                                    $statement->bindParam(':e', $load->rows()[$i][4]);
                                    $statement->bindParam(':f', $load->rows()[$i][5]);
                                    $statement->bindParam(':g', $load->rows()[$i][6]);
                                    $statement->execute();

                                    $id = $this->Connect->conn->lastInsertId();
                                    $this->Connect->conn->exec("INSERT INTO peer_reviewed_publications_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                                }

                                header("location:profc.php");

                            } catch (PDOException $e) {
                                $this->Connect->CloseConnection();
                                echo "Something went wrong \n" . $e->getMessage();
                                echo '<script>alert("an error occurred")</script>';
                            }
                            $this->Connect->CloseConnection();
                            exit();

                        } else {
                            echo 'invalid order of data in file, please organize the data then upload it again!!';
                            return;
                        }

                    }else if ($imageFileType == "xlsx") {
                        $load = SimpleXLSX::parse($target_file);
                        if(!$load) {
                            echo 'Invalid file';
                            return;
                        }

                        if ($load->rows()[0][0] == 'author' || $load->rows()[0][0] == 'AUTHOR') {
                            try {
                                $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                echo 'connected successfully';

                                $statement = $this->Connect->conn->prepare("INSERT INTO peer_reviewed_publications(author,title,publication_year,`type`,publisher,volume_number,ISBN,meta_id) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f,:g,".$_SESSION['meta_id'].")");


                                for ($i = 1; $i < sizeof($load->rows()); $i++) {
                                    $statement->bindParam(':a', $load->rows()[$i][0]);
                                    $statement->bindParam(':b', $load->rows()[$i][1]);
                                    $statement->bindParam(':c', $load->rows()[$i][2]);
                                    $statement->bindParam(':d', $load->rows()[$i][3]);
                                    $statement->bindParam(':e', $load->rows()[$i][4]);
                                    $statement->bindParam(':f', $load->rows()[$i][5]);
                                    $statement->bindParam(':g', $load->rows()[$i][6]);
                                    $statement->execute();

                                    $id = $this->Connect->conn->lastInsertId();
                                    $this->Connect->conn->exec("INSERT INTO peer_reviewed_publications_has_staff_info VALUES($id," . $_SESSION['user'] . ")");

                                }




                                header("location:profc.php");

                            } catch (PDOException $e) {
                                $this->Connect->CloseConnection();
                                echo "Something went wrong \n" . $e->getMessage();
                                echo '<script>alert("an error occurred")</script>';
                            }
                            $this->Connect->CloseConnection();
                            exit();

                        } else {
                            echo 'invalid order of data in file, please organize the data then upload it again!!';
                            return;
                        }

                    }

                } else {
                    echo "Failed to upload";
                }

            }else{
                echo 'extension: Invalid file';
            }


        }else if(isset($_POST['submit_form'])){
            try {
                $this->Connect->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'connected successfully';

                $statement = $this->Connect->conn->prepare("INSERT INTO peer_reviewed_publications(author,title,publication_year,`type`,publisher,volume_number,ISBN,meta_id) VALUES (:a,
                                           :b,:c,:d,:e,
                                           :f,:g,".$_SESSION['meta_id'].")");

                for($i = 0; $i< sizeof($_POST['a']); $i++){
                    $statement->bindParam(':a',$_POST['a'][$i]);
                    $statement->bindParam(':b',$_POST['b'][$i]);
                    $statement->bindParam(':c',$_POST['c'][$i]);
                    $statement->bindParam(':d',$_POST['d'][$i]);
                    $statement->bindParam(':e',$_POST['e'][$i]);
                    $statement->bindParam(':f',$_POST['f'][$i]);
                    $statement->bindParam(':g',$_POST['g'][$i]);
                    $statement->execute();

                    $id = $this->Connect->conn->lastInsertId();
                    $this->Connect->conn->exec("INSERT INTO peer_reviewed_publications_has_staff_info VALUES($id,".$_SESSION['user'].")");

                }

                header("location:profc.php");

            } catch (PDOException $e) {
                $this->Connect->CloseConnection();
                echo "Something went wrong \n" . $e->getMessage();
                echo '<script>alert("an error occurred")</script>';
            }
            $this->Connect->CloseConnection();
            exit();


        }

    }




}
