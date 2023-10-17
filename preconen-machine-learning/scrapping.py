from bs4 import BeautifulSoup
import requests
import json

response = requests.get('https://benihcitraasia.co.id/products-page/1')
if response.status_code == 200:
    soup = BeautifulSoup(response.text, 'html.parser')
    elements = soup.find_all(class_='deal-content')
    data = []

    for element in elements:
                # Extract data from elements with the specified class
        # data.append(element.text)
        data = element.text
        items = data.replace("\\n", "")
        items = data.replace("\r", "")


        print(items)
        parsed_data = {}

        for item in items:
            print(item)
            lines = item.split('\n')
            print(lines)
            key = lines[1].strip()  # The key is the second line (index 1)
            values = [line.strip() for line in lines[3:] if line.strip()]  # Lines 3 and onwards are the values
            parsed_data[key] = values

        # Print the parsed data as a dictionary
        print(json.dumps(parsed_data, indent=2))



print(data)
