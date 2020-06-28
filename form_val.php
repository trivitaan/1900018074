<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Bagian validasi input form-->
    <?php
        $namaErr = $emailErr = $genderErr = $passwordErr = " ";
        $nama = $email = $gender = $password = " ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["nama"])){
            $namaErr = "Nama perlu diisi";
        }else{
            $nama = test_input($_POST["nama"]);
        }
        if (empty($_POST["email"])){
            $emailErr = "Email perlu diisi";
        }else{
            $email = test_input($_POST["email"]);
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Format email salah";
        }
        if (empty($_POST["gender"])){
            $genderErr = "Gender perlu diisi";
        }else{
            $gender = test_input($_POST["gender"]);
        }
        if (empty($_POST["password"])){
            $passwordErr = "Password perlu diisi";
        }else{
            $nama = test_input($_POST["password"]);
        }
    }
    //Apabila data sudah diinputkan maka lakukan function test_input
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Nama: <input type="text" name="nama" value="<?php echo $nama;?>">
        <span class="error">* <?php echo $namaErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* 
            <?php echo $emailErr;?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" 
            <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" 
            <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        Password :
        <input type="password" name="password" value="<?php echo $password;?>">
        <span class="error">* 
            <?php echo $passwordErr;?></span>
        <br><br>

        <input type="submit" name="submit" value="Submit">  
        </form>

        <?php
            echo "<h2>Your Input:</h2>";
            echo $nama;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $gender;
        ?>
</body>
</html>