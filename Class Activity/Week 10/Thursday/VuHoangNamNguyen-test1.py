# Hello World program in Python
    
print ("CPAN204-Wekk10-VuHoangNamNguyen\n")

#Variables
x = 10
print (x)
y = 20
print (y)

x,y = y,x
print (x,y)

#if structure in Python
grade = 90
if grade>80:
    print ("Good Job")
else:
    print ("Try Again")
    
#if structure in Python--Sample2
grade=90
if grade<90:
    print ("Try Again")
elif grade==90:
    print ("You Got 90")
else:
    print ("Well Done!")

#switch ..  case IN PYTHON -- NOPE


#LOOPs : WHILE
n=1
while n<20:
    print (n)
    n+=1
    
#LOOP : do .. while -- NOPE

#LOOP : FOR
for n in range(20):
    print (n)
    n+=1
    
#LOOP : FOR
for n in range(65, 72):
    print (n)
    n+=1
    
#How to declare a function
def func1():
    print ("My first function starts")
    print ("Function ends")
func1()
