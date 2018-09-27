<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div align="center">
  <form id="form1" name="form1" method="post" action="sendmessage.php">
    <p>
      <input type="text" name="from" id="from" placeholder="From" />
    </p>
    <p>
      <textarea name="mesaj" id="mesaj" cols="45" rows="5" placeholder="sms content"></textarea>
    </p>
    <p>
      <textarea name="numere" id="numere" cols="45" rows="20" placeholder="phone numbers - one per line"></textarea>
    </p>
    <p>
      <input type="submit" name="button" id="button" value="Send sms" />
    </p>
  </form>
</div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>GMX SMS Sender</title>
</head>
<body>
<form method="post" action="sendmessage.php">
<input type="text" placeholder="FROM" name="from" value="Wang"><br>
<textarea rows="5" cols="100" placeholder="MESSAGE"  name="message" id="message">This is test.</textarea><br>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="1.js"></script>
<div>
<div><span id="remaining">160</span>&nbsp;Character<span class="cplural">s</span> Remaining</div>
<div>Total&nbsp;<span id="messages">1</span>&nbsp;Message<span class="mplural" style="display: none;">s</span>&nbsp;<span id="total">0</span>&nbsp;haracter<span class="tplural" style="display: none;">s</span></div>
</div>
<textarea rows="15" placeholder="NEXMO_API_KEY:NEXMO_API_SECRET" cols="100" name="accounts" id="accounts"></textarea><br>
<textarea rows="15" cols="100" placeholder="NUMBERS"  name="numbers" id="numbers"></textarea><br>
<br><input type="submit" name="send" value="send"><br><br><br></form></body>
</html>