import collections
d = {}
groupSec = collections.OrderedDict()
groupSecCom = collections.OrderedDict()
size = int(input("Enter a group size: "))
try:
    with open("customers.txt") as f:
        for line in f.read().splitlines():
            line = line.split(",")
            key = line[0] + " - " + line[1]
            val = line[2] + " on " + line[3]
            d[key] = val
    group = {}
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
    print(key)
    for item in val:
        print(item)
    if len(val) == size:
        print("Confirmed")
    else:
        miss = size - len(val)
        print("Unconfirmed. Missing " + str(miss) + " more member(s).")
    print("\n")
