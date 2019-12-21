#!/usr/bin/env python
from imports import *

colors = ["#32F59B","#3188A9","#EB7853","#9ED1A1","#5E7A5A","#68D6D6","#117A91","#48DC03","#FA2DBC","#E1A5B0","#028D86","#3A7B41","#D99A5A","#E54030","#D1187D","#ff2700","#792F47","#020AC6","#5BB9BE","#A90C17","#c8eb0f","#12F414","#B26BD2","#12EDB9","#B62C24","#4CD358","#97A8BC","#C6E22B","#53E319","#DD0093","#4DF215","#BAC637","#2FE120","#D84BB5","#59259C","#8E980B","#DC6929","#149F6C","#0344E0","#A49D93","#9223B3","#E8F421","#D3673C","#33078F","#8231FD","#5907CB","#AA3AE6","#BC924D","#F70FF8","#F7B29A","#0E3060","#B0AFB9","#576F9A","#C81C81","#5780A1","#BAFFA6","#F66A52","#3B9AA2","#46B634","#78C096","#15114C","#742EE8","#023ACE","#C14877","#CF09FA","#01F134","#EA9198","#9ABD48","#B19F91","#7608F0","#201115","#60FF19","#8A3388","#B39432","#6A9729","#75997B","#EDBEDC","#757B8F","#332C85","#FE0853","#2D8B6F","#75D23B","#FB0669","#5AD865","#E63EF9","#216BDC","#B42866","#4614C8","#E12BA9","#08F47F"]

new_colors = []
value = 0.0
incr = 1/float(len(colors)-1)
for color in colors:
	color = color.lstrip('#')
	new_colors.append([float("{:.2f}".format(value)), "rgb"+str(tuple(int(color[i:i+2], 16) for i in (0, 2 ,4)))])
	value += incr
print(new_colors)

# [0.0, "rgb(165,0,38)"]