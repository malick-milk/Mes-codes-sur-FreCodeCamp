<?php
class Produit {
    private $id;
    private $nom;
    private $prix;
    private $stock;
    public function __construct($id,$nom,$prix,$stock){
        $this->id=$id;
        $this->nom=$nom;
        $this->prix=$prix;
        if($this->prix < 0){
            echo "Le prix ne peut etre nul";
        }
        else{
            $this->prix=$prix;
        }
        $this->stock=$stock;
        if($this->stock<=0){
            echo "Stock insuffisant";
        }else{
            $this->stock=$stock;
        }
        }
        public function getId(){
            return $this->id;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getPrix(){
            return $this->prix;
        }
        public function getStock(){
            return $this->stock;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function setNom($nom){
            $this->nom=$nom;
        }
        public function setPrix($prix){
            $this->prix=$prix;
        }
        public function setStock($stock){
            $this->stock=$stock;
        }
        public function reduireStock($quantite){
            if($quantite < $this->stock){
                $newStock = $this->stock - $quantite;
                echo "Nouvel stock = ". $newStock;
                $this->stock=$newStock;
            }
            else{
                echo "Stock insuffisant <br>";
            }
        }
        public function afficherProduit(){
            echo "ID: ".$this->id. "<br>Nom: ".$this->nom."<br>Prix: ".$this->prix."<br>Stock disponible: ".$this->stock;
        }
    }
    class itemPanier{
        private $produit;
        private $quantite;
        public function __construct(Produit $produit, $quantite){
            $this->produit = $produit;
            $this->quantite = $quantite;
        }
        public function getPrixTotal(){
            return $this->produit->getPrix() * $this->quantite;
        }
        public function __toString(){
            return "Nom du produit: ".$this->produit->getNom()."<br> ".$this->getPrixTotal();
        }
    }
    class Panier{
        private $items=[];
        public function ajouterProduit(Produit $produit, $quantite){
            $this->items[] = new itemPanier($produit, $quantite);
        }
        public function retirerProduit($idProduit){
            foreach($this->items as $key=>$item){
                if($item->getId()==$idProduit){
                    unset($this->items[$key]);
                    break;
                }
            }
        }
        public function afficherPanier(){
            foreach($this->items as $item){
                echo $item;
            }
        }
        public function getTotal(){
            $total = 0;
            foreach ($this->items as $item){
                $total=$total+$item->getPrixTotal();
            }
            return $total;
        }
        public function viderPanier(){
            $this->items=[];
        }
    }
