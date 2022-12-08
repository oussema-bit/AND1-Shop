<?php
include "Controller/ControllerProd.php";
$ProdC=new ProdC();
$listeprods=$ProdC->afficherprod();
$numbers=$ProdC->howmanyprods();
include "Login/Controller/UserC.php";
$user = null;
session_start();
$UserC = new ClientC();
if(isset($_SESSION["clientemail"]))
{
    $user=$UserC->recupereruser_email($_SESSION["clientemail"]);
   
}
if(fmod($numbers,3)!=0)
{
  $n=intdiv($numbers,3)+1;
}else $n=$numbers/3;
$grid="";
for($i=0;$i<$n;$i++)
$grid.=" 1fr";

if(isset($_POST['add'])){
  if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'], "product_id");

    if(in_array($_GET['id'], $item_array_id)){
        echo "<script>alert('Product is already added in the cart..!')</script>";
        echo "<script>window.location = 'product.php'</script>";
    }else{

        $count = count($_SESSION['cart']);
        $item_array = array(
            'product_id' => $_GET['id']
        );

        $_SESSION['cart'][$count] = $item_array;
  }
}else{
  $item_array= array(
    'product_id' => $_GET['id']
  );
  $_SESSION['cart'][0]= $item_array;
}

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,900,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Product-card-template.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <title>Basketball is life</title>
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
            <li>Products</li>
            <a href="Login/Users/Login.php"><li>Log in /Sign up</li></a>
            <a href="Login/Users/Logout.php"><li>Log out</li></a>
          </ul>
        </div>
  
        <div class="box">
        <div class="scrollcontainer"><div class="scrolldown">By Youssef</div></div>
        <div class="Cart"><a href="Cart.php"><span class="cart">
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
      <h1 id="Offers"class="section-title">Products</h1>
  <div class="Offers"style="grid-template-rows: <?php echo $grid;?>;">
  <?php 
                   foreach($listeprods as $prods)
                    {
                      if($prods['backimg']==""){

                ?>
<div class="container-product">
  <div class="product">
      <img src="<?php echo $prods['img']; ?>" id="<?php echo "frontImg".$prods['id']; ?>" class="frontImg"style="transform: translateZ(50px) rotate(0);">
      <div class="product-inner"id="box">
          <div class="product-front">
              <div class="product-top"style="<?php echo "background: linear-gradient(".$prods['color_front'].");"; ?>">
                  <h1><?php echo $prods['Cover_Name']; ?></h1>
              </div>
              <div class="product-bottom">
                <br>
                <br>
                <br>
                  <h2><?php echo $prods['Name']; ?></h2>
                  <h1><?php echo $prods['Price']; ?> <span>$</span></h1>
                  <form action="product.php?id=<?php echo $prods['id']; ?>&img=<?php echo $prods['img']; ?>&color=<?php echo $prods['color_front']; ?>"method="POST">
                  <div class="customization">
                      <button type="submit" name="add" style="font-family: 'agency fb';">Add to Cart</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<?php 
                    }else{
                    ?>
          <div class="container-product">
      <div class="product">
          <img src="<?php echo $prods['img'];?>" class="frontImg"id="<?php echo "frontImg".$prods['id']; ?>">
          <img src="<?php echo $prods['backimg']; ?>" class="backImg"id="<?php echo "backImg".$prods['id']; ?>">
          <div class="product-inner"id="<?php echo "box".$prods['id']; ?>">
              <div class="product-front">
                  <div class="product-top"style="<?php echo "background: linear-gradient(".$prods['color_front'].");"; ?>">
                      <h1><?php echo $prods['Cover_Name']; ?></h1>
                  </div>
                  <div class="product-bottom">
                      <h2><?php echo $prods['Name']; ?></h2>
                      <h1><?php echo $prods['Price']; ?> <span>$</span></h1>
                      <form action="product.php?id=<?php echo $prods['id']; ?>&img=<?php echo $prods['img']; ?>&color=<?php echo $prods['color_front']; ?>"method="POST">
                      <div class="customization">
                        <button type="submit"name="add"style="font-family: 'agency fb';">Add to Cart</button>
                          <div class="color-select">
                          <div class="select-item">
                              <img id="<?php echo "notclick".$prods['id']; ?>"src="<?php echo $prods['img']; ?>" alt="">
                          </div>
                          <div class="select-item">
                              <img id="<?php echo "rightclick".$prods['id']; ?>"src="<?php echo $prods['backimg']; ?>" alt="">
                          </div>
                      </div>
                      </div>
                      </form>
                  </div>
              </div>
              <div class="product-back">
                  <div class="product-top product-top2"style="<?php echo "background: linear-gradient(".$prods['color_back'].");"; ?>">
                      <h1><?php echo $prods['Cover_Name']; ?></h1>
                  </div>
                  <div class="product-bottom">
                    <h2><?php echo $prods['Name']; ?></h2>
                    <h1><?php echo $prods['Price']; ?> <span>$</span></h1>
                    <form action="product.php?id=<?php echo $prods['id']; ?>&img=<?php echo $prods['backimg']; ?>&color=<?php echo $prods['color_back']; ?>"method="POST">
                      <div class="customization">
                        <button type="submit"name="add"style="font-family: 'agency fb';">Add to Cart</button>
                          <div class="color-select">
                            <div class="select-item">
                                <img id="<?php echo "leftclick".$prods['id']; ?>"src="<?php echo $prods['img']; ?>" alt="">
                            </div>
                            <div class="select-item">
                                <img id="<?php echo "notclick".$prods['id']; ?>"src="<?php echo $prods['backimg']; ?>" alt="">
                            </div>
                        </div>
                      </div>
                      </form>
                  </div>
              </div>
              <div class="product-right">
                  
              </div>
              <div class="product-left">
                  
              </div>
          </div>
      </div>
  </div>
<script>


document.getElementById("<?php echo "leftclick".$prods['id']; ?>").addEventListener("click",()=>{
  var box1=document.getElementById("<?php echo "box".$prods['id']; ?>");
var frontimg1=document.getElementById("<?php echo "frontImg".$prods['id']; ?>");
var backimg1=document.getElementById("<?php echo "backImg".$prods['id']; ?>");
  box1.style.transform="rotateY(0deg)";
    frontimg1.style.left="20px";
    backimg1.style.left="-650px";
    frontimg1.style.transform="rotate(30deg)";
    backimg1.style.transform="rotate(-30deg)";
});
document.getElementById("<?php echo "rightclick".$prods['id']; ?>").addEventListener("click",()=>{
  var box1=document.getElementById("<?php echo "box".$prods['id']; ?>");
var frontimg1=document.getElementById("<?php echo "frontImg".$prods['id']; ?>");
var backimg1=document.getElementById("<?php echo "backImg".$prods['id']; ?>");
  box1.style.transform="rotateY(180deg)";
    frontimg1.style.left="650px";
    backimg1.style.left="20px";
    frontimg1.style.transform="rotate(-30deg)";
    backimg1.style.transform="rotate(30deg)";
});
</script>
<?php
                    }
?>
<?php
                    }
?>
  </div>  
       <div class="poster appear"style="background: url('images/poster.jpg');background-size:cover;">
       </div>
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

const appear = document.querySelector('.appear'); 
const cb = function(entries){
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.classList.add('inview');
    }else{
      entry.target.classList.remove('inview');
    }
  });
}
const io = new IntersectionObserver(cb);
io.observe(appear);



  </script>
</body>
</html>