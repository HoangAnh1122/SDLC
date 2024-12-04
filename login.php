<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        function validateForm() {
            var x = document.getElementById("username").value;
            var y = document.getElementById("email").value;
            if (x == null || x == "" & y == null || y == "") {
                alert("Username or Email can not be empty!");
                return false;
            }
        }
    </script>
</head>
<style>
    /* Đặt kiểu toàn bộ trang */
    body {
        font-family: 'Poppins', sans-serif;
        background-image: url('anh2.png');
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: black;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        max-width: 1000px;
        width: 100%;
        height: 700px;
    }

    .form-section {
        padding: 30px 40px;
        width: 50%;
        text-align: center;
    }

    .form-section h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    input[type="text"],
    input[type="password"] {
        width: 440px;
        padding: 12px 15px;
        margin: 10px 0;
        border: none;
        border-radius: 8px;
        background: #f1f1f1;
        font-size: 16px;
        color: #333;
        transition: transform 0.2s ease, background 0.3s ease;

    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        background: #e8f0fe;
        outline: none;
        transform: scale(1.02);
        box-shadow: 0 0 10px rgba(110, 142, 251, 0.5);
    }

    input[type="submit"] {
        width: 300px;
        padding: 12px 15px;
        margin-top: 15px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        color: #fff;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
        background: linear-gradient(135deg, #a777e3, #6e8efb);
        box-shadow: 0 5px 15px rgba(110, 142, 251, 0.5);

    }

    .image-section {
        width: 50%;
        background-image: url('anh1.png');
        background-size: cover;
        background-position: center;
        height: 500px;
        width: 600px;
        border-radius: 15px;
        /* Bo tròn tất cả các góc của vùng chứa */
    }

    label {
        margin-right: 350px;

    }
    select{
        width: 440px;
        padding: 12px 15px;
        margin: 10px 0;
        border: none;
        border-radius: 8px;
        background: #f1f1f1;
        font-size: 16px;
        color: #333;
        transition: transform 0.2s ease, background 0.3s ease;
        background: #e8f0fe;
        outline: none;
        transform: scale(1.02);
        box-shadow: 0 0 10px rgba(110, 142, 251, 0.5);

    }
</style>

<body>


    <body>
        <div class="container">
            <div class="form-section">
                <h1>Login</h1>
                <form action="" method="POST" onsubmit="return validateForm()">
                    <label for="">Username :</label>
                    <input type="text" name="username" id="username"><br><br>

                    <label for="">Password :</label>
                    <input type="password" name="password"><br>

                    <label for="">Role :</label>
                    <select name="role" id="role" class="form-control">
                        <option value=""></option>
                        <option value="Admin">Admin</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Student">Student</option>
                    </select>
                  <input type="submit" name="submit" value="Register">
                    <p>Don't have an account? <a href="register.php">Register Now</a></p>
                </form>
            </div>
            <div class="image-section"></div>
        </div>
        <?php
        include "Connect.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Nhận dữ liệu từ form
            $username = $_POST["username"];
            $password = $_POST["password"];
            $role = $_POST["role"];
            $sql = "select * from users where username='$username' AND password=$password AND role = '$role'";
            //Bước 3: Thực thi truy vấn
            $result = mysqli_query($conn, $sql);
            //Bước 4: Xử lý kết quả truy vấn
            if ($result) {
                echo "Login successful! Redirecting to home page...";
                header("Location: home.php");
            } else {
                echo " Thêm thất bại";
            }
        }
        ?>
    </body>

</html>