<?php
class Agentes
{
    private $id;
    private $sentinelas;
    private $controladores;
    private $duelistas;
    private $iniciadores;
    private $espectadores;

    public function __construct($id = false)
    {
        if ($id) {
            $sql = "SELECT * FROM agentes WHERE id_agentes =  :id";
            $stmt = DB::Conexao()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            foreach ($stmt as $registro) {
                $this->setId($registro['id_agentes']);
                $this->setSentinelas($registro['sentinelas']);
                $this->setControladores($registro['controladores']);
                $this->setDuelistas($registro['duelistas']);
                $this->setIniciadores($registro['iniciadores']);
                $this->setEspectadores($registro['espectadores']);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setSentinelas($string)
    {
        $this->sentinelas = $string;
    }

    public function setControladores($controladores)
    {
        $this->controladores = $controladores;
    }

    public function setDuelistas($qnt)
    {
        $this->duelistas = $qnt;
    }

    public function setIniciadores($qnt)
    {
        $this->iniciadores = $qnt;
    }

    public function setEspectadores($qnt)
    {
        $this->espectadores = $qnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSentinelas()
    {
        return $this->sentinelas;
    }

    public function getControladores()
    {
        return $this->controladores;
    }

    public function getDuelistas()
    {
        return $this->duelistas;
    }
    public function getIniciadores()
    {
        return $this->iniciadores;
    }

    public function getEspectadores()
    {
        return $this->espectadores;
    }

    public static function listar()
    {
        $sql = "SELECT * FROM agentes";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($registros) {
            $itens = array();

            foreach ($registros as $registro) {
                $objTemporario = new Agentes();
                $objTemporario->setId($registro['id_agentes']);
                $objTemporario->setSentinelas($registro['sentinelas']);
                $objTemporario->setControladores($registro['controladores']);
                $objTemporario->setDuelistas($registro['duelistas']);
                $objTemporario->setIniciadores($registro['iniciadores']);
                $objTemporario->setEspectadores($registro['Espectadores']);
                $itens[] = $objTemporario;
            }

            return $itens;

        }
        return false;
    }

    public function adicionar()
    {

        try {
            $sql = "INSERT INTO agentes (sentinelas, controladores, duelistas, iniciadores, espectadores)
                VALUES (:sentinelas, :controladores, :duelistas, :iniciadores, :espectadores)";

            $conexao = DB::conexao();
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':sentinelas', $this->sentinelas);
            $stmt->bindParam(':controladores', $this->controladores);
            $stmt->bindParam(':duelistas', $this->duelistas);
            $stmt->bindParam(':iniciadores', $this->iniciadores);
            $stmt->bindParam(':espectadores', $this->espectadores);
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
                $sql = "UPDATE agentes SET
                            sentinelas = :sentinelas,
                            controladores = :controladores,
                            duelistas = :duelistas,
                            iniciadores = :iniciadores,
                            espectadores = :espectadores
                            WHERE id_agentes = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':sentinelas', $this->sentinelas);
                $stmt->bindParam(':controladores', $this->controladores);
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':duelistas', $this->duelistas);
                $stmt->bindParam(':iniciadores', $this->iniciadores);
                $stmt->bindParam(':espectadores', $this->espectadores);
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
                $sql = "DELETE FROM agentes WHERE id_agentes = :id";

                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id", $this->id);
                $stmt->execute();

            } catch (PDOExcetion $e) {
                echo "ERRO AO EXCLUIR: " . $e->getMessage();
            }
        }
    }
}
