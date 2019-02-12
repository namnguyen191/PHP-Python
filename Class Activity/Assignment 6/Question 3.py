from shutil import copyfile
try:
    copyfile("dataFile.txt","VuHoangNamNguyen.txt")
except FileNotFoundError:
    print("File Not Found!")