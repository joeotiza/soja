#import libraries
import sys
import mysql.connector
import numpy as np
from requests import get
import rsa

#establish a connection to the database
conn = mysql.connector.connect(host='localhost', database='sojadb', user='root', password='')

#cursor to handle SQL statements
mycursor = conn.cursor()

#select all IP addresses registered under the logged in employee
query = "SELECT `ip` FROM `ipaddress` WHERE `employeeid` = %s"
employeeid = (sys.argv[1],)
mycursor.execute(query, employeeid)

results = mycursor.fetchall()
stuff = zip(results)
outlist=[]#array to hold registered IP addresses
for row in stuff:
    arr=np.asarray(row)
    type=arr.dtype
    outlist.append(arr)

#check if the first two bytes of the public IP are similar to an IP already registered
#1. Get the public IP
ip = get('https://api.ipify.org').text
print(ip)
#2. Variable to allow or deny access
access = False
for byte in outlist:
    if(byte[0][0].split(".")[0] == ip.split(".")[0] and byte[0][0].split(".")[1] == ip.split(".")[1]):
        access = True

print(access)

#Generate public and private keys with rsa.newkeys method,this method accepts key length as its parameter
#
