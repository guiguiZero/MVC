<head>
    <meta charset="utf-8">
    <title> ~Projet Meccano Connexion~ </title>
    <link rel="stylesheet" href=<?php ROOT ?>"Views/CSS/Connect.css" type="text/css">
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <script type="text/javascript" src=<?php ROOT ?>"Views/includes/Connect.js"></script>
  </head>
  <body>
    <div class="container" id="container">
    	<div class="form-container sign-up-container">
    		<form action="connexion/setCompte" method="post">
    			<h1>Création Compte</h1>
    			<div class="social-container">
    				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
    				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
    				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
    			</div>
          <input type="text" name="Nom" placeholder="Nom" required>
    			<input type="text" placeholder="Prenom" name="Prenom" />
    			<input type="email" name="Mail" placeholder="G.Sapone@mail.fr" required>
    			<input type="password" placeholder="Password" name="MDP" required />
    			<button>Inscription</button>
    		</form>
    	</div>
    	<div class="form-container sign-in-container">
    		<form action="connexion/setConnect" method="post">
    			<h1>Connexion</h1>
    			<div class="social-container">
    				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
    				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
    				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
    			</div>
    			<input type="email" placeholder="Email" name="identifiant" required/>
    			<input type="password" placeholder="Password" name="pswd" required />
    			<a href="#">Mot de passe oublié ?</a>
    			<button>Connexion</button>
    		</form>
    	</div>
    	<div class="overlay-container">
    		<div class="overlay">
    			<div class="overlay-panel overlay-left">
    				<h1>Après ton inscription</h1>
    				<p>Connecte toi maintenant ! Des nouvelles promos chaques semaine et de nouveaux produits !</p>
    				<button class="ghost" id="signIn">Connexion</button>
    			</div>
    			<div class="overlay-panel overlay-right">
    				<h1>Bienvenue !</h1>
    				<p>Créer ton compte afin d'avoir accès à tout nos produits et promotions en ligne!</p>
    				<button class="ghost" id="signUp">Inscription</button>
    			</div>
    		</div>
    	</div>
    </div>
  </body>
