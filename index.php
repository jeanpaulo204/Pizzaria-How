
<?php

if(isset($_POST['submit']))
{

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$Bairro = $_POST['Bairro'];
$pizza1 = $_POST['portuguesa'];
$pizza2 = $_POST['Brocólis com Parmesão'];
$pizza3 = $_POST['Pimentão com queijo'];
$result = $_POST['result'];



$rsult = mysqli_query($conexao, "INSERT INTO usuarios(nome,sobrenome,cpf,telefone,Bairro,ch[],result) 
VALUES ('$nome','$sobrenome','$telefone','$Bairro','$pizza1', '$pizza2' ,'$pizza3','$result')");



}




?>



<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css" media="screen">
    <title>pizzaria</title>
</head>


<body>
    <div id="logo-A">
        <div id="banner">
            <div class="text-A">
          <h3>Pizzaria</h3>
            </div>
        </div>
     </div>



 <main>  

 <div id="login">
            
<div class="quadrado">
            
<form >
    <input type="hidden" name="accessKey" value="[INSERIR A CHAVE DE ACESSO AQUI]">
     
  <fieldset class="grupo">
                           
    <div class="campo">
            <label for="nome"><strong>Nome</strong></label>
            <input type="text" name="nome" id="nome" required>
    </div>
                    <br>
                        
    <div class="campo">
        <label for="sobrenome"><strong>Sobrenome</strong></label>
    <input type="text" name="sobrenome" id="sobrenome" required>
    </div>
                    <br>
    <div class="campo">
        <label for="cpf"><strong>CPF</strong></label>
        <input type="password" name="indentidade" id="indentidade" required>
    </div>
                    <br>
    <div class="campo">
        <label for="telefone"><strong>telefone</strong></label>
        <input type="phone" name="telefone" id="telefone" required>
    </div>
                    
                    <br>
                    
    <div class="campo">
    <label for="Bairro"><strong>Bairro</strong></label>
    <input type="text" name="bairro" id="bairro" required>
    </div> <br> <br>
  
    




                          <fieldset>
                       <h3>Cardápio</h3>
                    
                    
                    
         <div class="campo">
                       <img src="pizza3.png" width="50px">  <input   name="ch[]"  value="25.00  Portuguesa" type="checkbox" name="Portuguesa" value="Portuguesa" >Portuguesa
                        </label><br>
                        <label>
                        <img src="pizza2.png" width="50px">  <input  name="ch[]"  value="25.00 Brocólis com Parmesão"  type="checkbox" name="Brocólis com Parmesão" value="Brocólis com Parmesão">Brocólis com Parmesão
                        </label><br>
                        <label>
                        <img src="pizza.png" width="50px">  <input  name="ch[]"  value="25.00  Pimentão com queijo"   type="checkbox" name="Pimentão com queijo" value="Pimentão com queijo">Pimentão com queijo
                        </label>
        </div>




                    
        <div class="campo">
                        <label for="Tamanho"><strong>Tamanho</strong></label>
                        <select id="Tamanho" required>
                          <option selected disabled value="">Selecione</option>
                          <option name="ch[]" value="50.00">Grande</option>
                          
                        </select> <br> <br>
        </div>
                      </fieldset>
 


                      <h1>Total</h1> 
                      <div class="quadrado-b">
                        <div id="total">
                            <label>Valor Do Produto <input type="text" name="result" id="result" value="R$ 0,00" /></label>
                        </div>

                        <button >Finalizar</button>


                        </div>

        </form>
</div>
</div>          
</main>
            
     

<script>
String.prototype.formatMoney = function() {
    var v = this;

    if(v.indexOf('.') === -1) {
        v = v.replace(/([\d]+)/, "$1,00");
    }

    v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
    v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
    v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

    return v;
};
String.prototype.toFloat = function() {
    var v = this;

    if (!v) return 0;
    return parseFloat(v.replace(/[\D]+/g, '' ).replace(/([\d]+)(\d{2})$/, "$1.$2"));
};
(function(){
    "use strict";

    var $chs = document.querySelectorAll('input[name="ch[]"]'),
        $result = document.getElementById('result'),
        chsArray = Array.prototype.slice.call($chs);

    chsArray.forEach(function(element, index, array){
        element.addEventListener("click", function(){
            var v = this.value,
                result = 0;
            v = v.toFloat();

            if (this.checked === true) {
                result = $result.value.toFloat() + parseFloat(v);
            } else {
                result = $result.value.toFloat() - parseFloat(v);
            }

            $result.value = "R$ " + String(result).formatMoney();
        });
    });


}());
</script>


</body>
</html>
