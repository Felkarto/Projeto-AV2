<?php
class Personagens
{
    private $id;
    private $jett;
    private $killjoy;
    private $sage;
    private $skye;
    private $breach;

    public function __construct($id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM personagens WHERE id_personagens =  :id";
            $stmt = DB::Conexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->setId($registro['id_personagens']);
                $this->setJett($registro['jett']);
                $this->setKilljoy($registro['killjoy']);
                $this->setSage($registro['sage']);
                $this->setSkye($registro['skye']);
                $this->setBreach($registro['breach']);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setJett($string)
    {
        $this->jett = $string;
    }

    public function setKilljoy($killjoy)
    {
        $this->killjoy = $killjoy;
    }

    public function setSage($qnt)
    {
        $this->sage = $qnt;
    }

    public function setSkye($qnt)
    {
        $this->skye = $qnt;
    }

    public function setBreach($qnt)
    {
        $this->breach = $qnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getJett()
    {
        return $this->jett;
    }

    public function getKilljoy()
    {
        return $this->killjoy;
    }

    public function getSage()
    {
        return $this->sage;
    }
    public function getSkye()
    {
        return $this->skye;
    }

    public function getBreach()
    {
        return $this->breach;
    }

    public static function listar()
    {
        $sql = "SELECT * FROM personagens";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($registros) {
            $itens = array();

            foreach ($registros as $registro) {
                $objTemporario = new Personagens();
                $objTemporario->setId($registro['id_personagens']);
                $objTemporario->setJett($registro['jett']);
                $objTemporario->setKilljoy($registro['killjoy']);
                $objTemporario->setSage($registro['sage']);
                $objTemporario->setSkye($registro['skye']);
                $objTemporario->setBreach($registro['Breach']);
                $itens[] = $objTemporario;
            }

            return $itens;

        }
        return false;
    }

    public function adicionar()
    {

        try {
            $sql = "INSERT INTO personagens (jett, killjoy, sage, skye, breach)
                VALUES (:jett, :killjoy, :sage, :skye, :breach)";

            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':jett', $this->jett);
            $stmt->bindParam(':killjoy', $this->killjoy);
            $stmt->bindParam(':sage', $this->sage);
            $stmt->bindParam(':skye', $this->skye);
            $stmt->bindParam(':breach', $this->breach);
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
                $sql = "UPDATE personagens SET
                            jett = :jett,
                            killjoy = :killjoy,
                            sage = :sage,
                            skye = :skye,
                            breach = :breach
                            WHERE id_personagens = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':jett', $this->jett);
                $stmt->bindParam(':killjoy', $this->killjoy);
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':sage', $this->sage);
                $stmt->bindParam(':skye', $this->skye);
                $stmt->bindParam(':breach', $this->breach);
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
                $sql = "DELETE FROM personagens WHERE id_personagens = :id";

                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->execute();

            } catch (PDOExcetion $e) {
                echo "ERRO AO EXCLUIR: " . $e->getMessage();
            }
        }
    }
}
