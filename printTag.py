#!/usr/bin/env python3
import sys

from Adafruit_Thermal import *

printer = Adafruit_Thermal("/dev/ttyUSB0", 19200, timeout=5)

if __name__ == "__main__":
	arr = sys.argv[1]
	arr = arr.split("/*/")
	process_nr = arr[0]
	process_date = arr[1]
	process_sender_firstname = arr[2]
	process_sender_lastname = arr[3]
	process_receiver_firstname = arr[4]
	process_receiver_lastname = arr[5]
	process_keys = arr[6]
	#print(process_nr+" "+process_date+" "+process_sender_firstname+" "+process_sender_lastname+" "+process_receiver_firstname+" "+process_receiver_lastname+" "+process_keys)
	process_hour = arr[7]
	# Test character double-height on & off
	printer.justify('C')
	printer.println(" ")
	printer.doubleHeightOn()
	printer.boldOn()
	printer.println("Proces Verbal de Predare/Primire")
	printer.boldOff()
	printer.println("Nr. "+process_nr+" /"+process_date+"")
	printer.doubleHeightOff()
	printer.println("Pagina 1/4")
	printer.println(" ")
	printer.justify('L')
	printer.println("Incheiat astazi, ora "+process_hour+", intre:")
	printer.println(" ")
	printer.boldOn()
	printer.println(process_sender_firstname + " " + process_sender_lastname)
	printer.boldOff()
	printer.println("in calitate de predator, si")
	printer.boldOn()
	printer.println(process_receiver_firstname+" "+process_receiver_lastname)
	printer.boldOff()
	printer.println("in calitate de primitor.")
	printer.println(" ")
	printer.println("S-au predat/primit cheile:")
	printer.println(" ")
	keys_arr = process_keys.split("----")
	for x in range(len(keys_arr)-1):
		keys_arr[x] = keys_arr[x].replace("***"," ")
		printer.println(keys_arr[x])
	printer.println(" ")
	printer.justify('R')
	printer.println("Am predat:")
	printer.boldOn()
	printer.println(process_sender_firstname+" "+process_sender_lastname)
	printer.boldOff()
	printer.println(" ")
	printer.println(" ")
	printer.println("...................")
	printer.println(" ")
	printer.println("Am primit:")
	printer.boldOn()
	printer.println(process_receiver_firstname+" "+process_receiver_lastname)
	printer.boldOff()
	printer.println(" ")
	printer.println(" ")
	printer.println("...................")
	printer.println(" ")
	printer.println(" ")
	printer.println(" ")



	printer.sleep()      # Tell printer to sleep
	printer.wake()       # Call wake() before printing again, even if reset
	printer.setDefault() # Restore printer to defaults
