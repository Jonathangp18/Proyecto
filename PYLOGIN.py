# -*- coding: utf-8 -*-
"""
Created on Sun May 24 23:07:21 2020

@author: Asus
"""

Infra=[]
import subprocess
import sys, json, random, urllib.request
from PyQt5.QtWidgets import QApplication, QDialog
from PyQt5 import uic, QtCore, QtWidgets
from PyQt5.QtGui import QPalette, QBrush, QPixmap
from tkinter import Tk,Label,Button,Frame



class Interfaz(QDialog):
    
    def __init__(self):
        QDialog.__init__(self)
        self.ui = uic.loadUi('Login.ui')
        self.ui.show()
        self.ui.Ingresar.clicked.connect(self.GetIngresar)
        self.ui.CC.clicked.connect(self.GetCrear)
        LOG=QPalette()
        LOG.setBrush(QPalette.Background,QBrush(QPixmap("construccion1.jpg")))
        self.ui.setPalette(LOG)
        
        
     
        

    def GetIngresar(self):
        url3="https://nemonico.com.mx/jonathan/idouser.php?email="+ self.ui.email.text() + "&p=" + self.ui.pws.text() 
        contenido3=urllib.request.urlopen(url3);
        data3 = json.loads(contenido3.read().decode())
        print(data3)
        if data3['msg'] == 'true':
             QDialog.__init__(self)
             self.ui = uic.loadUi('APIVISITS.ui')
             self.ui.show()
             self.ui.VISITAR.clicked.connect(self.GetJson)
             LOG=QPalette()
             LOG.setBrush(QPalette.Background,QBrush(QPixmap("construccion.jpg")))
             self.ui.setPalette(LOG) 
             url="https://nemonico.com.mx/jonathan/Loginui.php" 
             contenido=urllib.request.urlopen(url);
             try:
                 data = json.loads(contenido.read().decode())
                 c=0
                 while c<len(data):
                     self.ui.Reporte.addItem(data[c]['infra'].replace(" ", "_"))
                     c=c+1                
             except NameError:
                     print("error")
        if data3['msg'] == 'Tu usuario o contraseña es incorrecto':
            self.ui.alert.setText(str(data3['msg']))
    
    def GetCrear(self):
        QDialog.__init__(self)
        self.ui = uic.loadUi('CREAR.ui')
        self.ui.show()
        self.ui.Crear.clicked.connect(self.GetJson2)
        LOG=QPalette()
        LOG.setBrush(QPalette.Background,QBrush(QPixmap("infra1.jpg")))
        self.ui.setPalette(LOG)        
                
    def GetJson(self):
        url2="https://nemonico.com.mx/jonathan/visitui.php?name=" + self.ui.Reporte.currentText()
        contenido2=urllib.request.urlopen(url2);
        try:
            data2 = json.loads(contenido2.read().decode())
            print(data2)
            self.ui.label.setText(str(data2['name']))
            self.ui.le.setText(str(data2['name']))
            self.ui.le_2.setText(str(data2['loc']))
            self.ui.le_3.setText(str(data2['start']))
            self.ui.le_4.setText(str(data2['finish']))
            self.ui.le_5.setText(str(data2['cost']))
            self.ui.le_6.setText(str(data2['pp']))
            self.ui.le_7.setText(str(data2['visits']))
        except NameError:
            print("Error")
            
    def GetJson2(self):
       FN = self.ui.FN.text()
       FN = FN.replace(" ", "_")
       LN = self.ui.LN.text()
       LN = LN.replace(" ", "_")
       url4="https://nemonico.com.mx/jonathan/crearui.php?fm="+ FN + "&lm=" + LN + "&cell=" + self.ui.CELL.text() + "&email=" + self.ui.EMAIL.text()+ "&pass=" + self.ui.PASS.text()   
       contenido4=urllib.request.urlopen(url4);
       data4 = json.loads(contenido4.read().decode())
       print(data4)
       if data4['msg'] =='true':
           QDialog.__init__(self)
           self.ui = uic.loadUi('Login.ui')
           self.ui.show()
           self.ui.Ingresar.clicked.connect(self.GetIngresar)
           LOG=QPalette()
           LOG.setBrush(QPalette.Background,QBrush(QPixmap("construccion1.jpg")))
           self.ui.setPalette(LOG)  
       if data4['msg'] == 'Por favor llena todos los campos':
           self.ui.alert.setText(str(data4['msg']))
           
           
def main():
    app=QApplication(sys.argv)
    window = Interfaz()
    sys.exit(app.exec_())
    

if __name__ == '__main__':
    main()