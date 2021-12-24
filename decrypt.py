#import libraries
#!/usr/bin/python
import rsa
import soja
import encrypt

decMessage = rsa.decrypt(encrypt.encMessage, soja.privateKey).decode()
print(decMessage)
