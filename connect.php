<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "passionfarm";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Insert data
  $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $fullname, $username, $email, $password);

  if ($stmt->execute()) {
    echo "<script>
      alert('Registration successful!');
      window.location.href = 'login.html';
    </script>";
  } else {
    echo "<script>
      alert('Error: Email may already be used.');
      window.location.href = 'trainings.html';
    </script>";
  }

  $stmt->close();
  $conn->close();
}
?>
<?php
// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "passionfarm";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Insert data
  $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $fullname, $username, $email, $password);

  if ($stmt->execute()) {
    echo "<script>
      alert('Registration successful!');
      window.location.href = 'login.html';
    </script>";
  } else {
    echo "<script>
      alert('Error: Email may already be used.');
      window.location.href = 'trainings.html';
    </script>";
  }

  $stmt->close();
  $conn->close();
}
?>
