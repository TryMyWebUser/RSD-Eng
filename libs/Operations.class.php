<?php

class Operations
{

    public static function getCategory()
    {
        $conn = Database::getConnect();
        $sql = "SELECT * FROM `category` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getProducts()
    {
        $conn = Database::getConnect();
        $sql = "SELECT * FROM `products` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getCateChecker($conn)
    {
        $sql = "SELECT * FROM `category` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getProductChecker($conn)
    {
        $sql = "SELECT * FROM `products` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }

    public static function getFabChecker($conn)
    {
        $sql = "SELECT * FROM `fabrication` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }

    public static function getEreChecker($conn)
    {
        $sql = "SELECT * FROM `erection` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }

    public static function getCatePage($page, $conn)
    {
        $sql = "SELECT * FROM `category` WHERE `page` = '$page'";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getProductPage($conn)
    {
        $getDATA = $_GET['data'];
        $sql = "SELECT * FROM `products` WHERE `category` = '$getDATA'";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }

    public static function getFabrication($conn)
    {
        $getDATA = $_GET['data'];
        $sql = "SELECT * FROM `fabrication` WHERE `category` = '$getDATA'";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getErection($conn)
    {
        $getDATA = $_GET['data'];
        $sql = "SELECT * FROM `erection` WHERE `category` = '$getDATA'";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    
    public static function getCate($conn)
    {
        $getID = $_GET['edit_id'];
        $sql = "SELECT * FROM `category` WHERE `id` = '$getID'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }
    public static function getProduct($conn)
    {
        $getID = $_GET['edit_id'];
        $sql = "SELECT * FROM `products` WHERE `id` = '$getID'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    public static function getFab($conn)
    {
        $getID = $_GET['edit_id'];
        $sql = "SELECT * FROM `fabrication` WHERE `id` = '$getID'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    public static function getEre($conn)
    {
        $getID = $_GET['edit_id'];
        $sql = "SELECT * FROM `erection` WHERE `id` = '$getID'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }

    // Attendance Operations
    public static function getBranchUsers()
    {
        $conn = Database::getConnect();
        $sql = "SELECT * FROM `users` ORDER BY `created_at` ASC";
        $result = $conn->query($sql);
        return iterator_to_array($result);
    }
    public static function getBranch()
    {
        $getID = $_GET['edit_id'];
        $conn = Database::getConnect();
        $sql = "SELECT * FROM `users` WHERE `id` = '$getID'";
        $result = $conn->query($sql);
        return $result ? $result->fetch_assoc() : null;
    }
}

?>