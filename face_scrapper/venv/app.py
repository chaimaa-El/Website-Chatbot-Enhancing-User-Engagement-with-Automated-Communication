import cv2
import glob
import os


# image = cv2.imread('C:/xampp/htdocs/ArchiBot/CVImage/X4.jpg')
def clean_data():
    image_path_factory = "C:/xampp/htdocs/ArchiBot/CVImage/"

    PngFile = glob.glob(image_path_factory+"*.png")

    JpgFile = glob.glob(image_path_factory+"*.jpg")

    Jp2File = glob.glob(image_path_factory+"*.jp2")

    for file in PngFile:
        image = cv2.imread(file)
        gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

        faceCascade = cv2.CascadeClassifier(
            cv2.data.haarcascades + "haarcascade_frontalface_default.xml")
        faces = faceCascade.detectMultiScale(
            gray,
            scaleFactor=1.3,
            minNeighbors=3,
            minSize=(30, 30)
        )
        if len(faces) == 0:
            os.remove(file)
        print("Found {0} Faces!".format(len(faces)))

    for file in JpgFile:
        image = cv2.imread(file)
        gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

        faceCascade = cv2.CascadeClassifier(
            cv2.data.haarcascades + "haarcascade_frontalface_default.xml")
        faces = faceCascade.detectMultiScale(
            gray,
            scaleFactor=1.3,
            minNeighbors=3,
            minSize=(30, 30)
        )
        if len(faces) == 0:
            os.remove(file)
        print("Found {0} Faces!".format(len(faces)))

    for file in Jp2File:
        image = cv2.imread(file)
        gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

        faceCascade = cv2.CascadeClassifier(
            cv2.data.haarcascades + "haarcascade_frontalface_default.xml")
        faces = faceCascade.detectMultiScale(
            gray,
            scaleFactor=1.3,
            minNeighbors=3,
            minSize=(30, 30)
        )
        if len(faces) == 0:
            os.remove(file)
        print("Found {0} Faces!".format(len(faces)))


clean_data()
