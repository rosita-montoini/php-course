<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Contact form</title>
</head>
<body>
    <?php require "blocks/header.php" ?>
    <?php
    $emailErr = $messageErr = $emailRecipient = "";
    $email = $message = $emailRecipientErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = 'Email is required';
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["emailRecipient"])) {
            $emailRecipientErr = 'Email is required';
        } else {
            $emailRecipient = test_input($_POST["emailRecipient"]);
            if (!filter_var($emailRecipient, FILTER_VALIDATE_EMAIL)) {
                $emailRecipientErr = "Invalid email format";
            }
        }

        if (empty($_POST["message"])) {
            $messageErr = "Message is required";
        } else {
            $message = test_input($_POST["message"]);
            if (strlen($message) < 10) {
                $messageErr = "Message must be more than 10 characters";
            }
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //заголовок сообщения
    $subject = "=?utf-8?B?".base64_encode("Test message")."?=";
    $headers = "From: $email\r\nReply-to: $emailRecipient\r\nContent-type: text/html;charset=utf-8\r\n";

    mail($emailRecipient, $subject, $message, $headers);
    ?>
    <div class="container mt-5">
        <h3>Contact form</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="email" name="email" placeholder="Enter your email" class="form-control">
            <span class="error"><?php echo $emailErr;?></span>
            <br>
            <textarea name="message" class="form-control" placeholder="Enter your message"></textarea>
            <span class="error"><?php echo $messageErr;?></span>
            <br>
            <input type="email" name="emailRecipient" placeholder="Enter email of the recipient" class="form-control">
            <span class="error"><?php echo $emailRecipientErr;?></span>
            <br>
            <button type="submit" name="send" class="btn btn-success mb-3">Send</button>
        </form>
    </div>
    <?php require "blocks/footer.php" ?>
</body>
</html>