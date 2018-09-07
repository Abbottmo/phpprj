import cv2

Img=cv2.imread("0203/12.jpg")
cv2.namedWindow("h")





def getHsv(event,x,y,flags,param):
    
    # HSV=cv2.cvtColor(param,cv2.COLOR_BGR2HSV)
    
    if event==cv2.EVENT_LBUTTONDBLCLK:
        color=Img[x][y]
        HSV=cv2.cvtColor(Img,cv2.COLOR_BGR2HSV)
        hsv=HSV[x][y]
        print((x,y),color,hsv)
        cv2.circle(Img,(x,y),1,(0,0,0),3)


cv2.setMouseCallback("h",getHsv)

while 1:
   cv2.imshow("h", Img)
   if cv2.waitKey(40)==ord("q"):
      break
cv2.destroyAllWindows()