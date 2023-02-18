#!/bin/env python
import requests
import sys

url = 'https://example.com/upload.php'
password = 'BCRYPT_GENERATED_PASSWORD_HERE'

dirr = sys.argv[2] if len(sys.argv) > 2 else None
file = sys.argv[1] if len(sys.argv) > 1 else exit()
files = {'fileToUpload': open(file, 'rb')}

#: Working on Python 3.5>
#data = {'password': password, **{'dir': dirr} if dirr is not None else {}}
#: Working on Python <3.5 and up?
data = {'secureley': password, 'dir': dirr} if dirr is not None else {'secureley': password}

response = requests.post(url, files=files, data=data)
print(response.text)
