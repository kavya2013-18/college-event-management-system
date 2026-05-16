<?php
// 1. Database Connection (Ungal details-ai inge maatravum)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_event_db";
$port = 3306;

$conn = new mysqli("localhost","root","","college_event_db",3306);

// Connection Check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Events-ai Fetch seidhal
$sql ="SELECT * FROM events";
$result = $conn->query($sql);
?>

ccc    }
}
?>

<!DOCTYPE html>
<html lang="ta">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding-top: 50px; }
        .event-card { transition: transform 0.2s; border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .event-card:hover { transform: scale(1.02); }
        .event-date { color: #007bff; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-5">Vandhu Kondirukkum Nigazhchigal (Upcoming Events)</h2>

    <div class="row">
        <?php
        if ($result && mysqli_num_rows($result) >0){
            // Ovvoru row-aiyum loop seiyavum
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card event-card h-100">
                        <div class="card-body">
                            <span class="event-date"><?php echo date('M d, Y', strtotime($row["event_date"])); ?></span>
                            <h5 class="card-title mt-2"><?php echo $row["title"]; ?></h5>
                            <p class="card-text text-muted"><?php echo substr($row["description"], 0, 100) . '...'; ?></p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <small class="text-muted">📍 <?php echo $row["location"]; ?></small>
                            <br>
                            <a href="event_details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm mt-3">View Details</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Tharpodhu nigazhchigal edhum illai.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>