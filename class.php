<?php

session_start();

class Connection
{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "ticket";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
}

class Register extends Connection
{
    public function registration($f_name, $l_name, $email, $password)
    {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM developpeur WHERE email = '$email' OR password='$password'");
        if (mysqli_num_rows($duplicate) > 0) {
            return 0; // يمكنك تعيين رمز للفشل
        } else {
            $result = mysqli_query($this->conn, "INSERT INTO developpeur (First_name, Last_name, email, password) VALUES ('$f_name', '$l_name', '$email', '$password')");
            if ($result) {
                return 1; // نجاح التسجيل
            } else {
                return -1; // فشل التسجيل
            }
        }
    }

}


class Conn extends Connection
{
    public function selectData($table, $columns = "*", $condition = "")
    {
        $query = "SELECT $columns FROM $table";

        if (!empty($condition)) {
            $query .= " WHERE $condition";
        }

        $result = $this->conn->query($query);

        if ($result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return false;
        }
    }
    

}
class Ticket extends Connection
{
    public function insertFormData($titre, $probleme, $status, $description, $developers, $priorite)
    {
        // Connexion à la base de données
        $conn = $this->conn;
    
        // Formatage des développeurs en une chaîne séparée par des virgules
        $developersString = implode(', ', $developers);
    
        // Préparation de la requête
        $stmt = $conn->prepare("INSERT INTO tickets (titre, probleme, status, description, developpeur, priorite) VALUES (?, ?, ?, ?, ?, ?)");
    
        // Vérification de la préparation de la requête
        if (!$stmt) {
            die("Erreur de préparation de la requête : " . $conn->error);
        }
    
        // Liaison des paramètres
        $stmt->bind_param("sssssi", $titre, $probleme, $status, $description, $developersString, $priorite);
    
        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Données insérées avec succès.";
        } else {
            echo "Erreur lors de l'insertion des données : " . $stmt->error;
        }
    
        // Fermeture de la requête
        $stmt->close();
        header("Location: index.php");
        exit; 
    }
}
        
        
        ?>