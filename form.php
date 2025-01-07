<?php 

//Get POST data
$name= $_POST["full_name"];
$age= $_POST["Age"];
$gender= $_POST["gender"];


//output received values for debugging
echo $name;
echo $age;
echo $gender;

//Get current timestamp
$t = time();
$curr_timestamp = date("Y-m-d H:i:s", $t);  // Corrected time format
echo $curr_timestamp;

//the script needs to be connected to the database.
$host = "localhost";
$dbname = "form_db";
$dbuser = "root";
$dbpass = "";

//Establishing connectin to the database
$conn = mysqli_connect($host,$dbuser,$dbpass,$dbname);

//check connection
if(!$conn) {
    die("Database connection error: " . mysqli_connect_error());

}
echo "Database connection successfull!";

//Insert data into database
$sql = "INSERT INTO htmlform(full_name,age,gender,created_at) VALUES('$name','$age','$gender','$curr_timestamp')";

//execute the query
if (mysqli_query($conn, $sql)) {
    echo "New record added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//close the connection 
$conn->close();
?>