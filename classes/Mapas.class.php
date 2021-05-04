<?php
class Mapas
{
    private $id;
    private $haven;
    private $bind;
    private $icebox;
    private $ascent;
    private $split;

    public function __construct($id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM mapas WHERE id_mapas =  :id";
            $stmt = DB::Conexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->setId($registro['id_mapas']);
                $this->setHaven($registro['haven']);
                $this->setBind($registro['bind']);
                $this->setIcebox($registro['icebox']);
                $this->setAscent($registro['ascent']);
                $this->setSplit($registro['split']);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setHaven($string)
    {
        $this->haven = $string;
    }

    public function setBind($bind)
    {
        $this->bind = $bind;
    }

    public function setIcebox($qnt)
    {
        $this->icebox = $qnt;
    }

    public function setAscent($qnt)
    {
        $this->ascent = $qnt;
    }

    public function setSplit($qnt)
    {
        $this->split = $qnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getHaven()
    {
        return $this->haven;
    }

    public function getBind()
    {
        return $this->bind;
    }

    public function getIcebox()
    {
        return $this->icebox;
    }
    public function getAscent()
    {
        return $this->ascent;
    }

    public function getSplit()
    {
        return $this->split;
    }

    public static function listar()
    {
        $sql = "SELECT * FROM mapas";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($registros) {
            $itens = array();

            foreach ($registros as $registro) {
                $objTemporario = new Mapas();
                $objTemporario->setId($registro['id_mapas']);
                $objTemporario->setHaven($registro['haven']);
                $objTemporario->setBind($registro['bind']);
                $objTemporario->setIcebox($registro['icebox']);
                $objTemporario->setAscent($registro['ascent']);
                $objTemporario->setSplit($registro['Split']);
                $itens[] = $objTemporario;
            }

            return $itens;

        }
        return false;
    }

    public function adicionar()
    {

        try {
            $sql = "INSERT INTO mapas (haven, bind, icebox, ascent, split)
                VALUES (:haven, :bind, :icebox, :ascent, :split)";

            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':haven', $this->haven);
            $stmt->bindParam(':bind', $this->bind);
            $stmt->bindParam(':icebox', $this->icebox);
            $stmt->bindParam(':ascent', $this->ascent);
            $stmt->bindParam(':split', $this->split);
            $stmt->execute();

            return $conexao->lastInsertId();

        } catch (PDOException $e) {
            echo "ERRO AO ADICIONAR: " . $e->getMessage();
        }

    }

    public function atualizar()
    {
        if ($this->id) {
            try {
                $sql = "UPDATE mapas SET
                            haven = :haven,
                            bind = :bind,
                            icebox = :icebox,
                            ascent = :ascent,
                            split = :split
                            WHERE id_mapas = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':haven', $this->haven);
                $stmt->bindParam(':bind', $this->bind);
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':icebox', $this->icebox);
                $stmt->bindParam(':ascent', $this->ascent);
                $stmt->bindParam(':split', $this->split);
                $stmt->execute();

            } catch (PDOExcetion $e) {
                echo "ERRO AO ATUALIZAR: " . $e->getMessage();
            }
        }
    }

    public function excluir()
    {
        if ($this->id) {
            try {
                $sql = "DELETE FROM mapas WHERE id_mapas = :id";

                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->execute();

            } catch (PDOExcetion $e) {
                echo "ERRO AO EXCLUIR: " . $e->getMessage();
            }
        }
    }
}
