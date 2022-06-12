<head>
    <meta charset="utf-8">
    <title>~Projet Meccano Produit~</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/MVC/Views/CSS/panier.css" type="text/css">
</head>
<body>
  <section style="padding-top:7%;">
        <div class="card">
          <div class="row no-gutters">
<?php
  include(ROOT.'/Views/includes/header.php');
  $idUser = $_SESSION['idUser'];
  if(isset($produits)){
    foreach($produits as $res):?>
  <aside class="col-md-9">
        <article class="card-body border-bottom">
          <div class="row">
            <div class="col-md-7">
              <figure class="itemside">
              <div class="aside"><img src=<?php echo $res['imgProduit'] ?> class="border img-sm"></div>
              <figcaption class="info">
                <strong class="">Prix Unitaire : <?php echo $res['Price'] ?> €</strong>
                <form action="/MVC/research/makeResearch" method="post">
                  <input type="hidden" name="research" value=<?php echo $res['ProdName']?>>
                  <input type="submit" class="btn btn-primary btn-block" name=<?php echo $res['ProdName']?> value=<?php echo $res['ProdName']?>>
                </form>
                <hr>
                <form action="/MVC/panier/delete" method="post">
                  <input type="hidden" name="idPanier" value=<?php echo $res['idPanier'] ?>>
                  <input type="hidden" name="idProduit" value=<?php echo $res['idProduit']?>>
                  <input type="hidden" name="idUSER" value=<?php echo $idUser ?>>
                  <div>
                    <input type="submit" class="btn btn-outline-danger btn-block" value="Supprimer">
                  </div>
                </form>
              </figcaption>
            </figure>
          </div> <!-- col.// -->
          <div class="col-md-5 text-md-right text-right">
            <div class="input-group input-spinner">
                    <input id=Quantity class="form-control" name=ProdQuantity type=number min=0>
            </div> <!-- input-group.// -->
          </div>
        </div> <!-- row.// -->
      </article> <!-- card-group.// -->
    </aside> <!-- col.// -->
  <?php
endforeach;?>
<aside class="col-md-3 border-left">
  <div class="card-body">
<?php
  foreach ($recapitu as $res):
 ?>
    <dl class="dlist-align">
      <dt><?php echo $res['ProdName'] ?></dt>
      <dt>Quantité(s) : <?php echo $res['Quantite'] ?></dt>
      <dd class="text-right"> <?php echo $res['Prix'] ?> €</dd>
    </dl>
<?php endforeach; ?>
<dl class="dlist-align">
         <dt>Total:</dt>
         <dd class="text-right text-dark b"><strong><?php echo $price ?> €</strong></dd>
       </dl>
        <hr>
        <a href="/MVC/commande/setCommande" class="btn btn-primary btn-block"> Passer la commande </a>
        <a href="/MVC/" class="btn btn-light btn-block">Retourner à l'accueil</a>
      </div> <!-- card-body.// -->
    </aside>
</div> <!-- row.// -->
        </div>
        <?php
      }
      else{
        ?>
          <h3>Votre panier semble Vide</h3>
        <?php
      }
         ?>
    </section>
</body>
