set /p commitName="Commit Name: "
powershell.exe -command "cd 'C:/Users/YourName/Desktop/YourProject/' ; git status ; git add . ; git commit -m '%commitName%' ; git pull ; git push ; cd 'sitepoint/public_html' ; git status ; git add . ; git commit -m '%commitName%' ; git pull ; git push ;"
CALL putty.bat