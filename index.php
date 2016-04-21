<!DOCTYPE html>
<html>
<head>
    <title>Mailgun E-mail Test</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <style type="text/css">
        body {
            padding: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .ca-loading {
            display: none;
        }
    </style>
</head>
<body>

    <form class="form" id="mailgun" role="form" method="POST">
      <input type="name" class="form-control" id="name" name="name" placeholder="Name" required>

      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>

      <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>

      <textarea id="message" class="form-control" name="message" rows="6" placeholder="Message" required></textarea>

      <button type="submit" class="btn">Send</button>
    </form>

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>