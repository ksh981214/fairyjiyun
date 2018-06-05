import requests
from flask import Flask
from flask import render_template

subscription_key = "b8b0351c901a48798f744ee8713b2595"
assert subscription_key

app = Flask(__name__)

@app.route('/hello')
def hello():
      return "hello"


@app.route('/')
def hello_world():
  vision_base_url = "https://westcentralus.api.cognitive.microsoft.com/vision/v2.0/"
  vision_analyze_url = vision_base_url + "analyze"

	# Set image_url to the URL of an image that you want to analyze.
  image_path = 'C:/Users/pic/microphone.jpg'

  headers  = {'Ocp-Apim-Subscription-Key': subscription_key }
  params   = {'visualFeatures': 'Categories,Description,Color'}
  image_data= open(image_path,"rb").read()
  response = requests.post(vision_analyze_url, headers=headers, params=params, data=image_data)
  response.raise_for_status()

  analysis = response.json()
  
  image_caption = analysis["description"]["captions"][0]["text"].capitalize()

  return render_template('index.html', image_caption=image_caption)

  

if __name__ == '__main__':
  app.run()
