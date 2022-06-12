<head>
    <meta charset="utf-8">
    <title> ~Projet Meccano~ </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb5/3.10.0/compiled.min.css">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB5-Pro-Advanced_3.3.0/plugins/css/all.min.css">
    <link rel="stylesheet" id="roboto-subset.css-css"
        href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5"
        type="text/css" media="all">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href=<?php ROOT ?>"Views/CSS/test.css" type="text/css">

</head>

<body>
    <?php include("includes/header.php");?>
    <section class="bienvenue">
        <div class="d-flex p-1 mb-2">
            <div class="flex-fill m-1 p-1 bg-light">
              <form action="research/makeResearch" method="post">
                <input name="research" placeholder="Rechecher un article"></input>
              </form>
                <ul>
                    <li>
                        <h3>Meilleures Ventes</h3>
                    </li>
                    <li class="marge">test1</li>
                    <li class="marge">test1</li>
                    <li class="marge">test1</li>
                </ul>
                <ul>
                    <li>
                        <h3>Promotions</h3>
                    </li>
                    <li class="marge">test1</li>
                    <li class="marge">test1</li>
                    <li class="marge">test1</li>
                </ul>
                <ul>
                    <li>
                        <h3>Recommandé</h3>
                    </li>
                    <li class="marge">test1</li>
                    <li class="marge">test1</li>
                    <li class="marge">test1</li>
                </ul>
            </div>
            <div class="flex-fill m-1 p-1 bg-light">

                <section class="section-content padding-y bg">
                    <div class="container">
                        <br>
                        <h2>Mise en avant</h2>
                        <!-- ============================ COMPONENTS 1  ================================= -->
                        <div class="row">
                          <?php
                          $idUser = "";
                          if(isConnected()){
                            $idUser = $_SESSION['idUser'];
                          }foreach ($rand as $r):?>
                            <div class="col-md-5">
                                <figure class="card card-product-grid">
                                    <a href="#" class="img-wrap">
                                        <img src=<?php echo $r['imgProduit'] ?>>
                                    </a>
                                    <figcaption class="info-wrap">
                                        <a href="#" class="title"><?php echo $r['ProdName'] ?></a>
                                        <div class="mt-2">
                                            <var class="price"><?php echo $r['Price'] ?>€</var>
                                            <form action="/MVC/panier/setPanier" method="post">
                                              <input id=idUser name=Userid type=hidden value="<?php echo $idUser ?>">
                                              <input id=idProd name=Prodid type=hidden value="<?php echo $r['idProduit'] ?>">
                                              <input type="hidden" name="ProdQuantity" value="1">
                                              <input type="hidden" name="ProdPrice" value="<?php echo $r['Price']?>">
                                              <button type="submit" href="#" class="btn btn-sm btn-outline-primary float-right">Ajouter au panier
                                                <i class="fa fa-shopping-cart"></i></a>
                                            </form>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                          <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <!-- Deuxième Section avec ma mise en avant -->

                <section class="section-content padding-y bg">
                    <div class="container">
                        <br>
                        <h2>Promotions</h2>

                        <!-- ============================ COMPONENTS 2  ================================= -->
                        <div class="row">
                          <?php
                          if(isConnected()){
                            $idUser = $_SESSION['idUser'];
                          }
                          foreach ($data as $promo): ?>
                            <div class="col-md-5">
                                <figure class="card card-product-grid">
                                    <a href="#" class="img-wrap">
                                        <img src=<?php echo $promo['imgProduit'] ?>>
                                    </a>
                                    <figcaption class="info-wrap">
                                        <a href="#" class="title"><?php echo $promo['ProdName'] ?></a>
                                        <div class="mt-2">
                                            <var class="price"><?php echo $promo['Price'] ?>€</var>
                                            <form action="/MVC/panier/setPanier" method="post">
                                              <input id=idUser name=Userid type=hidden value="<?php echo $idUser ?>">
                                              <input id=idProd name=Prodid type=hidden value="<?php echo $promo['idProduit'] ?>">
                                              <input type="hidden" name="ProdQuantity" value="1">
                                              <input type="hidden" name="ProdPrice" value="<?php echo $promo['Price']?>">
                                              <button type="submit" href="#" class="btn btn-sm btn-outline-primary float-right">Ajouter au panier
                                                <i class="fa fa-shopping-cart"></i></a>
                                            </form>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <!-- ============================ COMPONENTS 2  END .// ================================= -->
                    </div>
                </section>
    </section>
    </div>
    </div>
</body>
