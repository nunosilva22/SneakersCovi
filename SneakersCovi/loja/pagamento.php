<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/pagar.css">


</head>
<body>

<div class="pay">
    <h2>Formulário de Pagamento</h2>
</div>

<div class="row">
    <div class="col-75">
    <div class="container">
    <form action="index.html">
      
      <div class="row">
        <div class="col-50">
          <h3>Endereço</h3>
          <label for="fname" ><i class="fa fa-user"></i> Nome Completo</label>
          <input type="text" id="fname" name="firstname" placeholder="Nome Completo" required>
          
          <label for="email"><i class="fa fa-envelope"></i> Email</label>
          <input type="text" id="email" name="email" placeholder="exemplo@gmail.com" required>
          
          <label for="adr"><i class="fa fa-address-card-o"></i> Endereço</label>
          <input type="text" id="adr" name="address" placeholder="Endereço" required>
          
          <label for="city"><i class="fa fa-institution"></i> Cidade</label>
          <input type="text" id="city" name="city" placeholder="Cidade" required>
          
          <a href="http://localhost/interface/fpdf.php"><input value="Pagar" class="btn"></a>
        </div>

        <div class="col-50">
          <h3>Pagamento</h3>
          <label for="fname">Cartões Aceites</label>
          <div class="icon-container">
            <i class="fa fa-cc-visa" style="color:navy;"></i>
            <i class="fa fa-paypal" style="color: blue"></i>
            <i class="fa fa-cc-mastercard" style="color:red;"></i>
            <i class="fa fa-credit-card" style="color:green"></i>
          </div>
          
          <label for="cname">Nome do Cartão</label>
          <input type="text" id="cname" name="cardname" placeholder="Nome" required>
          
          <label for="ccnum">Número do Cartão</label>
          <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
          
          <label for="expmonth">Validade Mês</label>
          <input type="text" id="expmonth" name="expmonth" placeholder="Setembro" required>
          
          <label for="expyear">Validade Ano</label>
          <input type="text" id="expyear" name="expyear" placeholder="2018" required>      
          
          <label for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv" placeholder="352" required>
            
          </div>
        </div>
      </div>

    </form>
    </div>
  </div>
  
</div>

</body>
</html>