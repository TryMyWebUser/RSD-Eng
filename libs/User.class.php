<?php

class User
{
    public static function login($username, $password)
    {
        Session::start();
        $conn = Database::getConnect();
        
        $sql = "SELECT `id`, `password` FROM `auth` WHERE `username` = '$username'";
        $res = $conn->query($sql);
        if ($res->num_rows === 1)
        {
            $row = $res->fetch_assoc();
            if ($password === $row['password'])
            {
                Session::regenerate();
                Session::set('login_user', $username);
                header("Location: welcome.php");
                exit;
            }
        }

        return "Invalid Username and Password";
    }

    public static function setCategory($page, $cate)
    {
        $conn = Database::getConnect();

        // Insert data into database
        $sql = "INSERT INTO `category` (`page`, `category`, `created_at`)
                VALUES ('$page', '$cate', NOW())";

        if ($conn->query($sql)) {
            header("Location: viewCate.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }
    public static function updateCategory($getID, $page, $cate, $conn)
    {
        // Update data into database
        $sql = "UPDATE `category` SET `page` = '$page', `category` = '$cate', `created_at` = NOW() WHERE `id` = '$getID'";

        if ($conn->query($sql)) {
            header("Location: viewCate.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }

    public static function setProducts($title, $dec, $img, $cate)
    {
        $conn = Database::getConnect();
        $targetDir = "../uploads/Products/"; // Define your upload directory
        
        if (!is_dir($targetDir)) {
            // Create directory with proper permissions
            mkdir($targetDir, 0777, true);
        }

        $allowImageTypes = ['jpg', 'png', 'jpeg', 'gif'];

        // Required file uploads
        $requiredFiles = [
            'img' => $_FILES["img"]
        ];

        foreach ($requiredFiles as $key => $file) {
            $fileName = basename($file["name"]);
            $filePath = $targetDir . $fileName;
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            if (!in_array($fileType, $allowImageTypes) || !move_uploaded_file($file["tmp_name"], $filePath)) {
                return "Error uploading required file: $key.";
            }
            $$key = $filePath; // Dynamically assign variable with directory
        }

        // Insert data into database
        $sql = "INSERT INTO `products` (`img`, `title`, `dec`, `category`, `created_at`) 
                VALUES ('$filePath', '$title', '$dec', '$cate', NOW())";

        if ($conn->query($sql)) {
            header("Location: viewPL.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }
    public static function updateProducts($title, $dec, $img, $cate, $getID, $conn)
    {
        $targetDir = "../uploads/Products/"; // Define your upload directory
        
        if (!is_dir($targetDir)) {
            // Create directory with proper permissions
            mkdir($targetDir, 0777, true);
        }

        $qry = $conn->query("SELECT * FROM `products` WHERE `id` = '$getID'")->fetch_array();

        $allowImageTypes = ['jpg', 'png', 'jpeg', 'gif'];

        // Check if a file was uploaded
        if (!empty($_FILES["img"]["name"])) {
            $fileName = basename($_FILES["img"]["name"]);
            $filePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validate file type
            if (!in_array($fileType, $allowImageTypes)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }

            // Validate file size (e.g., 5MB max)
            if ($_FILES["img"]["size"] > 5 * 1024 * 1024) {
                return "Error: File size exceeds the maximum limit of 5MB.";
            }

            // Move uploaded file to target directory
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], $filePath)) {
                return "Error: Failed to upload file.";
            }

            // Delete old image if it exists
            if (!empty($qry['img']) && file_exists($qry['img'])) {
                unlink($qry['img']);
            }

            // Update database with new image path
            $sql = "UPDATE `products` SET `img` = ?, `title` = ?, `dec` = ?, `category` = ?, `created_at` = NOW() WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $filePath, $title, $dec, $cate, $getID);
        } else {
            // Update database without changing the image
            $sql = "UPDATE `products` SET `title` = ?, `dec` = ?, `category` = ?, `created_at` = NOW() WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $title, $dec, $cate, $getID);
        }

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: viewPL.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $stmt->error;
        }
    }

    public static function setFabs($name, $img, $cate)
    {
        $conn = Database::getConnect();
        $targetDir = "../uploads/Fabs/"; // Define your upload directory
        
        if (!is_dir($targetDir)) {
            // Create directory with proper permissions
            mkdir($targetDir, 0777, true);
        }

        $allowImageTypes = ['jpg', 'png', 'jpeg', 'gif'];

        // Required file uploads
        $requiredFiles = [
            'img' => $_FILES["img"]
        ];

        foreach ($requiredFiles as $key => $file) {
            $fileName = basename($file["name"]);
            $filePath = $targetDir . $fileName;
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            if (!in_array($fileType, $allowImageTypes) || !move_uploaded_file($file["tmp_name"], $filePath)) {
                return "Error uploading required file: $key.";
            }
            $$key = $filePath; // Dynamically assign variable with directory
        }

        // Insert data into database
        $sql = "INSERT INTO `fabrication` (`name`, `img`, `category`, `created_at`) 
                VALUES ('$name', '$filePath', '$cate', NOW())";

        if ($conn->query($sql)) {
            header("Location: viewF.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }
    public static function updateFabs($name, $img, $cate, $getID, $conn)
    {
        $targetDir = "../uploads/Fabs/"; // Define your upload directory
        
        if (!is_dir($targetDir)) {
            // Create directory with proper permissions
            mkdir($targetDir, 0777, true);
        }

        $qry = $conn->query("SELECT * FROM `fabrication` WHERE `id` = '$getID'")->fetch_array();

        $allowImageTypes = ['jpg', 'png', 'jpeg', 'gif'];

        // Check if a file was uploaded
        if (!empty($_FILES["img"]["name"])) {
            $fileName = basename($_FILES["img"]["name"]);
            $filePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validate file type
            if (!in_array($fileType, $allowImageTypes)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }

            // Validate file size (e.g., 5MB max)
            if ($_FILES["img"]["size"] > 5 * 1024 * 1024) {
                return "Error: File size exceeds the maximum limit of 5MB.";
            }

            // Move uploaded file to target directory
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], $filePath)) {
                return "Error: Failed to upload file.";
            }

            // Delete old image if it exists
            if (!empty($qry['img']) && file_exists($qry['img'])) {
                unlink($qry['img']);
            }

            // Update database with new image path
            $sql = "UPDATE `fabrication` SET `name` = ?, `img` = ?, `category` = ?, `created_at` = NOW() WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $filePath, $cate, $getID);
        } else {
            // Update database without changing the image
            $sql = "UPDATE `fabrication` SET `name` = ?, `category` = ?, `created_at` = NOW() WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $name, $cate, $getID);
        }

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: viewF.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $stmt->error;
        }
    }

    public static function setEres($name, $img, $cate)
    {
        $conn = Database::getConnect();
        $targetDir = "../uploads/Eres/"; // Define your upload directory
        
        if (!is_dir($targetDir)) {
            // Create directory with proper permissions
            mkdir($targetDir, 0777, true);
        }

        $allowImageTypes = ['jpg', 'png', 'jpeg', 'gif'];

        // Required file uploads
        $requiredFiles = [
            'img' => $_FILES["img"]
        ];

        foreach ($requiredFiles as $key => $file) {
            $fileName = basename($file["name"]);
            $filePath = $targetDir . $fileName;
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            if (!in_array($fileType, $allowImageTypes) || !move_uploaded_file($file["tmp_name"], $filePath)) {
                return "Error uploading required file: $key.";
            }
            $$key = $filePath; // Dynamically assign variable with directory
        }

        // Insert data into database
        $sql = "INSERT INTO `erection` (`name`, `img`, `category`, `created_at`) 
                VALUES ('$name', '$filePath', '$cate', NOW())";

        if ($conn->query($sql)) {
            header("Location: viewE.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }
    public static function updateEres($name, $img, $cate, $getID, $conn)
    {
        $targetDir = "../uploads/Eres/"; // Define your upload directory
        
        if (!is_dir($targetDir)) {
            // Create directory with proper permissions
            mkdir($targetDir, 0777, true);
        }

        $qry = $conn->query("SELECT * FROM `erection` WHERE `id` = '$getID'")->fetch_array();

        $allowImageTypes = ['jpg', 'png', 'jpeg', 'gif'];

        // Check if a file was uploaded
        if (!empty($_FILES["img"]["name"])) {
            $fileName = basename($_FILES["img"]["name"]);
            $filePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validate file type
            if (!in_array($fileType, $allowImageTypes)) {
                return "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
            }

            // Validate file size (e.g., 5MB max)
            if ($_FILES["img"]["size"] > 5 * 1024 * 1024) {
                return "Error: File size exceeds the maximum limit of 5MB.";
            }

            // Move uploaded file to target directory
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], $filePath)) {
                return "Error: Failed to upload file.";
            }

            // Delete old image if it exists
            if (!empty($qry['img']) && file_exists($qry['img'])) {
                unlink($qry['img']);
            }

            // Update database with new image path
            $sql = "UPDATE `erection` SET `name` = ?, `img` = ?, `category` = ?, `created_at` = NOW() WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $filePath, $cate, $getID);
        } else {
            // Update database without changing the image
            $sql = "UPDATE `erection` SET `name` = ?, `category` = ?, `created_at` = NOW() WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $name, $cate, $getID);
        }

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: viewE.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $stmt->error;
        }
    }

    // Attendance Functions
    public static function branchLogin($username, $password, $branch)
    {
        Session::start();
        $conn = Database::getConnect();
        
        $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `branch` = '$branch'";
        $res = $conn->query($sql);
        if ($res->num_rows === 1)
        {
            $row = $res->fetch_assoc();
            if ($password === $row['password'])
            {
                Session::regenerate();
                Session::set('branch', $branch);
                Session::set('branch_user', $username);
                header("Location: attendance/index.php");
                exit;
            }
        }

        return "Invalid Username and Password";
    }

    public static function setBranchAccount($branch, $user, $pass)
    {
        $conn = Database::getConnect();

        // Insert data into database
        $sql = "INSERT INTO `users` (`username`, `password`, `branch`, `created_at`)
                VALUES ('$user', '$pass', '$branch', NOW())";

        if ($conn->query($sql)) {
            header("Location: viewBranch.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }
    public static function updateBranchAccount($getID, $branch, $user, $pass)
    {
        $conn = Database::getConnect();

        // Update data into database
        $sql = "UPDATE `users` SET `username` = '$user', `password` = '$pass', `branch` = '$branch', `created_at` = NOW() WHERE `id` = '$getID'";

        if ($conn->query($sql)) {
            header("Location: viewBranch.php");
            exit;
        } else {
            return "Error occurred while saving data: " . $conn->error;
        }
    }
}

?>