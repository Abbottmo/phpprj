# -*- coding: utf-8 -*-
"""
Created on Fri Sep  7 10:15:32 2018

@author: Administrator
"""
import requests
import json

#url = 'http://2195941lt8.imwork.net:80/up_images.php'
url = 'http://192.168.1.118/AI/services/querysingle.php'

data = { "jkxlh":"12345678","requestid":"987654321"}
r = requests.post(url,data=data)
print(r.json())
#print(r.text);
