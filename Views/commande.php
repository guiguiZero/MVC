<head>
  <link rel="stylesheet" href="/MVC/Views/CSS/payementForm.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
   <form action="/MVC/commande/valider" method="post">
    <div class="container p-0">
      <div class="card px-4">
        <p class="h8 py-3">Information pour le payement</p>
        <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Titulaire</p> <input class="form-control mb-3" type="text" placeholder="Name" required>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Numero de carte</p> <input class="form-control mb-3" type="text" placeholder="1234 5678 435678" name="cbCode" required>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expire : </p> <input class="form-control mb-3" type="text" placeholder="MM/YYYY" required>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> <input class="form-control mb-3 pt-2 " type="password" placeholder="***" name="crypto" required>
                </div>
            </div>
            <div class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="save" id="flexCheckChecked" name="saving">
                  <label class="form-check-label" for="flexCheckChecked">Sauvegarder vos Informations</label>
              </div>

            </div>
            <div class="col-12">
                <button type="submit" name="button" class="btn btn-primary mb-3"><span class="ps-3">Payer <?php echo $price ?> €</span> <span class="fas fa-arrow-right"></span></button>
            </div>
        </div>
      </div>
    </div>
  </form>
</body>
