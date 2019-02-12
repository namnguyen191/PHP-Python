try:
    with open("dataFile.txt") as f:
        for line in f:
            currentline = line.split(",")
            print("Firstname: " + currentline[0])
            print("Last name: " + currentline[1])
            print("Email: " + currentline[2])
except FileNotFoundError:
    print("File Not Found!")