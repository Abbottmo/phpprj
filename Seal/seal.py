import cv2
import numpy as np


Img=cv2.imread("0204/03.jpg")
HSV=cv2.cvtColor(Img,cv2.COLOR_BGR2HSV)

LowerRed = np.array([0, 100, 100])
UpperRed = np.array([10, 255, 255])

LowerRed1=np.array([170, 100, 100])
UpperRed1= np.array([180, 255, 255])


mask = cv2.inRange(HSV, LowerRed, UpperRed)
RedThings = cv2.bitwise_and(Img, Img, mask=mask)
mask=cv2.inRange(HSV, LowerRed1, UpperRed1)
RedThings1 = cv2.bitwise_and(Img, Img, mask=mask)
RedThings=cv2.bitwise_or(RedThings, RedThings1)

# cv2.imshow('Mask', mask)
# cv2.imshow('Img', Img)
# cv2.imshow('H', H)
sp=RedThings.shape
kernel=np.ones((100,100),np.uint8)
RedThings = cv2.morphologyEx(RedThings, cv2.MORPH_CLOSE, kernel)
img2gray=cv2.cvtColor(RedThings, cv2.COLOR_BGR2GRAY)
ret,im_fixed=cv2.threshold(img2gray, 10, 255, cv2.THRESH_BINARY)

_,countours,hierarchy=cv2.findContours(im_fixed,2,1)




for i in countours:
    rect=cv2.minAreaRect(i)
    print(rect)
    box=cv2.boxPoints(rect)
    box=np.int0(box)
    cv2.drawContours(Img,[box],0,(0,0,0),2)
    print(box)
final = cv2.drawContours(Img, countours, -1, (0,255,225), 3)

cv2.namedWindow("Red", 0)
cv2.resizeWindow("Red", int(sp[0]/2), int(sp[1]/2))
cv2.imshow('Red', Img)
cv2.waitKey(10000)
cv2.destroyAllWindows()
