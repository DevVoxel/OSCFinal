<?php

function getDbConnection(): ?PDO {
    try {
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];
        $host = 'mysql:dbname=oceanicdb;host=127.0.0.1';
        $user = 'root';
        $pass = '';

        return new PDO($host, $user, $pass, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();

        return null;
    }
}

function getPost(): Traversable {
    try {
        $db = getDbConnection();

        return $db->query("SELECT p.*, i.image_id FROM POST p left join IMAGE i on p.post_id = i.post_id");
    } catch (PDOException $e) {
        echo $e->getMessage();

        return [];
    }
}

function getInfo() {

    try {

        $db = getDbConnection();

        $id = $_GET['id'];
        //var_dump($id);

        return $db->query("SELECT * FROM POST WHERE post_id = $id");
    } catch (\PdoException $e) {
        // log error
    }
}

function handleSubmit(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (empty($_POST["post_title"])) {
                return;
            }

            $sql = "INSERT INTO POST (post_title, post_body)
            VALUES ('".$_POST["post_title"]."','".$_POST["post_body"]."')";
            $conn = getDbConnection();
            $conn->query($sql);
            uploadImg($conn->lastInsertId(), $conn);

            } catch (PDOException $e) {
                // log exception
                echo $e->getMessage();
            }
    }
    header('Location: ./forum.php');
}

function deletePost(int $id): void {
    try {
        if ($id <= 0) {
            return;
        }
        getDbConnection()->query("DELETE FROM POST WHERE post_id = $id");
    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();
    }
}

function handleSubmitEdit(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (empty($_POST["post_title"])) {
                return;
            }

            $id = $_POST['post_id'];
            $title = $_POST['post_title'];
            $body = $_POST['post_body'];
            $sql = "UPDATE POST SET post_title = '$title', post_body = '$body' WHERE post_id='$id' ";
            $conn = getDbConnection();
            $conn->query($sql);
            uploadImgEdit($id, $conn);

            getDbConnection()->query($sql);
            } catch (PDOException $e) {
                // log exception
                echo $e->getMessage();
            }
    }
    header('Location: ./forum.php');
}

function getImage() {

    try {
        $db = getDbConnection();
        
        return $db->query("SELECT * FROM IMAGE");
    } catch (\PdoException $e) {
        // log error
    }
}

function getImgInfo() {

    try {

        $db = getDbConnection();

        $id = $_GET['id'];

        return $db->query("SELECT * FROM IMAGE WHERE image_id = $id");
    } catch (\PdoException $e) {
        // log error
    }
}

function uploadImg(int $postId, \PDO $connect) {
    if (isset($_FILES["upload"])) {
      try {
        // require "include/connect.php";
        $type = $_FILES['upload']['type'];
        $stmt = $connect->prepare("INSERT INTO IMAGE (file_name, img_data, mimetype, post_id) VALUES (?,?,?,?)");
        $stmt->execute([
          $_FILES["upload"]["name"], 
          file_get_contents($_FILES['upload']['tmp_name']),
          $type,
          $postId
        ]);
        echo "Image Uploaded";
      } catch (Exception $ex) { echo $ex->getMessage(); }
    }
}

function uploadImgEdit(int $postId, \PDO $connect) {
    if (isset($_FILES["upload"])) {
      try {
        // require "include/connect.php";
        $type = $_FILES['upload']['type'];
        // $result = $connect->query('SELECT * FROM IMAGE WHERE post_id = $postid');
            $stmt = $connect->prepare("UPDATE IMAGE SET file_name = ?, img_data = ?, mimetype = ? WHERE post_id = ? ");
            $stmt->execute([
            $_FILES["upload"]["name"], 
            file_get_contents($_FILES['upload']['tmp_name']),
            $type,
            $postId
        ]);
        echo "Image Uploaded";
      } catch (Exception $ex) { echo $ex->getMessage(); }
    }
}