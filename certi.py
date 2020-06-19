import pip
import sys
import os
import shutil
from PIL import Image
from PIL import ImageFont
from PIL import ImageDraw
from csv import reader
from zipfile import ZipFile

if not 'PIL' in sys.modules.keys():
    pip.main(['install', 'pillow'])

if not 'zipfile' in sys.modules.keys():
    pip.main(['install', 'zipfile36'])

imgFile = sys.argv[1]
sheet = sys.argv[2]
xEv = sys.argv[3]
yEv = sys.argv[4]
xName = sys.argv[5]
yName = sys.argv[6]


def generateCertificate(imgFile, sheet, xe, ye, xn, yn):
    # Create a folder for the files
    folder = imgFile.split('.')[0]
    os.chdir(os.getcwd() + '//uploads//')
    os.makedirs(folder)
    # Move the files to the folder
    shutil.move(imgFile, folder)
    shutil.move(sheet, folder)
    os.chdir(folder)

    # Iterate Over the CSV file
    file = open(sheet)
    csvObj = reader(file)
    counter = 1
    color = 'rgb(0,0,0)'
    font = ImageFont.truetype("arial.ttf", 100)
    for rows in csvObj:
        img = Image.open(imgFile)
        draw = ImageDraw.Draw(img)
        name = rows[0]
        event = rows[1]
        draw.text((int(xn), int(yn)), name, fill=color, font=font)
        draw.text((int(xe), int(ye)), event, fill=color, font=font)
        img.save(f"{str(counter)}.jpg")
        counter += 1

    files = os.listdir()
    with ZipFile(f'{folder}.zip', 'w') as zip:
        for file in files:
            zip.write(file)
    shutil.move(f'{folder}.zip', r'..')
    return(f'{folder}.zip')



# Generating the certificate file
print(generateCertificate(imgFile, sheet, xEv, yEv, xName, yName))
