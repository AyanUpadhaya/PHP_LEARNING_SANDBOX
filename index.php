<?php
//encoding php associative array to json
$users =[
    [
        "name"=>"Ayan",
        "email"=>"ayan@gmail.com",
        "age"=>32
    ],
    [
        "name"=>"rahul",
        "email"=>"rahul@gmail.com",
        "age"=>32
    ],
];
$students =[
    [
        "name"=>"Ayan",
        "email"=>"ayan@gmail.com",
        "age"=>32,
        "roll"=>100,
        "class"=>7
    ],
    [
        "name"=>"rahul",
        "email"=>"rahul@gmail.com",
        "age"=>32,
        "roll"=>101,
        "class"=>7
    ],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-4">
        <div>
        <h4>Users</h4>
        <table class="table fs-6 fst-normal">
            <thead>
                <th>Name</th>
                <th>email</th>
                <th>age</th>
            </thead>

            <tbody>
                <?php foreach($users as $user):?>
                    <tr>
                        <td><?=$user["name"]?></td>
                        <td><?=$user["email"]?></td>
                        <td><?=$user["age"]?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>

        </table>
    </div>
    <div>
        <h4>Students</h4>
        <table class="table fs-6 fst-normal">
            <thead>
                <th>Name</th>
                <th>email</th>
                <th>age</th>
                <th>Roll</th>
                <th>class</th>
            </thead>

            <tbody>
                <?php foreach($students as $student):?>
                    <tr>
                        <td><?=$student["name"]?></td>
                        <td><?=$student["email"]?></td>
                        <td><?=$student["age"]?></td>
                        <td><?=$student["roll"]?></td>
                        <td><?=$student["class"]?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>

        </table>
    </div>
    </div>
</body> 
</html>



