# Arunz Application



## Installation:
  To install and use this application need to:\n
  -> Download this apllication from repository\n
  -> Move files application to server (e.x. Apache2, nginx or something else)\n
  -> Download file 'janberdy39.sql' and load to database call 'janberdy39'(if not exists, create !) by mysqldump \n
  -> Change detail's connect database in /basic/config/db.php to our data\n
  -> Run and enjoy !\n

More important INFO !!!
-In this application API's (Google API, Facebook API) are off. Dates card number in register page could be fake :).

If you want to create virtual host, in vhost file add (for Apache):
 
 <VirtualHost *:80>
    ServerAdmin <your_name_domain>
    DocumentRoot "<absolute_path_app>/public"
    ServerName <your_name_domain>
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>

## Capabilities:
  In this application we can (in shortcut):\n
  -> Register and create account
  -> Manage profile (add, delete, edit ) \n
  -> Manage roads in which take part-in

