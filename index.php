<!DOCTYPE html>
<html>
<head>
    <title>Mailgun E-mail Test</title>
</head>
<body>
    <form action="send.php" method="POST">
        <input type="text" name="name" placeholder="Name"></input>
        <input type="email" name="email" placeholder="E-mail"></input>
        <input type="text" name="subject" placeholder="Subject"></input>
        <textarea name="message" placeholder="Message"></textarea>
        <button type="submit">Send</button>
    </form>
</body>
</html>