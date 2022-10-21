import PyPDF2
from app import *
from PIL import Image
import os
import glob


def getImage(path):
    image_path_factory = r'C:/xampp/htdocs/ArchiBot/CVImage/'
    files = glob.glob(r"C:/xampp/htdocs/ArchiBot/CVImage/*")
    for file in files:
        os.remove(file)
    input1 = PyPDF2.PdfFileReader(open(path, 'rb'))
    page0 = input1.getPage(0)
    xObject = page0['/Resources']['/XObject'].getObject()

    for obj in xObject:
        if xObject[obj]['/Subtype'] == '/Image':
            size = (xObject[obj]['/Width'], xObject[obj]['/Height'])
            data = xObject[obj].getData()
            if xObject[obj]['/ColorSpace'] == '/DeviceRGB':
                mode = "RGB"
            else:
                mode = "P"

            if xObject[obj]['/Filter'] == '/DCTDecode':
                img = open(image_path_factory+obj[1:] + ".jpg", "wb")
                img.write(data)
                img.close()
            elif xObject[obj]['/Filter'] == '/FlateDecode':
                img = Image.frombytes(mode, size, data)
                img.save(image_path_factory + obj[1:] + ".png")
            elif xObject[obj]['/Filter'] == '/JPXDecode':
                img = open(image_path_factory + obj[1:] + ".jp2", "wb")
                img.write(data)
                img.close()
    clean_data()
    files = glob.glob(image_path_factory+"*")
    for file in files:
        return file
