<?php 

$url="https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$response =file_get_contents($url);


$data= json_decode($response,true);


if(!$data|| !isset($data["results"])){
    die ('There error fetching the data from the api');
}
$result=$data["results"];
print_r($results)
?>
<html >
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Semester</th>
                    <th>Programs</th>
                    <th>Nationality</th>
                    <th>Colleges</th>
                    <th>No. of students</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $students){
                    ?>
                   <tr>
                       <td><?php echo $students["year"]; ?></td>
                       <td><?php echo $students["Semester"]; ?></td>
                       <td><?php echo $students["Programs"]; ?></td>
                       <td><?php echo $students["Nationality"]; ?></td>
                       <td><?php echo $students["Colleges"]; ?></td>
                       <td><?php echo $students["No. of students"]; ?></td>
                    </tr> <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
