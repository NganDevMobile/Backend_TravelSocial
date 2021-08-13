<?php
    class Post{
        private $id;
        private $title;
        private $content;
        private $picture;
        private $user_id;

        function __construct($id, $title, $content, $picture, $user_id)
        {
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->picture = $picture;
            $this->user_id = $user_id;
        }
        public function getId()
        {
            return $this->id;
        }
        public function getTitle()
        {
            return $this->title;
        }
        public function getContent()
        {
            return $this->content;
        }
        public function getPicture()
        {
            return $this->picture;
        }
        public function getUser_id()
        {
            return $this->user_id;
        }

    }
?>