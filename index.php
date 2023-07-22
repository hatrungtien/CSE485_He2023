<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display: flex; justify-content: center;">
        <div>
            <h1>Danh sách cuốn sách</h1>

            <?php
                require_once 'src/Models/Book.php';
                require_once 'src/Models/BookList.php';

                session_start();
    
                if (!isset($_SESSION['bookList'])) {
                    $_SESSION['bookList'] = new BookList();
                }

                // Lấy danh sách các cuốn sách từ session
                $bookList = $_SESSION['bookList'];
                // Kiểm tra xem có cuốn sách mới được thêm vào không
                if (isset($_POST['add_book'])) {
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $publisher = $_POST['publisher'];
                    $year = $_POST['year'];
                    $isbn = $_POST['isbn'];
                    $chapters = explode(",", $_POST['chapters']);

                    $newBook = new Book($title, $author, $publisher, $year, $isbn, $chapters);

                    // Thêm sách mới vào danh sách
                    $bookList->addBook($newBook);
                    // Cập nhật danh sách cuốn sách trong session
                    $_SESSION['bookList'] = $bookList;
                }

                // Kiểm tra xem người dùng đã chọn sắp xếp nào
                if (isset($_POST['sort_by_author'])) {
                    $bookList->sortByAuthor();
                }
                if (isset($_POST['sort_by_title'])) {
                    $bookList->sortByTitle();
                }
                if (isset($_POST['sort_by_year'])) {
                    $bookList->sortByPublicationYear();
                }

                // Lấy danh sách cuốn sách
                $books = $bookList->getBooks();

                // Hiển thị danh sách cuốn sách
                if (!empty($books)) {
                    echo "<table>";
                    echo "<tr><th>Tên sách</th><th>Tên tác giả</th><th>Nhà xuất bản</th><th>Năm xuất bản</th><th>ISBN</th><th>Danh mục chương sách</th></tr>";
                    foreach ($books as $book) {
                        echo "<tr>";
                        echo "<td>" . $book->getBookTitle() . "</td>";
                        echo "<td>" . $book->getAuthorName() . "</td>";
                        echo "<td>" . $book->getPublisher() . "</td>";
                        echo "<td>" . $book->getPublicationYear() . "</td>";
                        echo "<td>" . $book->getISBN() . "</td>";
                        echo "<td>" . implode(',', $book->getChapterList()) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Không có sách có sẵn.";
                }
            ?>
            <style>
                table, th, td{
                    border: 1px solid black;
                    text-align: left;
                }
            </style>
            <h2>Thêm sách mới</h2>

            <form method="POST" action="">
                <div style="margin-top: 10px;">
                    <label for="title">Tên sách:</label>
                    <input type="text" name="title" style="margin-left: 100px;" required>
                </div>

                <div style="margin-top: 10px;">
                    <label for="author">Tên tác giả:</label>
                    <input type="text" name="author" style="margin-left: 87px;" required>
                </div>

                <div style="margin-top: 10px;">
                    <label for="publisher">Nhà xuất bản:</label>
                    <input type="text" name="publisher" style="margin-left: 73px;" required>
                </div>

                <div style="margin-top: 10px;">
                    <label for="year">Năm xuất bản:</label>
                    <input type="number" name="year" style="margin-left: 69px;" required>
                </div>

                <div style="margin-top: 10px;">
                    <label for="isbn">ISBN:</label>
                    <input type="text" name="isbn" style="margin-left: 122px;" required>
                </div>

                <div style="margin-top: 10px;">
                    <label for="chapters">Danh mục chương sách:</label>
                    <input type="text" name="chapters" style="margin-left: 8px;" required>
                </div>

                <input type="submit" name="add_book" value="Thêm sách" style="margin-top: 15px;">
            </form>

            <form method="POST" action="" style="margin-top: 30px;">
                <button type="submit" name="sort_by_author">sắp xếp theo tên tác giả</button>
                <button type="submit" name="sort_by_title">sắp xếp theo tên sách</button>
                <button type="submit" name="sort_by_year">sắp xếp theo năm suất bản</button>
            </form>
        </div>
    </div>
    
</body>
</html>