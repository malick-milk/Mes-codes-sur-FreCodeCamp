<?php
class Livre{
    private $titre;
    private $auteur;
    private $anneePublication;
    private bool $estEmprunte;
    public function __construct($titre,$auteur,$anneePublication,$estEmprunte){
        $this->titre=$titre;
        $this->auteur=$auteur;
        $this->anneePublication=$anneePublication;
        $this->estEmprunte=$estEmprunte;
    }
    public function getAuteur(){
        return $this->auteur;
    }
    public function emprunter(){
        if($this->estEmprunte==false){
            $this->estEmprunte=true;
            echo "Le livre ".$this->titre." a été emprunté avec succès.";
        }
    }
    public function retourner(){
        if($this->estEmprunte==true){
            $this->estEmprunte=false;
            echo "Le livre ".$this->titre." a été retourné avec succès.";
        }
    }
    public function __toString(){
        return "Titre : ".$this->titre. ", Auteur : ".$this->auteur.", Annee de publication du livre : ".$this->anneePublication. ", eEst ce que le livre a ete emprunte : ".$this->estEmprunte;
    }
}
class Membre{
    private $nom;
    private $numeroMembre;
    private $livreEmprunte=[];
    //Definition d'un constructeur avec la generation automatique d'un numero unique
    public function __construct($nom,$numeroMembre,$livresEmpruntes=[]){
        $this->nom=$nom;
        $this->numeroMembre=$numeroMembre;
        $this->livreEmprunte=$livresEmpruntes;
        $this->numeroMembre=uniqid();
    }
    public function emprunterLivre(Livre $livre){
        if($livre->emprunter()){
            $this->livreEmprunte[]=$livre;
        }
    }
    public function retournerLivre(Livre $livre){
        foreach($this->livreEmprunte as $key=>$value){
            if($value==$livre){
                unset($this->livreEmprunte[$key]);
                $livre->retourner();
            }
        }
    }
    public function afficherLivresEmpruntes(){
        foreach($this->livreEmprunte as $livre){
            echo $livre;
        }
    }
}
class Bibliotheque{
    private static int $totalLivres=0;
    private $nom;
    private $livresDisponibles=[];
    public function ajouterLivre(Livre $livre){
        $this->nom=$nom;
        $this->livreDisponible=$livresDisponibles;
        self::$totalLivres++;
        $this->livreDisponibles[]=$livre;
    }
    public function RechercherLivreParAuteur($auteur){
        foreach($this->livreDisponibles as $livre){
            if($livre->getAuteur()==$auteur){
                echo $livre;
            }
            else{
                echo "Aucun livre troouve pour cet auteur.";
            }
        }
    }
}