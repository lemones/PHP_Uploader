# PHP_Uploader

This just almost works out of boxie...
Using bcrypt to not leak real password (bcrypt for python is needed for the python script)


What to do:
Edit bcrypt_encode_** and set password var to something neat

$ python ./bcrypt_encode_python.py

Copy the password and paste in correct_password var in upload.php
Do the same in send.py. Also change url var while you are here.

$ chown nginx:nginx UPLOAD_FOLDER  # apache/www-data depending on configuration
$ chmod 755 UPLOAD_FOLDER

You might want to change upload_max_filesize in /etc/php.ini
Also your nginx under server { change or add client_max_body_size 10m;


Add .local/bin to ENV path and
$ chmod +x send.py
$ mv send.py ~/.local/bin/upload
