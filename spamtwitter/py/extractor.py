# -*- coding: utf-8 -*-

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
import re
import random

warnings.filterwarnings("ignore", category=DeprecationWarning)  #Remove Alertas

options = webdriver.ChromeOptions()


options.add_argument('--disable-gpu')  # Necessário para evitar erros em alguns sistemas
options.add_argument('--no-sandbox')

capa = DesiredCapabilities.CHROME
capa["pageLoadStrategy"] = "none"
capa["max-duration"] = 5
capa["command-timeout"] = 5
capa["idle-timeout"] = 5

driver = webdriver.Chrome(options=options)
arquivoInput = input("Digite A Lista: ")

def start(arquivoInput):
    loadDelay = 1
    renewDelay = 7

    endpoint = "http://localhost/spamtwitter"

    config = requests.get(f"{endpoint}/getConfig.php")
    obj_config = json.loads(config.text)
    explodeBusca = obj_config['palavras'].split(",")
    busca = explodeBusca   

    count = 1
    with open(arquivoInput, 'r') as arquivo:
        for linha in arquivo:
            
            linha = linha.strip()
            explode = linha.split(":")

            auth_token = explode[11]

            print("------------------------------------------------------------------------")
            print(f"Conectado | Auth_Token: {auth_token}")
            print("------------------------------------------------------------------------")

            count = count + 1

            driver.get("https://twitter.com/")
            driver.add_cookie({'name': 'auth_token', 'value': auth_token})

            buscaRandom = random.choice(busca)
            driver.get(f"https://twitter.com/search?q={buscaRandom}&src=typed_query&f=live")        #&f=live para ao vivo
            sleep(loadDelay)

            try:         
                count = 0
                while count <= 10:                    
                    body = driver.find_element(By.XPATH, f'/html/body')

                    body.send_keys(Keys.PAGE_DOWN)
                    body.send_keys(Keys.PAGE_DOWN)
                    body.send_keys(Keys.PAGE_DOWN)
                    
                    sleep(1)                    

                    html = driver.page_source
                    padrao = r'href="/([^/]+)/status/(\d+)(?!(?:/photo/\d+|/analytics))"'
                    resultados = re.findall(padrao, html)

                    for resultado in resultados:
                        url = ('href="/{}\/status/{}"'.format(resultado[0], resultado[1]))
                        
                        response = requests.get(f"{endpoint}/addLink.php?url={url}")
                        print(response.text)

                    count = count + 1

            except:
                print("Falha")

            sleep(renewDelay)
    start(arquivoInput)

start(arquivoInput)