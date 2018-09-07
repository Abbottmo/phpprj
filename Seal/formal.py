import cv2
import numpy as np

Img=cv2.imread("0204/01.jpg")
HSV=cv2.cvtColor(Img,cv2.COLOR_BGR2HSV)

LowerRed = np.array([0, 100, 100])
UpperRed = np.array([10, 255, 255])
LowerRed1 = np.array([170, 100, 100])
UpperRed1 = np.array([180, 255, 255])

mask = cv2.inRange(HSV, LowerRed, UpperRed)
RedThings = cv2.bitwise_and(Img, Img, mask=mask)

mask=cv2.inRange(HSV, LowerRed1, UpperRed1)
RedThings1 = cv2.bitwise_and(Img, Img, mask=mask)

RedThings=cv2.bitwise_or(RedThings, RedThings1)

kernel=np.ones((100,100),np.uint8)
RedThings = cv2.morphologyEx(RedThings, cv2.MORPH_CLOSE, kernel)
img2gray=cv2.cvtColor(RedThings, cv2.COLOR_BGR2GRAY)
ret,im_fixed=cv2.threshold(img2gray, 10, 255, cv2.THRESH_BINARY)

_,countours,hierarchy=cv2.findContours(im_fixed,2,1)


RectCandidate=[]
for countour in countours:
    rect=cv2.minAreaRect(countour)
    RectCandidate.append(rect)



def Judge(RectCandidate,ImgHeight):
    if len(RectCandidate)<1:
        print("Error")
        return
    minArea=45000
    num=0
    for Rect in RectCandidate:
        y=Rect[0][1]
        w=Rect[1][0]
        h=Rect[1][1]
        area=w*h
        if area>minArea: #and y>0.5*ImgHeight:
            num+=1
    return num

ImgHeight=RedThings.shape[0]
num=Judge(RectCandidate, ImgHeight)
print(num)


