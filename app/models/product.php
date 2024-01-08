<?php

class Product
{

    private $id;
    private $productName;
    private $description;
    private $editorial;
    private $prize;
    private $releaseYear;
    private $minAge;
    private $minPlayers;
    private $maxPlayers;
    private $ean;
    private $picPath;
    private $stock;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     */
    public function setEditorial($editorial): void
    {
        $this->editorial = $editorial;
    }

    /**
     * @return mixed
     */
    public function getPrize()
    {
        return $this->prize;
    }

    /**
     * @param mixed $prize
     */
    public function setPrize($prize): void
    {
        $this->prize = $prize;
    }

    /**
     * @return mixed
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    /**
     * @param mixed $releaseYear
     */
    public function setReleaseYear($releaseYear): void
    {
        $this->releaseYear = $releaseYear;
    }

    /**
     * @return mixed
     */
    public function getMinAge()
    {
        return $this->minAge;
    }

    /**
     * @param mixed $minAge
     */
    public function setMinAge($minAge): void
    {
        $this->minAge = $minAge;
    }

    /**
     * @return mixed
     */
    public function getMinPlayers()
    {
        return $this->minPlayers;
    }

    /**
     * @param mixed $minPlayers
     */
    public function setMinPlayers($minPlayers): void
    {
        $this->minPlayers = $minPlayers;
    }

    /**
     * @return mixed
     */
    public function getMaxPlayers()
    {
        return $this->maxPlayers;
    }

    /**
     * @param mixed $maxPlayers
     */
    public function setMaxPlayers($maxPlayers): void
    {
        $this->maxPlayers = $maxPlayers;
    }

    /**
     * @return mixed
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param mixed $ean
     */
    public function setEan($ean): void
    {
        $this->ean = $ean;
    }

    /**
     * @return mixed
     */
    public function getPicPath()
    {
        return $this->picPath;
    }

    /**
     * @param mixed $picPath
     */
    public function setPicPath($picPath): void
    {
        $this->picPath = $picPath;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function lastFiveNews()
    {
        $result = false;
        $result = $this->db->query(
            "SELECT *
            FROM EcommerceDB.productos
            ORDER BY AnoPublicacion DESC
            LIMIT 5;"
        );
        if (!$result) {
            echo "DatabaseKO";
            die('Error: ' . mysqli_error($this->db));
        } else {
            if (mysqli_num_rows($result) == 0) {
                //mysqli_close($this->db);
                echo "noProductsFound";
            } else {
                return $result;
            }

        }


    }

    public function childFive()
    {
        $result = false;
        $result = $this->db->query(
            "SELECT *
            FROM EcommerceDB.productos
            ORDER BY EdadMinima ASC
            LIMIT 5;"
        );
        if (!$result) {
            echo "DatabaseKO";
            die('Error: ' . mysqli_error($this->db));
        } else {
            if (mysqli_num_rows($result) == 0) {
                //mysqli_close($this->db);
                echo "noProductsFound";
            } else {
                return $result;
            }

        }


    }

}