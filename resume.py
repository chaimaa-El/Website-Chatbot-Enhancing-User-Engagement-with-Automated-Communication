import json
from zeep import Client
from lxml import etree
import xml.etree.ElementTree
import xmltodict

uploaded_resume = request.FILES['file']
uploaded_file_content = ""

#handles file size
for chunk in uploaded_resume.chunks():
    uploaded_file_content += chunk
#convert resume in base64    
resume_in_b64 = uploaded_file_content.encode("base64")

data = json.loads(resume_parser(resume_in_b64, str(uploaded_resume), 1, 'YOUR_API_KEY'))

def resume_parser(resume_in_b64, filename, user_id, key):
    client = Client("http://rplusparserapi.parseresume.com/rPlusParseResume.asmx?WSDL")
    parsed_resume_data = client.service.Get_HRXML(resume_in_b64, filename, 1, key)
    o = xmltodict.parse(parsed_resume_data)
    #convert resume to json from xml
    resume_in_json = json.dumps(o)
    return resume_in_json