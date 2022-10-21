from db import conn
from cv_parser import *
from extract_profile_img import *
import mysql.connector
# Retrieving single row
# Creating a cursor object using the cursor() method
path = r"C:/xampp/htdocs/ArchiBot/cv/"
cursor = conn.cursor()

sql = '''SELECT * from Condidat'''


def convertToBinaryData(filename):
    # Convert digital data to binary format
    with open(filename, 'rb') as file:
        binaryData = file.read()
    return binaryData


# Executing the query
cursor.execute(sql)

# Fetching 1st row from the table
result = cursor.fetchall()
print(len(result))
# Delete all the content of the table
query = "truncate table parser"
cursor2 = conn.cursor()
cursor2.execute(query)
conn.commit()
for i in range(len(result)):
    # print("Nom: ", result[i][1], "Cv: ", result[i][6])
    # print(path+result[i][6])
    cv = result[i][6]
    cv = cv.replace(" ", "")
    file = path + cv
    print("/////////////////////////////////////////////////////////")
    name, mail = getData(file)
    phone = getPhone(file)
    # print(result[i][1]+" "+result[i][2])
    print("name: ", name, "mail", mail)
    print("phone: ", phone)
    pathImg = getImage(file)
    print("Image PATH: ", pathImg)
    # try:
    sql_insert_blob_query = """ INSERT INTO parser
                        (id, nom, email, tel,image) VALUES (%s,%s,%s,%s,%s)"""

    empPicture = convertToBinaryData(pathImg)
    # Convert data into tuple format
    cursor1 = conn.cursor()
    insert_blob_tuple = (0, name, mail, phone, empPicture)
    result1 = cursor1.execute(sql_insert_blob_query, insert_blob_tuple)
    conn.commit()
    print("Image and file inserted successfully as a BLOB into python_employee table", result1)
    # conn.close()
    # except mysql.connector.Error as error:
    #     print("Failed inserting BLOB data into MySQL table {}".format(error))


# Closing the connection
conn.close()
