#!/bin/env python
import bcrypt

password = 'YOUR_PASSWORD_HERE'
bytes = password.encode('utf-8')
salt = bcrypt.gensalt()
hash = bcrypt.hashpw(bytes, salt)
print(hash)
