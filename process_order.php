<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST["book_id"];
    $book_title = $_POST["book_title"];
    $order_date = date("Y-m-d H:i:s");

    $order_data = "ID Buku: $book_id | Judul: $book_title | Tanggal Pesanan: $order_date\n";

    file_put_contents("orders.txt", $order_data, FILE_APPEND);

    header("Location: books.php");
    exit();
}
?>