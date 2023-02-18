# PHP_Uploader

This just almost works out of boxie...
Using bcrypt to not leak real password (bcrypt for python is needed for the python script)


Edit bcrypt_encode_** and set password var to something neat, then run
```
$ python ./bcrypt_encode_python.py
```

Copy the output and paste in correct_password var in upload.php
Do the same in send.py. Also change url var while you are here.
```
$ chown nginx:nginx UPLOAD_FOLDER  # apache/www-data depending on configuration
$ chmod 755 UPLOAD_FOLDER
```

You might want to change upload_max_filesize in /etc/php.ini and 
your nginx setting under "server {" add client_max_body_size 10m; if not exist

Add .local/bin to ENV path and:
```
$ chmod +x send.py
$ mv send.py ~/.local/bin/upload
```

# Happy uploading!