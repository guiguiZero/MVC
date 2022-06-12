<head>
    <meta charset="utf-8">
    <title>~Projet Meccano Ajout d'un produit~</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb5/3.10.0/compiled.min.css">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB5-Pro-Advanced_3.3.0/plugins/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/MVC/Views/CSS/Addproduct.css" type="text/css">
  </head>
  <body>
        <?php include("includes/header.php");?>
        <section class="Top">
          <form id="center" action="/MVC/AjoutProduit/addProduct" method="post" enctype="multipart/form-data">
            <legend>PRODUCTS</legend>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"> Nom du produit </label>
              <div class="col-sm-10">
                <input type="text" name="productName" placeholder="equerre" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="product_id"> Prix du produit </label>
              <div class="col-sm-10">
              <input type="number" name="productPrice" placeholder="15" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"> Catégorie du Produit </label>
            <div class="col-sm-10">
              <select class="selectpicker" data-live-search="true" name="prodCat" placeholder="Liste des Catégories">
                <?php foreach ($data as $categorie): ?>
                    <option value=<?php echo $categorie['idCategorie'] ?>><?php echo $categorie['nomCategorie'] ?></option>
                <?php endforeach;  ?>
              </select>

            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="product_quantiter"> Quantité </label>
            <div class="col-sm-10">
            <input type="number" name="productQuantiter" required>
          </div>
        </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="product_id"> Description du produit </label>
            <div class="col-sm-10">
              <textarea name="productDesc" placeholder="Equerre de Meccano" required></textarea>
            </div>
          </div>
          <legend> Image Produit </legend>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type='file' name="img"/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" name="add" value="Ajouter">
            </div>
          </div>
          </form>

        </section>

    </body>
