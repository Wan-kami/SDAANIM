import tkinter as tk
from tkinter import messagebox
import mysql.connector
from mysql.connector import Error

# Conexión a MySQL
def conectar():
    try:
        conexion = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",   # <-- pon tu contraseña
            database="escuela"
        )
        return conexion
    except Error as e:
        messagebox.showerror("Error", f"No se pudo conectar:\n{e}")
        return None

# Agregar estudiante
def agregar_estudiante():
    nombre = entry_nombre.get()

    if nombre.strip() == "":
        messagebox.showwarning("Advertencia", "El nombre no puede estar vacío")
        return

    conexion = conectar()
    if conexion:
        try:
            cursor = conexion.cursor()
            sql = "INSERT INTO estudiantes (nombre) VALUES (%s)"
            cursor.execute(sql, (nombre,))
            conexion.commit()

            messagebox.showinfo("Éxito", "Estudiante agregado")
            entry_nombre.delete(0, tk.END)

            mostrar_estudiantes()

        except Error as e:
            messagebox.showerror("Error", str(e))
        finally:
            cursor.close()
            conexion.close()

# Mostrar estudiantes
def mostrar_estudiantes():
    lista.delete(0, tk.END)

    conexion = conectar()
    if conexion:
        try:
            cursor = conexion.cursor()
            cursor.execute("SELECT id, nombre FROM estudiantes")

            for fila in cursor.fetchall():
                lista.insert(tk.END, f"{fila[0]} - {fila[1]}")

        except Error as e:
            messagebox.showerror("Error", str(e))
        finally:
            cursor.close()
            conexion.close()

# Eliminar estudiante
def eliminar_estudiante():
    seleccionado = lista.get(tk.ACTIVE)

    if seleccionado == "":
        messagebox.showwarning("Advertencia", "Selecciona un estudiante")
        return

    id_estudiante = seleccionado.split(" - ")[0]

    conexion = conectar()
    if conexion:
        try:
            cursor = conexion.cursor()
            cursor.execute("DELETE FROM estudiantes WHERE id = %s", (id_estudiante,))
            conexion.commit()

            messagebox.showinfo("Éxito", "Estudiante eliminado")
            mostrar_estudiantes()

        except Error as e:
            messagebox.showerror("Error", str(e))
        finally:
            cursor.close()
            conexion.close()

# Interfaz
ventana = tk.Tk()
ventana.title("Sistema de Estudiantes")
ventana.geometry("350x300")

# Entrada
label_nombre = tk.Label(ventana, text="Nombre:")
label_nombre.pack()

entry_nombre = tk.Entry(ventana)
entry_nombre.pack()

# Botones
btn_agregar = tk.Button(ventana, text="Agregar", command=agregar_estudiante)
btn_agregar.pack(pady=5)

btn_eliminar = tk.Button(ventana, text="Eliminar", command=eliminar_estudiante)
btn_eliminar.pack(pady=5)

btn_mostrar = tk.Button(ventana, text="Mostrar", command=mostrar_estudiantes)
btn_mostrar.pack(pady=5)

# Lista
lista = tk.Listbox(ventana, width=40)
lista.pack(pady=10)

ventana.mainloop()