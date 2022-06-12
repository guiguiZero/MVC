<head>
    <meta charset="utf-8">
    <title>~Projet Meccano Produit~</title>
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
    <?php
    foreach ($datas as $data):?>
      <div class="col-md-2">
                   <figure class="card card-product-grid">
                       <a href=<?php echo $data['imgTutorial'] ?> download class="img-wrap">
                           <img src=<?php echo $data['imgTutorial'] ?>>
                       </a>
                   </figure>
               </div>
    <?php endforeach; ?>
             </div>
       </div>
   </section>
  </section>

  </body>
