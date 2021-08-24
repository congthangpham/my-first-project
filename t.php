<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "binhchin2021";      // Khai báo database

// Kết nối database tintuc
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}

$MoTa = "";


$idBC = "";

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if(isset($_POST["MoTa"])) { $MoTa = $_POST['MoTa']; }
   
   
    if(isset($_POST["idBC"])) { $idBC = $_POST['idBC']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO phuongan (MoTa, idBC)
    VALUES ( '$MoTa', '$idBC')";

    if (mysqli_query($connect, $sql)) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}

//Đóng database
mysqli_close($connect);
?>

<form action="" method="post">
    <table>
       
        <tr>
            <th>MoTa:</th>
            <td><input type="text" name="MoTa" value=""></td>
        </tr>
        <tr>
            <th>idBC:</th>
            <td><input type="text" name="idBC" value=""></td>
        </tr>


        
    </table>
    <button type="submit">Gửi</button>
</form>