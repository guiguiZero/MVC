<head>
    <meta charset="utf-8">
    <title>~Projet Meccano Produit~</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb5/3.10.0/compiled.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB5-Pro-Advanced_3.3.0/plugins/css/all.min.css">
    <link rel="stylesheet" id="roboto-subset.css-css" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5" type="text/css" media="all">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/MVC/Views/CSS/afficheProduct.css" type="text/css">
</head>
  <body>
    <?php
    include(ROOT.'/Views/includes/header.php');
    foreach ($data as $datas):?>
    <section class='Bienvenue'>
      <div class="card">
	     <div class="row no-gutters">
		       <aside class="col-md-6">
             <article class="gallery-wrap">
	              <div class="img-big-wrap">
	                 <a href="#"><img src="<?php echo $datas['imgProduit'] ?>"></a>
	                </div> <!-- img-big-wrap.// -->
                </article> <!-- gallery-wrap .end// -->
		        </aside>
		          <main class="col-md-6 border-left">
                <article class="content-body">

                  <h2 class="title"><?php echo $datas['ProdName'] ?></h2>

                  <div class="mb-3">
	                   <var class="price h4"><?php echo $datas['Price'] ?></var>
	                    <span class="text-muted">/€</span>
                    </div>
                    <p><?php echo $datas['Description'] ?></p>
                    <hr>
	                   <div class="row">
		                     <div class="form-group col-md flex-grow-0">
			                        <label>Quantité</label>
			                           <div class="input-group mb-3 input-spinner">
                                   <form class='setProduct' action='/MVC/AjoutProduit/restock' method='post'>
                                     <input id=idProd name=Prodid type=hidden value="<?php echo $datas['idProduit'] ?>">
			                               <input id=Quantity name=ProdQuantity type=number min=0>
			                           </div>
		                     </div> <!-- col.// -->
	                   </div> <!-- row.// -->
	                                   <input type=submit name=addPanier value=ajouter class="btn btn-outline-primary">
                                   </form>
                </article> <!-- product-info-aside .// -->
		          </main> <!-- col.// -->
	     </div> <!-- row.// -->
      </div>
    </section>
  <?php endforeach; ?>
  </body>
