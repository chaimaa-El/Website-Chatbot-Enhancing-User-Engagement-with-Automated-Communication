import re
from db import conn


def extract_phone_number(resume_text):
    phone = re.findall(PHONE_REG, resume_text)

    if phone:
        number = ''.join(phone[0])

        if resume_text.find(number) >= 0 and len(number) < 16:
            return number
    return None


def getPhone(path):
    import PyPDF2

    # create file object variable
    # opening method will be rb
    pdffileobj = open(path, 'rb')

    # create reader variable that will read the pdffileobj
    pdfreader = PyPDF2.PdfFileReader(pdffileobj)

    # This will store the number of pages of this pdf file
    x = pdfreader.numPages

    # create a variable that will select the selected number of pages
    pageobj = pdfreader.getPage(0)

    # (x+1) because python indentation starts with 0.
    # create text variable which will store all text datafrom pdf file
    text = pageobj.extractText()
    phone_number = extract_phone_number(text)
    return phone_number


def getData(path):
    from pyresparser import ResumeParser
    data = ResumeParser(path).get_extracted_data()
    return data['name'], data['email']


path = 'C:/xampp/htdocs/ArchiBot/cv/CV3.pdf'
PHONE_REG = re.compile(r'[\+\(]?[1-9][0-9 .\-\(\)]{8,}[0-9]')
phone = getPhone(path)
name, mail = getData(path)
print("phone :", phone)
print("name: ", name, " mail: ", mail)
# Tester la connection
# print("Connection: ", conn)
