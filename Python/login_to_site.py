from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import expected_conditions as EC
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
import os


url = "http://www.the_url_of_the_login_page.com"
driver = webdriver.Chrome() # or Mozzilla

driver.get(url)
driver.implicitly_wait(60) # The driver will be looking for the element you want for 60 seconds before exiting. This way it will not exit if the page doesn't load instantly.

u = driver.find_element_by_name('uname')
u.send_keys('your_username')
p = driver.find_element_by_name('passwd')
p.send_keys('your_password')
p.send_keys(Keys.RETURN)


driver.get( driver.find_element_by_css_selector('#button_to_click').get_attribute("href") );
driver.get( driver.find_element_by_css_selector('#another_button_to_click').get_attribute("href") );
driver.get("http://www.a_url_you_want_to_go.com")