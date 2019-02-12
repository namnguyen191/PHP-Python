#!c:\python\python.exe
import cgi
import collections

print("Content-Type: text/html \n\n")

formData = cgi.FieldStorage()
GS = formData.getvalue('gs')

d = {}
groupSec = collections.OrderedDict()
groupSecCom = collections.OrderedDict()
size = int(GS)
try:
    with open("customers.txt") as f:
        for line in f.read().splitlines():
            line = line.split(",")
            key = line[0] + " - " + line[1]
            val = line[2] + " on " + line[3]
            d[key] = val
    group = {}z
    for key, val in sorted(d.items()):
        group.setdefault(val,[]).append(key)

except FileNotFoundError:
    print("File Not Found!")
for key, val in group.items():
    counter = 0
    section = 1
    for item in val:
        groupSec[item] = key + " Section: " + str(section)
        counter = counter + 1
        if counter == size:
            counter = 0
            section = section + 1
for key, val in groupSec.items():
    groupSecCom.setdefault(val,[]).append(key)

for key, val in groupSecCom.items():
    print(key + "<br>")
    for item in val:
        print(item + "<br>")
    if len(val) == size:
        print("Group Status: Confirmed!")
    else:
        miss = size - len(val)
        print("Group Status: Unconfirmed! Missing " + str(miss) + " more member(s).")
    print("<br>")

