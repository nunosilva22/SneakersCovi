<?php      
    include('AdminConnection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
      
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1){  
        header("location:http://localhost/interface/SneakersCovi/ListaProdutos.html");
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?>


