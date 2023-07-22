<?php
    interface IBook {
        public function getBookTitle();
        public function getAuthorName();
        public function getPublisher();
        public function getPublicationYear();
        public function getISBN();
        public function getChapterList();
    }
?>