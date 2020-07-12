<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kelas Wirausaha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!--Bagian validasi input form-->
    <?php
        $namaErr = $emailErr = $genderErr = $passwordErr = $alamatErr = $jenisusahaErr = $modalusahaErr = "";
        $nama = $email = $gender = $password = $jenisusaha = $modalusaha = $alamat = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST["nama"])){
            $namaErr = "Nama perlu diisi";
        }else{
            $nama = test_input($_POST["nama"]);
        }
        if (empty($_POST["alamat"])){
            $alamatErr = "Alamat perlu diisi";
        }else{
            $alamat = test_input($_POST["alamat"]);
        }
        if (empty($_POST["modalusaha"])){
            $modalusahaErr = "Modal usaha perlu diisi";
        }else{
            $modalusaha = test_input($_POST["modalusaha"]);
        }
        if (empty($_POST["jenisusaha"])){
            $jenisusahaErr = "Jenis usaha perlu diisi";
        }else{
            $jenisusaha = test_input($_POST["jenisusaha"]);
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
            $password = test_input($_POST["password"]);
        }
    }
    //Apabila data sudah diinputkan maka lakukan function test_input
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //write data ke file txt

    ?>
    <!--Tampilan dalam Browser-->
    <div class="container" style="padding-top: 20px; padding : 20px">
        <table>
        </table>
    </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>