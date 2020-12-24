<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Whatsapp Msg </title>
</head>
<body>
    <form action="{{url('listenToReplies')}}" method="post">
    @csrf
       <input type="text" name="Body" id="Body" placeholder="Body"/>
       <input type="text" name="From" id="From" placeholder="From"/>
       <button type="submit">Send Message </button>
    </form>
</body>
</html>