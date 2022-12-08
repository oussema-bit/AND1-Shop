<?php
include "Controller/ControllerProd.php";
include "Login/Controller/UserC.php";

$user = null;
session_start();
$UserC = new ClientC();
if(isset($_SESSION["clientemail"]))
{
    $user=$UserC->recupereruser_email($_SESSION["clientemail"]);
}
include "Model/ModelCart.php";

class CommandeC {
    function ajoutercommande($admin){
        $sql="INSERT INTO commande (id_client, dscrp, Price_Command) 
        VALUES (:id_client,:dscrp, :price)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'id_client' => $admin->getclinet_id(),
                'dscrp' => $admin->getdescrp(),
                'price' => $admin->getprice()
                ]);			
        }	
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }

}
      if(isset($_POST['order-now'])){
        $Commande = new Commande(
          $user['id'],
          $_POST['order-description'], 
          $_POST['price-order']
      );
      $CommandeC = new CommandeC();
          $CommandeC->ajoutercommande($Commande);
          unset($_SESSION["cart"]);
          header("Location: index.php");
     }
?>

<?php

if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
            }
        }
    }}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,900,600,700&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Cart.css">
  <link rel="stylesheet" href="css/Product-card-template.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <title>AND1</title>
</head>

<body>
  <div class="container">
    <div class="wrapper">

      <div class="nav">
        <div class="logo">
          <div class="icon-container-kobe"><div class="kobe"style="background:url('images/kobe.png') no-repeat;background-size:cover;"></div></div> 
          <h1>
            
           <span>“Everything negative — pressure, challenges — are all an opportunity for me to rise.”</span> 
  <br>
  ― Kobe Bryant.
          </h1>
        </div>
  
        <div class="menu-links">
          <ul>
            <a href="index.php"><li>Home</li></a>
            <a href="index.php#Offers"><li>Offers</li></a>
            <a href="product.php"><li>Products</li></a>
            <a href="Login/Users/Login.php"><li>Log in /Sign up</li></a>
            <a href="Login/Users/Logout.php"><li>Log out</li></a>
          </ul>
        </div>
  
        <div class="box">
        <div class="scrollcontainer"><div class="scrolldown">By Youssef</div></div>
        <div class="Cart"><a href=""><span class="cart">
  <svg height="512pt" viewBox="0 -31 512.00026 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0"/><path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/><path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/></svg>
  <?php
  if(isset($_SESSION['cart'])){
  ?>
  <span class="cart__count"><?php echo count($_SESSION['cart']);  ?></span>
  <?php
  }else {
  ?>
  <span class="cart__count">0</span>
<?php
  }
  ?>  <?php
if($user)
{
  ?>
  <span class="profile"style="background:url('<?php echo $user['img']; ?>');  background-size: cover;"></span>
  <?php
}
  ?>
    </span></a>
    </div> 
        </div>
      </div>
      <div class="media">
        <ul>
          <li><a href="https://www.facebook.com/oussema.ayarii57527/"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.instagram.com/oussema____ayari/"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
      <h1 id="Offers"class="section-title"style='margin-left: 45%;'>Cart Items</h1>
    <div class="Cart-ticket">
    <h6>PRICE DETAILS</h6>
    <hr>
    <br>
    <div class="row price-details">
        <div class="col-md-6">
            <?php
                if (isset($_SESSION['cart'])){
                    $count  = count($_SESSION['cart']);
                    echo "<h6>Price ($count items): <span class='total'>0</span> $</h6>";
                }else{
                    echo "<h6>Price (0 items)</h6>";
                }
            ?>
            +
            <h6>Delivery Charges: + <span class="deliv">FREE</span> </h6>
            <hr>
            <h6>Amount Payable: <span class="fact-total">0</span>$</h6>
            <?php
            if (isset($_SESSION['cart'])){
              ?>
              <?php
                if(isset($user)){
              ?>
              <form method="POST"id="order-form">
              <div class="Order-section">
            <button type="submit"class="Order-btn"name="order-now">Order Now !</button>
            <?php
            $product_id = array_column($_SESSION['cart'], 'product_id');
            $order_description="";
                        foreach($product_id as $id){
                            $ProdC=new ProdC();
                        $listeprods=$ProdC->recupererprod($id);
                        $order_description.=$listeprods['Name']." ";
                        }
                        ?>
            <input type="hidden"name="order-description"value="<?php echo $order_description; ?>">
            <input type="hidden" name="price-order"value=""class="order_price">
              </form>
                  <?php
                }else {
                  ?>
                  <div class="Order-section">
            <a href="Login/Users/Login.php"class="Order-btn">Order Now !</a>
                  <?php
                }
              ?>
            </div>
            <?php
            }
            ?>
        </div>
       
    </div>
    </div>

    <?php
                
                
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        foreach($product_id as $id){
                            $ProdC=new ProdC();
                        $listeprods=$ProdC->recupererprod($id);
                        $order_quant[$listeprods['id']]=1;
                        ?>
                    
                        <div class="prod-list-item">
                            <div class="prod-img-container">
                                <img src="<?php echo $listeprods['img']; ?>" class="prod-img">
                            </div>
                            <div class="prod-details">
                            <div class="prod-detail-name">
                              <h6 class="prod-detail-item">Name</h6>
                            <div class="prod-detail-item"><?php echo $listeprods['Name']; ?></div> 
                            </div>
                            <div class="prod-detail-name">
                              <h6 class="prod-detail-item">Price</h6>
                            <div class="prod-detail-item"><?php echo $listeprods['Price']; ?></div> 
                            </div>
                            <div class="prod-detail-name">
                              <h6 class="prod-detail-item">Quantity</h6>
                            <div class="prod-detail-item"><button type="button" name="minus"id="<?php echo "minus".$listeprods['id']; ?>"class="minus-btn"><i class="fas fa-minus"></i></button>
                                    <input type="number" min=1 value="<?php echo $order_quant[$listeprods['id']]?>" name="quantite"id="<?php echo "quantite".$listeprods['id']; ?>"class="prod-quant">
                                    <input type="hidden" id="<?php echo "price".$listeprods['id']; ?>"value="<?php echo $listeprods['Price']; ?>">
                                    <button type="button" name="plus"id="<?php echo "plus".$listeprods['id']; ?>"class="plus-btn"><i class="fas fa-plus"></i></button> </div> 
                            </div>
                            <div class="prod-detail-name">
                              <h6 class="prod-detail-item">Total</h6>
                            <div class="prod-detail-item"><div class="prod-total-price"id="<?php echo "total".$listeprods['id']; ?>"><?php echo $listeprods['Price']; ?></div> $</div> 
                            </div>
                            <div class="prod-detail-name">
                              <h6 class="prod-detail-item"></h6>
                            <div class="prod-detail-item">
                            <form  action="Cart.php?action=remove&id=<?php echo $listeprods['id'] ?>"method="POST">
                            <button type="submit" class="remove-btn"name="remove"> Remove</button>
                        </form>
                            </div> 
                            </div>
                            </div>
                        </div>
                    
                            <script>
                                
                                var total=0;
                                document.getElementById("<?php echo "minus".$listeprods['id']; ?>").addEventListener("click",()=>{
                                    if(document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value>1)
                                    {
                                    document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value--;
                                    total=parseFloat(document.getElementById("<?php echo "price".$listeprods['id']; ?>").value)*document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value;
                                    document.getElementById("<?php echo "total".$listeprods['id']; ?>").innerHTML= total.toFixed(2);
                            var tot=0;
                            
                        <?php
                        foreach($product_id as $idd){
                            $ProdCC=new ProdC();
                            $listeprodss=$ProdCC->recupererprod($idd);
                        ?>
                        
                            tot+=parseFloat(document.getElementById("<?php echo "total".$listeprodss['id']; ?>").innerHTML);
                            document.querySelector(".total").innerHTML=tot.toFixed(2);
                            document.querySelector(".fact-total").innerHTML=tot.toFixed(2);
                            document.querySelector(".order_price").value=tot.toFixed(2);
                            if(tot<=500){
                              document.querySelector(".deliv").innerHTML=7;
                              tot+=7;
                              document.querySelector(".fact-total").innerHTML=tot.toFixed(2);
                              document.querySelector(".order_price").value=tot.toFixed(2);
                              document.querySelector(".deliv").style.color="black";

                          }else{
                            document.querySelector(".deliv").innerHTML="FREE";
                            document.querySelector(".deliv").style.color="green";
                          }
                        <?php
                        }
                        ?>
                                    }
                                });
                                document.getElementById("<?php echo "plus".$listeprods['id']; ?>").addEventListener("click",()=>{
                                    document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value++;
                                    document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value=document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value;
                                    total=parseFloat(document.getElementById("<?php echo "price".$listeprods['id']; ?>").value)*document.getElementById("<?php echo "quantite".$listeprods['id']; ?>").value;
                                    document.getElementById("<?php echo "total".$listeprods['id']; ?>").innerHTML= total.toFixed(2);
                                    var tot=0;
                            
                            <?php
                            foreach($product_id as $idd){
                                $ProdCC=new ProdC();
                                $listeprodss=$ProdCC->recupererprod($idd);
                            ?>
                            
                                tot+=parseFloat(document.getElementById("<?php echo "total".$listeprodss['id']; ?>").innerHTML);
                                document.querySelector(".total").innerHTML=tot.toFixed(2);
                                document.querySelector(".fact-total").innerHTML=tot.toFixed(2);
                                document.querySelector(".order_price").value=tot.toFixed(2);
                                if(tot<=500){
                              document.querySelector(".deliv").innerHTML=7;
                              tot+=7;
                              document.querySelector(".fact-total").innerHTML=tot.toFixed(2);
                              document.querySelector(".order_price").value=tot.toFixed(2);
                              document.querySelector(".deliv").style.color="black";

                          }else{
                            document.querySelector(".deliv").innerHTML="FREE";
                            document.querySelector(".deliv").style.color="green";

                          }
                            <?php
                            }
                            ?>
                                    });
                               
                                
                            </script>
                            
                    <?php
                        }
                        ?>
                        <script>
                            var tot=0;
                            </script>
                        <?php
                        foreach($product_id as $id){
                            $ProdC=new ProdC();
                            $listeprods=$ProdC->recupererprod($id);
                        ?>
                        <script>
                            tot+=parseFloat(document.getElementById("<?php echo "total".$listeprods['id']; ?>").innerHTML);
                            document.querySelector(".total").innerHTML=tot.toFixed(2);
                            document.querySelector(".fact-total").innerHTML=tot.toFixed(2);
                            document.querySelector(".order_price").value=tot.toFixed(2);
                            if(tot<=500){
                              document.querySelector(".deliv").innerHTML=7;
                              tot+=7;
                              document.querySelector(".fact-total").innerHTML=tot.toFixed(2);
                              document.querySelector(".order_price").value=tot.toFixed(2);
                              document.querySelector(".deliv").style.color="black";
                          }else{
                            document.querySelector(".deliv").innerHTML="FREE";
                            document.querySelector(".deliv").style.color="green";
                          }
                        </script>
                        <?php
                        }
                        ?>
                        <?php } else{
                        echo "<h1 class='section-title'style='margin-left: 44%;margin-top:5%;'>Cart is Empty</h5>";
                    }
                    ?>
       
      
           

    
    </div>
  </div>
 
    <script>


    TweenMax.from(".logo", 1, {
      delay: 0,
      opacity: 0,
      y: -100,
      ease: Expo.easeInOut
    })

    TweenMax.staggerFrom(".menu-links ul li", 1, {
      delay: .3,
      opacity: 0,
      x: -100,
      ease: Expo.easeInOut
    }, 0.08)

    TweenMax.from(".scrolldown", 1, {
      delay: .6,
      opacity: 0,
      y: 100,
      ease: Expo.easeInOut
    })

    TweenMax.from(".Cart", 1, {
      delay: .6,
      opacity: 0,
      y: 100,
      ease: Expo.easeInOut
    })

    TweenMax.staggerFrom(".media ul li", 1, {
      delay: .9,
      opacity: 0,
      y: 100,
      ease: Expo.easeInOut
    }, 0.08)

document.getElementById("order-form").addEventListener("submit",(e)=>{
  if(document.querySelector(".order_price").value==0){
    e.preventDefault();
  }
})
  </script>
</body>
</html>