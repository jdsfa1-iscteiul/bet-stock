<?php 

$servername = "localhost";
$username = "dev";
$password = "12345";
$dbname = "songs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://finnhub.io/api/v1/quote?symbol=AAPL&token=br6of7vrh5rdamtpb4c0");
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$json = json_decode($result, true);
$sql = "INSERT INTO stock_registers (stock_id, open, high, low, current, previous_close, created_at, updated_at)
VALUES ((SELECT id from stocks where stock_code='AAPL'), '".$json['o']."' , '".$json['h']."', '".$json['l']."', '".$json['c']."', '".$json['pc']."', NOW(), NOW())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

curl_setopt($ch, CURLOPT_URL, "https://finnhub.io/api/v1/quote?symbol=NFLX&token=br6of7vrh5rdamtpb4c0");
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$json = json_decode($result, true);
$sql = "INSERT INTO stock_registers (stock_id, open, high, low, current, previous_close, created_at, updated_at)
VALUES ((SELECT id from stocks where stock_code='NFLX'), '".$json['o']."' , '".$json['h']."', '".$json['l']."', '".$json['c']."', '".$json['pc']."', NOW(), NOW())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

curl_setopt($ch, CURLOPT_URL, "https://finnhub.io/api/v1/quote?symbol=AMZN&token=br6of7vrh5rdamtpb4c0");
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$json = json_decode($result, true);
$sql = "INSERT INTO stock_registers (stock_id, open, high, low, current, previous_close, created_at, updated_at)
VALUES ((SELECT id from stocks where stock_code='AMZN'), '".$json['o']."' , '".$json['h']."', '".$json['l']."', '".$json['c']."', '".$json['pc']."', NOW(), NOW())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

curl_setopt($ch, CURLOPT_URL, "https://finnhub.io/api/v1/quote?symbol=FORD&token=br6of7vrh5rdamtpb4c0");
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$json = json_decode($result, true);
$sql = "INSERT INTO stock_registers (stock_id, open, high, low, current, previous_close, created_at, updated_at)
VALUES ((SELECT id from stocks where stock_code='FORD'), '".$json['o']."' , '".$json['h']."', '".$json['l']."', '".$json['c']."', '".$json['pc']."', NOW(), NOW())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

curl_setopt($ch, CURLOPT_URL, "https://finnhub.io/api/v1/quote?symbol=NKE&token=br6of7vrh5rdamtpb4c0");
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$json = json_decode($result, true);
$sql = "INSERT INTO stock_registers (stock_id, open, high, low, current, previous_close, created_at, updated_at)
VALUES ((SELECT id from stocks where stock_code='NKE'), '".$json['o']."' , '".$json['h']."', '".$json['l']."', '".$json['c']."', '".$json['pc']."', NOW(), NOW())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

curl_setopt($ch, CURLOPT_URL, "https://finnhub.io/api/v1/quote?symbol=FB&token=br6of7vrh5rdamtpb4c0");
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$json = json_decode($result, true);
$sql = "INSERT INTO stock_registers (stock_id, open, high, low, current, previous_close, created_at, updated_at)
VALUES ((SELECT id from stocks where stock_code='FB'), '".$json['o']."' , '".$json['h']."', '".$json['l']."', '".$json['c']."', '".$json['pc']."', NOW(), NOW())";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>