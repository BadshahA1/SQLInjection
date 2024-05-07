import sqlite3

def insert_user(username, password):
    connection = sqlite3.connect('example.db')
    cursor = connection.cursor()
    
    # Create table (if not already exists)
    cursor.execute('''CREATE TABLE IF NOT EXISTS users
                      (username TEXT, password TEXT)''')
    
    # Using parameterized queries to prevent SQL injection
    cursor.execute('INSERT INTO users (username, password) VALUES (?, ?)', (username, password))
    
    # Commit the changes and close the connection
    connection.commit()
    connection.close()

# Example usage
user_name = input("Enter username: ")
user_password = input("Enter password: ")
insert_user(user_name, user_password)
