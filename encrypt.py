#import libraries
#!/usr/bin/python
import rsa
import soja

message = "Hello World!"
print(message)

encMessage = rsa.encrypt(message.encode(), soja.publicKey)
print(encMessage)
