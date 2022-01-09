# soja
**A server access software that limits the IP addresses that have authorized access.**

## Prerequisites

Have **XAMPP** and **Python 3.X** preinstalled.

Start Apache and MySQL from the XAMPP control panel.

Download then extract.  
Create a database named **sojadb** in phpMyAdmin.  
Import the database *sojadb.sql* located in the db folder into the localhost phpMyAdmin **sojadb** database.


In the command line or windows powershell, type the following commands for the mysql connector for python,  
 ```pip3 install mysql-connector```  

  On the XAMPP control panel, open the file php.ini in **Apache**->**config** and add the following line if it doesn't exist,  
  ```safe_mode_exec_dir = off```  
  This should enable running of the python file via command prompt by the PHP file. 
  
  Open **start** and search **app execution aliases**. Turn off **app installers** for python so they are not invoked by the python3 keyword when running python files via command prompt.
  
## Execution 
  
To run the employee/default module type ```localhost/soja``` on the address bar  
To run the admin module type ```localhost/soja/admin``` (username:admin)(password:admin)
