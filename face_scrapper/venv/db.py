import mysql.connector
try:
    conn = mysql.connector.connect(host='localhost',
                                   database='archibot',
                                   user='root',
                                   password='')
except mysql.connector.Error as e:
    print("Error reading data from MySQL table", e)
