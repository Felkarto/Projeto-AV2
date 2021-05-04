<?php
class Armas
{
    private $id;
    private $sub;
    private $fuzis;
    private $pistolas;
    private $escopetas;
    private $rifles;

    public function __construct($id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM armas WHERE id_armas =  :id";
            $stmt = DB::Conexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->setId($registro['id_armas']);
                $this->setSub($registro['sub']);
                $this->setFuzis($registro['fuzis']);
                $this->setPistolas($registro['pistolas']);
                $this->setEscopetas($registro['escopetas']);
                $this->setRifles($registro['rifles']);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSub($string)
    {
        $this->sub = $string;
    }

    public function setFuzis($fuzis)
    {
        $this->fuzis = $fuzis;
    }

    public function setPistolas($qnt)
    {
        $this->pistolas = $qnt;
    }

    public function setEscopetas($qnt)
    {
        $this->escopetas = $qnt;
    }

    public function setRifles($qnt)
    {
        $this->rifles = $qnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSub()
    {
        return $this->sub;
    }

    public function getFuzis()
    {
        return $this->fuzis;
    }

    public function getPistolas()
    {
        return $this->pistolas;
    }
    public function getEscopetas()
    {
        return $this->escopetas;
    }

    public function getRifles()
    {
        return $this->rifles;
    }

    public static function listar()
    {
        $sql = "SELECT * FROM armas";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($registros) {
            $itens = array();

            foreach ($registros as $registro) {
                $objTemporario = new Armas();
                $objTemporario->setId($registro['id_armas']);
                $objTemporario->setSub($registro['sub']);
                $objTemporario->setFuzis($registro['fuzis']);
                $objTemporario->setPistolas($registro['pistolas']);
                $objTemporario->setEscopetas($registro['escopetas']);
                $objTemporario->setRifles($registro['Rifles']);
                $itens[] = $objTemporario;
            }

            return $itens;

        }
        return false;
    }

    public function adicionar()
    {

        try {
            $sql = "INSERT INTO armas (sub, fuzis, pistolas, escopetas, rifles)
                VALUES (:sub, :fuzis, :pistolas, :escopetas, :rifles)";

            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':sub', $this->sub);
            $stmt->bindParam(':fuzis', $this->fuzis);
            $stmt->bindParam(':pistolas', $this->pistolas);
            $stmt->bindParam(':escopetas', $this->escopetas);
            $stmt->bindParam(':rifles', $this->rifles);
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
                $sql = "UPDATE armas SET
                            sub = :sub,
                            fuzis = :fuzis,
                            pistolas = :pistolas,
                            escopetas = :escopetas,
                            rifles = :rifles
                            WHERE id_armas = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':sub', $this->sub);
                $stmt->bindParam(':fuzis', $this->fuzis);
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':pistolas', $this->pistolas);
                $stmt->bindParam(':escopetas', $this->escopetas);
                $stmt->bindParam(':rifles', $this->rifles);
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
                $sql = "DELETE FROM armas WHERE id_armas = :id";

                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->execute();

            } catch (PDOExcetion $e) {
                echo "ERRO AO EXCLUIR: " . $e->getMessage();
            }
        }
    }
}
