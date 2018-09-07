# -*- coding: utf-8 -*-
# =============================================================================
# import requests
# url = 'http://2195941lt8.imwork.net:80/up_images.php'
# #url = 'http://192.168.1.118/up_images.php'
# data = {'content': 'test', 'id': "12345"}
# files = {'file': ('1.png',open("1.png", 'rb'),'image/png')}
# response = requests.post(url, data=data,files = files)
# print(response.text)
# =============================================================================
import requests
import json

#url = 'http://2195941lt8.imwork.net:80/up_images.php'
url = 'http://192.168.1.118/AI/services/write.php'
head = [{"requestid":"12345678","jkxlh":"987654321","rownum":"2"}]

vehicle = [{ "lsh":"XXXX",
            "hphm":"XXXXXX", 
            "hpzl":"XX"}]

photodes = [{"zpzl":"XXXX","zpurl":"http://ip:port/XXX/XXX.jpg" 
},{"zpzl":"XXXX","zpurl":"http://ip:port/XXX/XXX.jpg" 
}]

refphotodes = [{"lb":"XXXX","zpurl":"http://ip:port/XXX/XXX.jpg",}]

data = {"head":json.dumps(head),"vehicle":json.dumps(vehicle),
     "photodes":json.dumps(photodes),"refphotodes":json.dumps(refphotodes)}
r = requests.post(url,data=data)
print(r.json())
