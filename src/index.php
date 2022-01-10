<?php
$servername = "dbserver";
$username = "root";
$password = "root";
$dbname = "test_db1";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully <br>";
} catch (PDOException $e) {
    $conn = null;
    echo "Connection failed > : " . $e->getMessage();
}
?>

<br>

<?php
if ($conn != null) {

    try {
        $stmt = $conn->query("SELECT * FROM account")->fetchAll();

        foreach ($stmt  as $row) {
            echo $row['name'] . "<br />\n";
        }
    } catch (\PDOException $e) {
        echo "stmt failed > : " . $e->getMessage();
    }
}
?>