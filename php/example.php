<?php 

/**
 * @var email_types             email type array 
 * @var characters              characters array
 * @var email                   email array
 */
$email_types = ['gmail.com', 'hotmail.com', 'outlook.com'];
$characters = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

$email = [];
$users = [];

for($x=0; $x<1000; $x++) {

    // generate random number for word count
    $wordCount = rand(2,4);
    $username = "";
    $email = "";

    for($w=0; $w<$wordCount; $w++) {

        // generate random number for chars count
        $charCount = rand(3,4);
        $char = "";

        for($c=0; $c<$charCount; $c++) {
            $charIndex = rand(0,25);
            $char .= $characters[$charIndex];
        }

        $username .= $char . " ";
        $email .= $char;
    }

    // generate random number for email words
    $emailTypeIndex = rand(0,2);

    // generate random number for status
    $statusIndex = rand(0,1);

    if($statusIndex === 1) {
        $status = true;
    } else {
        $status = false;
    }
    
    $newUser = [
        "username" => $username,
        "email" => $email."@".$email_types[$emailTypeIndex],
        "password" => rand(100000,999999999999),
        "status" => $status
    ];

    array_push($users, $newUser);
}
?>

<?php 
/**
 * Render html template with user lists
 */
?>
<html>
    <head>
        <title> PHP Basic Tutorial </title>
        <style>
            table {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-collapse: collapse;
            }

            table > thead > tr > th {
                background-color: #ddd;
            }

            table > thead > tr > th,
            table > tbody > tr > td {
                text-align: left;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }
            
            tr:hover { 
                background-color: coral;
                cursor: pointer;
            }

            .success {
                background-color: green;
                color: #fff;
            }

            .error {
                background-color: red;
                color: #fff;
            }

            .success, 
            .error {
                width: 150px;
                padding-left: 15px;
                padding-right: 15px;
                padding-bottom: 10px;
                padding-top: 10px;
            }
        </style>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th> # </th>
                    <th> Username </th>
                    <th> Email </th>
                    <th> Password </th>
                    <th> Status </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($users as $key=>$user) { ?>
                    <tr>
                        <td> <?php echo $key + 1; ?> </td>
                        <td> <?php echo $user['username']; ?> </td>
                        <td> <?php echo $user['email']; ?> </td>
                        <td> <?php echo $user['password']; ?> </td>
                        <td> 
                            <?php if($user['status'] == 1) { ?>
                                <span class="success"> Active </span>
                            <?php } else { ?>
                                <span class="error"> Disable </span>
                            <?php } ?> 
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>