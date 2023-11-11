<?php


require_once('src/model.php');

function commander() {
    global $idUser;
    $menu['page'] = "commande";
    if (isset($_POST["client_nom"], $_POST["client_prenom"], $_POST["client_email"], $_POST["client_telephone"], $_POST["client_adresse"], $_POST["client_complement"], $_POST["client_code_postal"], $_POST["client_ville"], $_POST["client_adresse_livraison"], $_POST["client_complement_livraison"], $_POST["client_code_postal_livraison"], $_POST["client_ville_livraison"])) {
        AjouterCommande();
        viderPanier($idUser);
        header("Location:https://s4-gp95.kevinpecro.info/paiement/");
        exit;
    }
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/commande/v-commander.php');
    require('view/inc/inc.footer.php');
}

function AjouterCommande() {
    global $idUser;
    $valuesbdd = array (
        "id_client" => $idUser,
        "nom" => $_POST["client_nom"],
        "prenom" => $_POST["client_prenom"],
        "email" => $_POST["client_email"],
        "telephone" => $_POST["client_telephone"],
        "adresse" => $_POST["client_adresse"],
        "complement" => $_POST["client_complement"],
        "code_postal" => $_POST["client_code_postal"],
        "ville" => $_POST["client_ville"],
        "nom_livraison" => $_POST["client_nom"],
        "prenom_livraison" => $_POST["client_prenom"],
        "email_livraison" => $_POST["client_email"],
        "telephone_livraison" => $_POST["client_telephone"],
        "adresse_livraison" => $_POST["client_adresse_livraison"],
        "complement_livraison" => $_POST["client_complement_livraison"],
        "code_postal_livraison" => $_POST["client_code_postal_livraison"],
        "ville_livraison" => $_POST["client_ville_livraison"],
        "date_creation" => date("Y-m-d H:i:s"),
        "statut" => 1
    );

    set_insert("commande", $valuesbdd);

    $commande=get_result("SELECT * FROM commande WHERE id_client =$idUser order by id DESC");
    $panier=get_result("select * from panier where id_client=$idUser");
    $nbProduit=get_result("select count(*) as 'count' from panier_produit where id_panier=".$panier['id']);
    if($nbProduit['count'] <= 1){
        $panierProduit = get_result("select * from panier_produit where id_panier =".$panier['id']);
        $produit=get_result("select prix, id_tva from produit where id=".$panierProduit['id_produit']);
        $valuesProduitCommande = array(
            "id_commande" => $commande['id'],
            "id_produit" => $panierProduit['id_produit'],
            "prix_unitaire" => $produit['prix'],
            "id_tva" => $produit['id_tva']
        );
        set_insert("commande_produit", $valuesProduitCommande);
    }else{
        $panierProduit = get_results("select * from panier_produit where id_panier=" .$panier['id']);
        foreach ($panierProduit as $item) :
            $produit = get_result("select prix, id_tva from produit where id=" . $item['id_produit']);
            $valuesProduitCommande = array(
                "id_commande" => $commande['id'],
                "id_produit" => $item['id_produit'],
                "prix_unitaire" => $produit['prix'],
                "id_tva" => $produit['id_tva']
            );
            set_insert("commande_produit", $valuesProduitCommande);
        endforeach;

    }
}

function viderPanier(){
    global $idUser;
    $lepanier = get_result("SELECT * FROM panier WHERE id_client=$idUser");
    $idPanier = $lepanier['id'];
    get_result("DELETE FROM panier_produit WHERE id_panier = $idPanier");
    get_result("DELETE FROM panier WHERE id_client = $idUser");
}