powershell.exe -noexit -command "cd 'C:/Users/YourName/Desktop/YourProject/' ; git status ; git add . -f ; git commit -m 'Update from bat file' ; git pull ; git push ; cd 'sitepoint/portal' ; git status ; git add . -f ; git commit -m 'Update from bat file' ; git pull ; git push ;"
CALL putty.bat