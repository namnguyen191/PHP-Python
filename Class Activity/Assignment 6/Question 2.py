firstname = input("Enter a Firstname: ")
found = False
try:
    with open("dataFile.txt") as f:
        for line in f:
            for part in line.split():
                if firstname in part:
                    found =  True
                    line = line.split(",")
                    print("Firstname: " + line[0])
                    print("Last name: " + line[1])
                    print("Email: " + line[2])
except FileNotFoundError:
    print("File Not Found!")
if found==False:
    print("No Record Found!")