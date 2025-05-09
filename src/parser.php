<?php
$db = new PDO('pgsql:host=localhost;dbname=framework', 'postgres', '2328');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//

$handle = fopen("../data/data.csv", "r");
while (($row = fgetcsv($handle)) !== FALSE) {
    print_r($row);
    $data = [
        'country' => $row[0],
        'city' => $row[1],
        'is_active' => $row[2],
        'gender' => $row[3],
        'birth_date' => $row[4],
        'salary' => $row[5],
        'has_children' => $row[6],
        'family_status' => $row[7],
        'registration_date' => $row[8]
    ];
    $stmt = $db->prepare('INSERT INTO users (country, city, is_active, gender, birth_date, salary, has_children, family_status, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$data['country'], $data['city'], $data['is_active'], $data['gender'], $data['birth_date'], $data['salary'], $data['has_children'], $data['family_status'], $data['registration_date']]);
}
fclose($handle);