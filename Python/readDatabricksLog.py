import urllib2
import requests
# from pyquery import PyQuery

login = {'j_username': 'YourEmail', 'j_password': 'YourPassword'}
url = 'https://community.cloud.databricks.com/login.html'
requests.post(url, data=login)


data = urllib2.urlopen("https://community.cloud.databricks.com/files/status.txt").read(20000) # read only 20 000 chars
data = data.split("\n") # then split it into lines

for line in data:
    print line