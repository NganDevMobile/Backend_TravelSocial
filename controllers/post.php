<?php

    include_once '../services/post.php';

    

class PostController {

        private $post_service;

        public function __construct()
        {
            $this->post_service = new PostService();
        }

        public function getAllPost(){
            return $this->post_service->getAllPost();
        }

        public function getById($id){
            return $this->post_service->getById($id);
        }

        public function getAllUser(){
            return $this->post_service->getAllUser();
        }

        public function insert($title, $content, $picture, $user_id){
            return $this->post_service->insert($title, $content, $picture, $user_id);
        }

        public function update($id, $title, $content, $picture, $user_id){
            return $this->post_service->update($id, $title, $content, $picture, $user_id);
        }

        public function delete($id){
            return $this->post_service->delete($id);
        }
        
    }

?>