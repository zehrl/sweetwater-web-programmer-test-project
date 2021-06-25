<?php

// Query Database for Entries with "Expected Ship Date" in comments section
$query = "SELECT orderid, comments 
    FROM sweetwater.sweetwater_test
    WHERE comments like '%Expected Ship Date: __/__/__%' AND
    shipdate_expected IS NULL";

$result = $conn->query($query);

// Extract date from comments section
function extract_date($arr)
{

    $searchStr = "Expected Ship Date: ";

    $startPos = strpos($arr["comments"], $searchStr);
    $extractedDate = substr($arr["comments"], $startPos + strlen($searchStr), 9);
    return $extractedDate;
}

// Update Date Format from "DD/MM/YYYY" to "YYYY-MM-DD HH:MM:SS"
function format_date($date)
{

    $dateAr = str_split($date);

    $day = $dateAr[3] . $dateAr[4];
    $month = $dateAr[0] . $dateAr[1];
    $year = $dateAr[6] . $dateAr[7];

    $formattedDate = "20" . $year . "-" . $month . "-" . $day . " 00:00:00";

    return ($formattedDate);
}

// Update table with shipdate_expected values
function update_shipdate_expected($arr)
{

    global $conn;

    $query = "UPDATE sweetwater.sweetwater_test SET shipdate_expected = '" . $arr["shipdate_expected"] . "' WHERE orderid = '" . $arr["orderid"] . "';";

    // Update shipdate_expected
    if ($conn -> query($query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    echo "query: " . $query . "<br>";
    echo "---------------------------<br>";
}

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $row["shipdate_expected"] = format_date(extract_date($row));

        update_shipdate_expected($row);

        // echo "order: ".$row["orderid"]."<br>comments: ".$row["comments"]."<br>shipdate_expected: ".$row["shipdate_expected"];
        // echo "<br>-------------------------------------------<br>";
    }
} else {
    echo "0 results";
}
