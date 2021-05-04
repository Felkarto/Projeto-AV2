<?php
class Usuario
{
    protected $id;
    protected $nome;
    protected $usuario;
    protected $email;
    protected $senha;

    public static function logar($usuario, $senha)
    {
        if ($usuario && $senha) {
            $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            foreach ($stmt as $obj) {
                $_SESSION['login'] = $obj['usuario'];
                $_SESSION['id'] = $obj['id_usuario'];
            }

        }

    }

}
