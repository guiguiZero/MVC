<head>
    <meta charset="utf-8">
    <title>~Projet Meccano Promotion~</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb5/3.10.0/compiled.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB5-Pro-Advanced_3.3.0/plugins/css/all.min.css">
    <link rel="stylesheet" id="roboto-subset.css-css" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5" type="text/css" media="all">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/MVC/Views/CSS/ListProduct.css" type="text/css">
  </head>
  <body>
    <?php include(ROOT.'/Views/includes/header.php'); ?>
    <section class="bienvenue">
     <section class="section-content padding-y bg">
         <div class="container">
             <!-- ============================ COMPONENTS 1  ================================= -->
             <div class="row">
               <h3>Ajouter Promotion : </h3>
               <?php
                foreach($datas as $data):?>
                <aside class="col-md-9">
                      <article class="card-body border-bottom">
                        <div class="row">
                          <div class="col-md-7">
                            <figure class="itemside">
                            <div class="aside"><img src=<?php echo $data['imgProduit'] ?> class="border img-sm"></div>
                            <figcaption class="info">
                              <strong class="">Prix Unitaire : <?php echo $data['Price'] ?> €</strong>
                              <form action="/MVC/research/makeResearch" method="post">
                                <input type="hidden" name="research" value=<?php echo $data['ProdName']?>>
                                <input type="submit" class="btn btn-primary btn-block" name=<?php echo $data['ProdName']?> value=<?php echo $data['ProdName']?>>
                              </form>
                              <hr>
                              <form action="/MVC/SetPromotion/ajouter" method="post">
                                <input type="hidden" name="idProduit" value=<?php echo $data['idProduit']?>>
                                <div class="col-md-5 text-md-right text-right">
                                  <div class="input-group input-spinner">
                                          <input id=Quantity class="form-control" name=ProdProm type=number min=0>
                                  </div> <!-- input-group.// -->
                                </div>
                                <div>
                                  <input type="submit" class="btn btn-outline-danger btn-block" value="Ajouter Promotion">
                                </div>
                              </form>
                            </figcaption>
                          </figure>
                        </div> <!-- col.// -->
                      </div> <!-- row.// -->
                    </article> <!-- card-group.// -->
                  </aside> <!-- col.// -->

            <?php endforeach;
            if(!empty($p)){ ?>
            <h3>Retirer Promotion : </h3>
            <?php foreach ($p as $promo):?>
            <aside class="col-md-9">
                  <article class="card-body border-bottom">
                    <div class="row">
                      <div class="col-md-7">
                        <figure class="itemside">
                        <div class="aside"><img src=<?php echo $promo['imgProduit'] ?> class="border img-sm"></div>
                        <figcaption class="info">
                          <strong class="">Prix Unitaire : <?php echo $promo['Price'] ?> €</strong><hr>
                          <strong class="">Promotion : <?php echo $promo['Reduction'] ?> %</strong>
                          <form action="/MVC/research/makeResearch" method="post">
                            <input type="hidden" name="research" value=<?php echo $promo['ProdName']?>>
                            <input type="submit" class="btn btn-primary btn-block" name=<?php echo $promo['ProdName']?> value=<?php echo $promo['ProdName']?>>
                          </form>
                          <hr>
                          <form action="/MVC/SetPromotion/delete" method="post">
                            <input type="hidden" name="idProduit" value=<?php echo $promo['idProduit']?>>
                            <div>
                              <input type="submit" class="btn btn-outline-danger btn-block" value="Supprimer">
                            </div>
                          </form>
                        </figcaption>
                      </figure>
                    </div> <!-- col.// -->
                  </div> <!-- row.// -->
                </article> <!-- card-group.// -->
              </aside> <!-- col.// -->
            <?php endforeach;
          }?>
          </div>
    </div>
</section>
</section>

</body>
