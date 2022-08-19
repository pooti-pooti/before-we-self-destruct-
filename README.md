## Describtion 

This php file can be used to send messages the user can read and then delete. <br> 
You can't stop someone else from seeing it if they had the link, but they can't stop you from knowing about it, because anytime someone reads the message, you will have their IP address.

This can be used to conduct Analytics of user experience by putting it in the middle of an advertisment on your site.

## Installation 

1 - Create MySQL database and add two tables to it : `message` and `ip-message`.<br>
2 - Link the MySQL database by putting the configuration at the top of both `main.php` and `delete.php` files.<br>
3 - Upload the files to your server, test them and if they work..<br>
4 - Go to the message table and write your message there and send the file. <br>
  `(note: you can check if the message works before sending it by going to the link)`.<br>
5 - After sending the message inspect the ip-message table and you will see the ip's of anyone who opens it. <br>
6 - Go to `https://iplocation.net` to search for any ip's that you receive.<br>

Have a blast !
