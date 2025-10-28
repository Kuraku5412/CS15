class Dog:
    def __init__(self, name, age):
        # initialize attributes
        self.name = name
        self.age = age

    def bark(self):
        # print bark sound
        print("Woof! Woof!")

    def celebrate_birthday(self):
        # increase age by 1 and print birthday message
        self.age += 1
        print(f"Happy Birthday! {self.name} is now {self.age} years old.")

    def get_info(self):
        # return dog's name and age as a string
        return f"Dog Name: {self.name}, Age: {self.age}"


# create a Dog object and call the methods
dog1 = Dog("Max", 5)
dog1.bark()
dog1.celebrate_birthday()
print(dog1.get_info())
