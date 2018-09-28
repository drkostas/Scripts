#!/usr/bin/env python
from imports import *

def crop_file(folder, name, rowstokeep):
	Data = pd.read_csv(folder+name, delimiter='\t', encoding = "ISO-8859-1", nrows=rowstokeep)

	saveName = folder+"first{}rows_".format(rowstokeep)+name
	Data.to_csv(saveName, sep='\t', encoding = "ISO-8859-1")
	print("Saved succesfully as %s" % saveName)


folder = "Path/To/The/File/"
name = "YourBigFile.txt"

crop_file(folder, name, 100)	


