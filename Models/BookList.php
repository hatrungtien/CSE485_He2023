<?php
    require_once 'src/Models/Book.php';
    class BookList {
        private $books;
     
        public function __construct() {
           $this->books = array();
        }
     
        public function addBook(Book $book) {
           $this->books[] = $book;
        }
     
        public function sortByAuthor() {
           usort($this->books, function($a, $b) {
              return strcmp($a->getAuthorName(), $b->getAuthorName());
           });
        }
     
        public function sortByTitle() {
           usort($this->books, function($a, $b) {
              return strcmp($a->getBookTitle(), $b->getBookTitle());
           });
        }
     
        public function sortByPublicationYear() {
           usort($this->books, function($a, $b) {
              return $a->getPublicationYear() - $b->getPublicationYear();
           });
        }
     
        public function getBooks() {
           return $this->books;
        }
     }
     
?>