<?php
    include_once '../configs/database_config.php';
    include_once '../models/post.php';


    class PostService{
        private $connection;
        private $userAccount = "userAccount";
        private $post = "post";

        public function __construct()
        {
            $this->connection = (new Database())->getConnection();
        }

        public function getAllPost(){
            try {
                $q = "SELECT id, title, content, picture, user_id
                 from " . $this->post . " order by id desc ";
                $stmt = $this->connection->prepare($q);
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $post = array();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);
                        $po = array(
                            "id" => $id,
                            "title" => $title,
                            "content" => $content,
                            "picture" => $picture,
                            "user_id" => $user_id,
                           
                        );
                        array_push($post, $po);
                    };
                    
                    return $post;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }

        public function getById($id){
            try {
                $q = "SELECT id, title, content, picture, user_id
                 from " . $this->post . " where id=:id ";
                $stmt = $this->connection->prepare($q);
                $stmt->bindParam(":id", $id);
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    extract($row);
                        $po= array(
                            "id" => $id,
                            "title" => $title,
                            "content" => $content,
                            "picture" => $picture,
                            "user_id" => $user_id,
                        );
                    return $po;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }

        public function getAllUser(){
            try {
                $q = "SELECT id, email, fullname, phone, gender, avatar
                 from " . $this->userAccount . " ";
                $stmt = $this->connection->prepare($q);
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $user = array();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);
                        $us = array(
                            "id" => $id,
                            "email" => $email,
                            "fullname" => $fullname,
                            "phone" => $phone,
                            "gender" => $gender,
                            "avatar" => $avatar,
                        );
                        array_push($user, $us);
                    };
                    
                    return $user;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }
// id, title, content, picture, user_id
        public function insert($title, $content, $picture, $user_id)
        {
            try {
                $q = "insert into " . $this->post . "
                        set title=:title,
                        content=:content,
                        picture=:picture,
                        user_id=:user_id
                ";
                $stmt = $this->connection->prepare($q);

                $stmt->bindParam(":title", $title);
                $stmt->bindParam(":content", $content);
                $stmt->bindParam(":picture", $picture);
                $stmt->bindParam(":user_id", $user_id);

                $this->connection->beginTransaction();
                if ($stmt->execute()) {
                    $this->connection->commit();
                    return true;
                } else {
                    $this->connection->rollBack();
                    return false;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            return false;
        }

        public function update($id, $title, $content, $picture, $user_id)
        {
            try {
                $q = "update " . $this->post . "
                        set title=:title,
                        content=:content,
                        picture=:picture,
                        user_id=:user_id
                        where id=:id
                ";
                $stmt = $this->connection->prepare($q);

                $stmt->bindParam(":title", $title);
                $stmt->bindParam(":content", $content);
                $stmt->bindParam(":picture", $picture);
                $stmt->bindParam(":user_id", $user_id);
                $stmt->bindParam(":id", $id);

                $this->connection->beginTransaction();
                if ($stmt->execute()) {
                    $this->connection->commit();
                    return true;
                } else {
                    $this->connection->rollBack();
                    return false;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            return false;
        }

        public function delete($id)
        {
            try {
                $q = "DELETE from " . $this->post . " where id=:id ";
                $stmt = $this->connection->prepare($q);

                $stmt->bindParam(":id", $id);

                $this->connection->beginTransaction();
                if ($stmt->execute()) {
                    $this->connection->commit();
                    return true;
                } else {
                    $this->connection->rollBack();
                    return false;
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            return false;
        }
    }

?>