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
        include 'table_pendaftar.php';
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
        <center> <h3>Pendaftaran Kelas Wirausaha</h3></center><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="background-color: #f0f8ff; padding : 20px">  
            <div class="form-group">
                <label for="nama">Nama Lengkap</label><span class="error">* <?php echo $namaErr;?></span>
                <input type="text" class="form-control" name="nama" placeholder="Nama Anda" value="<?php echo $nama;?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label><span class="error">* <?php echo $alamatErr;?></span>
                <input type="text" class="form-control" name="alamat" placeholder="Kota Domisili" value="<?php echo $alamat;?>">
            </div>
           <div class="form-row">
                <label for="jenisusaha">Jenis Usaha</label><span class="error">* <?php echo $jenisusahaErr;?></span>
                <select id="jenisusaha" class="form-control" name="jenisusaha" value="<?php echo $jenisusaha;?>">
                    <option <?php if (isset($jenisusaha) && $jenisusaha=="homeindustry") echo "selected";?> value="home industry" selected>Home Industry</option>
                    <option <?php if (isset($jenisusaha) && $jenisusaha=="kuliner") echo "selected";?> value="kuliner">Bidang Kuliner</option>
                    <option <?php if (isset($jenisusaha) && $jenisusaha=="reseller") echo "selected";?> value="reseller">Bidang Reseller</option>
                    <option <?php if (isset($jenisusaha) && $jenisusaha=="jasa") echo "selected";?> value="jasa">Bidang Jasa</option>
                </select>
           </div><br>
           <div class="form-row">
                <label for="modalusaha">Modal Usaha</label><span class="error">* <?php echo $modalusahaErr;?></span>
                <select id="modalusaha" class="form-control" name="modalusaha" value="<?php echo $modalusaha;?>">
                    <option <?php if (isset($modalusaha) && $modalusaha=="kecil") echo "selected";?> value="modal kecil" selected>Modal Kecil</option>
                    <option <?php if (isset($modalusaha) && $modalusaha=="sadang") echo "selected";?> value="modal sedang">Modal Sedang</option>
                    <option <?php if (isset($modalusaha) && $modalusaha=="besar") echo "selected";?> value="modal besar">Modal Besar</option>
                </select>
           </div><br>
            <div class="form-group">                    
                <label for="gender">Jenis Kelamin</label><span class="error">* <?php echo $genderErr;?></span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" 
                    <?php if (isset($gender) && $gender=="male") echo "checked";?> value="pria" checked>
                    <label class="form-check-label" for="male">
                        Pria
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" 
                    <?php if (isset($gender) && $gender=="female") echo "checked";?> value="wanita">
                    <label class="form-check-label" for="female">
                        Wanita
                    </label>
                    
                </div>
            </div>
            
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label><span class="error">* <?php echo $emailErr;?></span>
                <input type="text" name="email" class="form-control" placeholder="Email Anda" value="<?php echo $email;?>">
                
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label><span class="error">* <?php echo $passwordErr;?></span>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $password;?>">
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
        <?php
            $fp = fopen('datapendaftar.txt', 'w');
            fwrite($fp, 'Nama : ');
            fwrite($fp, $nama);
            fwrite($fp, "\n");
            fwrite($fp, 'Alamat : ');
            fwrite($fp, $alamat);
            fwrite($fp, "\n");
            fwrite($fp, 'Email : ');
            fwrite($fp, $email);
            fwrite($fp, "\n");
            fwrite($fp, 'Jenis Usaha Yang Diminati : ');
            fwrite($fp, $jenisusaha);
            fwrite($fp, "\n");
            fwrite($fp, 'Rencana Modal Usaha : ');
            fwrite($fp, $modalusaha);
            fclose($fp);
        ?>
       
        </div>
            

    </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>