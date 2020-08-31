#!/usr/bin/env python3
from __future__ import print_function
import time
from datetime import datetime
import mercury
import os
import socket
ip_address = "127.0.0.1"
port = 6901

sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock.bind((ip_address,port))
sock.listen()

ok = 1





reader = mercury.Reader("tmr:///dev/ttyUSB1", baudrate=115200)

#print(reader.get_supported_regions())
#print(reader.get_power_range())

reader.set_region("EU3")
reader.set_read_plan([1], "GEN2", read_power=1800)

#time.sleep(5)
#reader.stop_reading()





while ok:
	conn, addr = sock.accept()
	print("Connection established with ip:" + str(addr) + " on port: " + str(conn))
	data = conn.recv(1024)
	if not data:
		continue
	data = data.decode("utf-8")
	print(data)
	if(data == "close_server"):
		ok = 0
		continue
	if(data == "login_read"):
		
		content = reader.read()
		content = str(content)
		if(len(content) < 1024):
			hw = 1024 - len(content) + 1
			t = hw*" "
			content += t
		conn.sendall(content.encode("utf-8"))