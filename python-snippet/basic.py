import sys
from PyQt5.QtCore import *
from PyQt5.QtGui import *
from PyQt5.QtWidgets import *

def window():
   app = QApplication(sys.argv)
   w = QWidget()
   w.setWindowTitle("Anis Tech LTD")
   w.setGeometry(300,200,800,400)

   b = QLabel(w)
   b.setText("Welcome to Anisur Rahman Tech LTD")

   w.show()
   sys.exit(app.exec_())

if __name__ == '__main__':
   window()
