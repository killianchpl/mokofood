<?php

class Plat
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?float $prix = null;
    private ?string $photo = null;
    private ?int $categorie_id = null;
    private ?string $created_at = null;
    private ?int $a_emporter = null;

    // =============================================
    // GETTERS
    // =============================================

    // GETTER > ID

    public function getId(): ?int
    {
        return $this->id;
    }

    // GETTER > NOM

    public function getNom(): ?string
    {
        return $this->nom;
    }

    // GETTER > DESC 

    public function getDescription(): ?string
    {
        return $this->description;
    }

    //GETTER > PRIX

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    // GETTER > PHOTO

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    // GETTER > CAT_ID

    public function getCategorie_Id(): ?int
    {
        return $this->categorie_id;
    }

    // GETTER > CREAT_AT

    public function getCreated_At(): ?string
    {
        return $this->created_at;
    }

    // GETTER > EMPORTER

    public function getA_Emporter(): ?int
    {
        return $this->a_emporter;
    }

     // =============================================
    // SETTERS
    // =============================================


    // SETTER > ID

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // SETTER > NOM 

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    // SETTER > DESC

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    // SETTER > PRIX

    public function setPrix(?float $prix): void
    {
        $this->prix = $prix;
    }

    // SETTER > PHOTO

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    // SETTER > CAT_ID

    public function setCategorie_Id(?int $categorie_id): void
    {
        $this->categorie_id =$categorie_id;
    }

    // SETTER > CREAT_AT

    public function setCreated_At(?string $created_at):void
    {
        $this->created_at = $created_at;
    }

    // SETTER > EMPORTER

    public function setA_Emporter(?int $a_emporter): void
    {
        $this->a_emporter = $a_emporter;
    }

}

?>