<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Sweetwater Customer Orders Report</h1>
    <hr>

    <h2>Candy Query</h2>
    <p>Shows customer orders that mention "candy" in the comments field.</p>
    <table>
        <tr>
            <th>orderid</th>
            <th>comments</th>
        </tr>
        <tr>
            <!-- Insert Tables from queries -->
            
            <!-- Candy Query -->
            <?php
            $query = "SELECT * FROM sweetwater.sweetwater_test WHERE comments like '%candy%';";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["orderid"] . "</td><td>" . $row["comments"] . "<td><tr>";
                }
            } else {
                echo "0 results";
            }

            // mysqli_close($conn);
            ?>
            
        </tr>

    </table>

    <h2>Call Me Query</h2>
    <p>Shows customer orders that mention "call me."</p>
    <table>
        <tr>
            <th>orderid</th>
            <th>comments</th>
        </tr>
        <tr>
            <!-- Insert Tables from queries -->
            
            <!-- Call Me Query -->
            <?php
            $query = "SELECT * FROM sweetwater.sweetwater_test WHERE comments like '%call me%';";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["orderid"] . "</td><td>" . $row["comments"] . "<td><tr>";
                }
            } else {
                echo "0 results";
            }

            // mysqli_close($conn);
            ?>
            
        </tr>

    </table>

</body>

</html>