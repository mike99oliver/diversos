from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from random import randrange
import warnings
import requests
from time import sleep
import json
import random


#warnings.filterwarnings("ignore", category=DeprecationWarning)  #Remove Alertas
#os.system('mode con:cols=120 lines=500') # Define o tamanho da janela

options = webdriver.ChromeOptions()
#options.add_experimental_option('excludeSwitches', ['enable-logging'])
# options.add_argument('--headless')
options.add_argument('--disable-gpu')  # Necessário para evitar erros em alguns sistemas
options.add_argument('--no-sandbox')
print("aqui")
#capa = DesiredCapabilities.CHROME
#capa["pageLoadStrategy"] = "none"
#capa["max-duration"] = 5
#capa["command-timeout"] = 5
#capa["idle-timeout"] = 5

#driver = webdriver.Chrome(executable_path="/usr/local/bin/chromedriver",options=options)
driver_path = "chromedriver"
#service = webdriver.chrome.service(driver_path)
#service = webdriver.ChromeService(executable_path=driver_path)
print("aqui")
driver = webdriver.Chrome(options=options)
print("aqui")
arquivoInput = "10.txt"
driver.get("https://twitter.com/")
sleep(5)
def start(arquivoInput):
    endpoint = "http://localhost/spamtwitter"

    loadDelay = 5
    count = 1
    with open(arquivoInput, 'r') as arquivo:
        linhas = arquivo.readlines()
        random.shuffle(linhas)

        for linha in linhas:
            number = random.randint(11111111,99999999)

            config = requests.get(f"{endpoint}/getConfig.php")
            obj_config = json.loads(config.text)
            
            linkPost = obj_config['post']

            linkComentario = f"{number}\n{linkPost}"

            linha = linha.strip()
            explode = linha.split(":")

            auth_token = explode[11] 

            driver.get("https://twitter.com/")
            driver.add_cookie({'name': 'auth_token', 'value': auth_token})

            response = requests.get(f"{endpoint}/getLink.php")
            obj = json.loads(response.text)

            driver.get(obj['url'])        
            sleep(loadDelay)

            try:        
                #body = driver.find_element(By.XPATH, f'/html/body')
                #body.send_keys(Keys.SPACE)

                #sleep(1)
                #Clicar No botao de comentar
                #commentElement = driver.find_element(By.XPATH, f'//*[@id="react-root"]/div/div/div[2]/main/div/div/div/div/div/section/div/div/div[1]/div/div/div')
                #wait = WebDriverWait(driver, 5)
                #wait.until(lambda d : commentElement.is_displayed())
                #commentElement.click()            

                #sleep(1)
                #clicar no evento do textarea
                textArea = driver.find_element(By.XPATH, f'//*[@data-testid="tweetTextarea_0"]')#tweetTextarea_0
                wait = WebDriverWait(driver, 5)
                wait.until(lambda d : textArea.is_displayed())
                textArea.click()
                print("clicou")
                driver.execute_script("window.scrollBy(0, 200);")
                
                driver.execute_script("arguments[0].scrollIntoView();", textArea)
                #sleep(0.2)
                driver.execute_script("window.scrollBy(0, -100);")
                print("clicou")

                sleep(0.1)
                #Digita o link
                textArea.send_keys(linkComentario)
                print("clicou")

                #sleep(0.2)
                #Clica para postar
                buttonPost = driver.find_element(By.XPATH, f'//*[@data-testid="tweetButtonInline"]')     
                wait = WebDriverWait(driver, 5)
                wait.until(lambda d : buttonPost.is_displayed())       
                buttonPost.click()
                print("clicou")

                sleep(2.5)
                print(f"Numero: {count} | Auth_Token: {auth_token} | SUCESSO")
            except:
                print(f"Numero: {count} | Auth_Token: {auth_token} | FALHA")
            count = count + 1
            
    start(arquivoInput)

start(arquivoInput)
