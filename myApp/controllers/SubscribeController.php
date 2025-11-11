<?php
require_once(__DIR__ . '/../models/DBModel.php');


class SubscribeController extends DBModel
{
    public function __construct() {
        $this->handleSubscription();
    }

    public function handleSubscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $email = trim($_POST['email']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email invalid!";
                return;
            }

            $conn = $this->db();
            $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
            $stmt->bind_param("s", $email);

            if ($stmt->execute()) {
                echo "<script>alert('Te-ai abonat cu succes!'); window.location.href='home';</script>";
            } else {
                echo "<script>alert('A apărut o eroare. Încearcă din nou.');</script>";
            }

            $stmt->close();
            $conn->close();
        }
    }
}
