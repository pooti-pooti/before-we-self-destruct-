<?php
$sql = "mysql:host=$servername;dbname=$dbname;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
  echo "Status : Connected successfully.";
} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}
?>
<table>
  <tr>
    <td>
      <center>
        <div class="messengerItems" width="81%">
        <div class="messengerForm"><form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"></div>
        <div class="messengerField">Message: <textarea type="text" name="message" class="messageContent"></textarea></div>
        <div class="inputBox"><input type="submit" name="submit" class="sendButton"></div>
        </div>
      </center>
    </td>
    <td>
      <div class="noteBox">
        <ul>
        <h2 style="color: #2e6c80;">Critical Notes :</h2>
        <ol style="list-style: none; font-size: 14px; line-height: 32px; font-weight: bold;">
        <li style="clear: both;">Click Refresh before sending to see for new messages</li>
        <li style="clear: both;">Sending a message deletes anything before it</li>
        <li style="clear: both;">More notes ..</li>
        </ol>
      </div>
    </td>
  </tr>
</table>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // collect value of input field
      $message = $_POST['message'];
      if (empty($message)) {
        echo "Message is empty";
      } else {
        $my_Insert_Statement = $my_Db_Connection->prepare("DELETE FROM sent_messages");
        $my_Insert_Statement->execute();
        $my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO sent_messages (message_content) VALUES (:message)");
        $my_Insert_Statement->bindParam(':message', $message);
        $my_Insert_Statement->execute();
        header("Refresh:0");
      }
      
    }
?>