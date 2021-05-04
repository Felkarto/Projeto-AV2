<?php

class ValSkins
{
    private $id;
    private $sublime;
    private $prismático;
    private $avalanche;
    private $saqueador;
    private $glitch;

    public function __construct($id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM skins WHERE id_skins =  :id";
            $stmt = DB::Conexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->setId($registro['id_skins']);
                $this->setSublime($registro['sublime']);
                $this->setPrismático($registro['prismático']);
                $this->setAvalanche($registro['avalanche']);
                $this->setSaqueador($registro['saqueador']);
                $this->setGlitch($registro['glitch']);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSublime($string)
    {
        $this->Sublime = $string;
    }

    public function setPrismático($prismático)
    {
        $this->prismático = $prismático;
    }

    public function setAvalanche($avalanche)
    {
        $this->avalanche = $avalanche;
    }

    public function setSaqueador($saqueador)
    {
        $this->saqueador = $saqueador;
    }

    public function setGlitch($glitch)
    {
        $this->glitch = $glitch;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSublime()
    {
        return $this->sublime;
    }

    public function getPrismático()
    {
        return $this->prismático;
    }

    public function getAvalanche()
    {
        return $this->avalanche;
    }

    public function getSaqueador()
    {
        return $this->saqueador;
    }

    public function getGlitch()
    {
        return $this->Glitch;
    }

    public static function listar()
    {
        $sql = "SELECT * FROM skins";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FECH_ASSOC);

        if ($registros) {
            $itens = array();

            foreach ($registros as $registro) {
                $objTemporario = new Skins();
                $objTemporario->setId($registro['id']);
                $objTemporario->setSublime($registro['sublime']);
                $objTemporario->setPrismático($registro['prismático']);
                $objTemporario->setAvalanche($registro['avalanche']);
                $objTemporario->setSaqueador($registro['saqueador']);
                $objTemporario->setGlitch($registro['glitch']);
                $itens[] = $objTemporario;
            }

            return $itens;
        }
        return false;
    }

    public function adicionar()
    {
        try {

            $sql = "INSERT INTO skins (sublime, prismático, avalanche, saqueador, glitch )
                VALUES (:sublime, :prismático, :avalanche, :saqueador, :glitch)";

            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':sublime', $this->sublime);
            $stmt->bindParam(':prismático', $this->prismático);
            $stmt->bindParam(':avalanche', $this->avalanche);
            $stmt->bindParam(':saqueador', $this->saqueador);
            $stmt->bindParam(':glitch', $this->glitch);
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
                $sql = "UPDATE skins SET
                            sublime = :sublime,
                            prismático = :prismático,
                            avalanche = :avalanche,
                            saqueador = saqueador,
                            glitch = glitch
                            WHERE id_skins = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':sublime', $this->sublime);
                $stmt->bindParam(':prismático', $this->prismático);
                $stmt->bindParam(':avalanche', $this->avalanche);
                $stmt->bindParam(':saqueador', $this->saqueador);
                $stmt->bindParam(':glitch', $this->glitch);
                $stmt->bindParam(':id', $this->id);
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
                $sql = "DELETE FROM skins WHERE id_skins = :id";

                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->execute();

            } catch (PDOExcetion $e) {
                echo "ERRO AO EXCLUIR: " . $e->getMessage();
            }
        }
    }

}
