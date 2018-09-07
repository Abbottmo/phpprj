# -*- coding: utf-8 -*-
"""
Created on Wed Aug 22 02:16:13 2018

@author: Administrator
"""
import requests
content={'image_id':"12345"}   
#url = 'http://192.168.1.118/get_return.php'
url = 'http://2195941lt8.imwork.net/get_return.php'
r=requests.get(url,params=content)                   
print (r.text)    
                  

