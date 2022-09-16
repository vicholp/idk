# Database

Inside this folder, you should care only about `sql` folder.

Inside it, you will find an `up` and a `down` sql file. You should define your database 
schema there. 

If you execute `php execute Database migrateFresh`, the `down` file will be execute followed by the `up` file.
