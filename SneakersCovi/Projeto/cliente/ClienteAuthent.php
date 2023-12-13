<?php      
    include('ClienteConnection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
      
    $sql = "SELECT * FROM multi_login WHERE username = '$username' AND password = '$password'";  //vai buscar os dados à base de dados 
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1){  //<----
        header("location:http://localhost:8888/interface/SneakersCovi/loja/loja.html");
          
    }
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }    

?>