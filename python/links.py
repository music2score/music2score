from bs4 import BeautifulSoup, SoupStrainer
import requests


def download(url):
    actual_url = "http://www4.osk.3web.ne.jp/~kasumitu/" + url
    # print(link)
    r = requests.get(actual_url)

    with open('./midifiles/' + url, 'wb') as f:
        f.write(r.content)


if __name__ == "__main__":
    url = "http://www4.osk.3web.ne.jp/~kasumitu/eng.htm"

    page = requests.get(url)    
    data = page.text
    soup = BeautifulSoup(data, "lxml")

    links = []

    for link in soup.find_all('a'):
        links.append(link.get('href'))

    links = links[2:]

    for link in links:
        download(link)