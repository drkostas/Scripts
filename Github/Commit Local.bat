set /p commitName="Commit Name: "
powershell.exe -noexit -command "cd 'C:/Users/YourName/Desktop/YourProject/' ; git status ; git add . ; git commit -m '%commitName%' ; git pull ; git push ;"
