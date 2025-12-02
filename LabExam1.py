import tkinter as tk
from tkinter import ttk, messagebox

class Item:
    def __init__(self, name, quantity, price):
        self.name = name
        self.quantity = quantity
        self.price = price

    def update_quantity(self, new_quantity):
        self.quantity = new_quantity

    def total_price(self):
        return self.quantity * self.price


class Inventory:
    def __init__(self):
        self.items = []

    def add_item(self, name, quantity, price):
        self.items.append(Item(name, quantity, price))

    def update_item_quantity(self, name, qty):
        for item in self.items:
            if item.name.lower() == name.lower():
                item.update_quantity(qty)
                return True
        return False

    def get_all_items(self):
        return self.items

    def calculate_total_value(self):
        return sum(item.total_price() for item in self.items)


# ---------------- GUI SECTION ---------------- #

inv = Inventory()

def refresh_table():
    for row in table.get_children():
        table.delete(row)

    for item in inv.get_all_items():
        table.insert("", "end", values=(item.name, item.quantity, f"₱{item.price:.2f}", f"₱{item.total_price():.2f}"))

def add_item():
    name = entry_name.get()
    qty = entry_qty.get()
    price = entry_price.get()

    if not (name and qty and price):
        messagebox.showwarning("Missing Input", "Please complete all fields.")
        return

    try:
        qty = int(qty)
        price = float(price)
    except:
        messagebox.showerror("Invalid Input", "Quantity must be whole number and price must be numeric.")
        return

    inv.add_item(name, qty, price)
    refresh_table()
    clear_inputs()
    messagebox.showinfo("Success", f"{name} added!")

def update_quantity():
    name = entry_name.get()
    qty = entry_qty.get()

    if not (name and qty):
        messagebox.showwarning("Missing Input", "Enter item name and new quantity.")
        return

    try:
        qty = int(qty)
    except:
        messagebox.showerror("Invalid Input", "Quantity must be whole number.")
        return

    if inv.update_item_quantity(name, qty):
        refresh_table()
        messagebox.showinfo("Updated", f"Quantity of {name} updated!")
    else:
        messagebox.showerror("Not Found", "Item not found.")
    clear_inputs()

def clear_inputs():
    entry_name.delete(0, tk.END)
    entry_qty.delete(0, tk.END)
    entry_price.delete(0, tk.END)

def show_total_value():
    total = inv.calculate_total_value()
    messagebox.showinfo("Inventory Value", f"Total Inventory Value: ₱{total:.2f}")


# ---------------- WINDOW DESIGN ---------------- #

window = tk.Tk()
window.title("Inventory Management System")
window.geometry("650x550")
window.configure(bg="#eef2f5")

style = ttk.Style()
style.theme_use("clam")

title_label = tk.Label(window, text="Inventory Management System", font=("Arial", 18, "bold"), bg="#eef2f5")
title_label.pack(pady=10)

# Input frame
input_frame = tk.Frame(window, bg="white", bd=2, relief="groove")
input_frame.pack(pady=10, padx=10, fill="x")

tk.Label(input_frame, text="Item Name:", font=("Arial", 11), bg="white").grid(row=0, column=0, padx=10, pady=5, sticky="w")
entry_name = ttk.Entry(input_frame, width=30)
entry_name.grid(row=0, column=1, pady=5)

tk.Label(input_frame, text="Quantity:", font=("Arial", 11), bg="white").grid(row=1, column=0, padx=10, pady=5, sticky="w")
entry_qty = ttk.Entry(input_frame, width=30)
entry_qty.grid(row=1, column=1, pady=5)

tk.Label(input_frame, text="Price:", font=("Arial", 11), bg="white").grid(row=2, column=0, padx=10, pady=5, sticky="w")
entry_price = ttk.Entry(input_frame, width=30)
entry_price.grid(row=2, column=1, pady=5)

# Buttons
btn_frame = tk.Frame(window, bg="#eef2f5")
btn_frame.pack(pady=5)

ttk.Button(btn_frame, text="Add Item", width=18, command=add_item).grid(row=0, column=0, padx=5)
ttk.Button(btn_frame, text="Update Quantity", width=18, command=update_quantity).grid(row=0, column=1, padx=5)
ttk.Button(btn_frame, text="Show Total Value", width=20, command=show_total_value).grid(row=0, column=2, padx=5)

# Table
table_frame = tk.Frame(window)
table_frame.pack(pady=10)

table = ttk.Treeview(table_frame, columns=("Name", "Qty", "Price", "Total"), show="headings", height=12)
table.pack()

table.heading("Name", text="Item Name")
table.heading("Qty", text="Quantity")
table.heading("Price", text="Price")
table.heading("Total", text="Total Value")

table.column("Name", width=200)
table.column("Qty", width=80)
table.column("Price", width=120)
table.column("Total", width=120)

window.mainloop()
