<?php
    require_once 'src/Interfaces/IBook.php';
    class Book implements IBook {
        private $bookTitle;
        private $authorName;
        private $publisher;
        private $publicationYear;
        private $ISBN;
        private $chapterList;
     
        public function __construct($title, $author, $publisher, $year, $isbn, $chapters) {
           $this->bookTitle = $title;
           $this->authorName = $author;
           $this->publisher = $publisher;
           $this->publicationYear = $year;
           $this->ISBN = $isbn;
           $this->chapterList = $chapters;
        }
     
        public function getBookTitle() {
           return $this->bookTitle;
        }
     
        public function getAuthorName() {
           return $this->authorName;
        }
     
        public function getPublisher() {
           return $this->publisher;
        }
     
        public function getPublicationYear() {
           return $this->publicationYear;
        }
     
        public function getISBN() {
           return $this->ISBN;
        }
     
        public function getChapterList() {
           return $this->chapterList;
        }
     }
     
?>