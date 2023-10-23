from flask import Flask, render_template, request, jsonify

import numpy as np
import seaborn as sns
import pandas as pd
import matplotlib.pyplot as plt
sns.set_style('darkgrid')
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
import warnings

warnings.filterwarnings("ignore", category=UserWarning)

app = Flask(__name__)

crop = pd.read_csv("./data_komoditas.csv")

crop.drop_duplicates(inplace=True)

x = crop.drop(['label'], axis=1)
y = crop['label']

X_train, X_test, y_train, y_test = train_test_split(x, y, test_size=0.20, shuffle=True, random_state=0)

logistic_reg = LogisticRegression(max_iter=10000)
logistic_reg.fit(X_train, y_train)
print('Training set score: {:.4f}'.format(logistic_reg.score(X_train, y_train)))
print('Test set score: {:.4f}'.format(logistic_reg.score(X_test, y_test)))

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        data = np.array([
            float(request.form['temperature']),
            float(request.form['humidity']),
            float(request.form['ph']),
            float(request.form['rainfall'])
        ]).reshape(1, -1)
        prediction = logistic_reg.predict(data)
        probabilities = logistic_reg.predict_proba(data)
        top_3_indices = probabilities.argsort()[0][::-1][:3]  # Ambil 3 komoditas teratas
        top_3_commodities = [logistic_reg.classes_[idx] for idx in top_3_indices]
        top_3_probabilities = [probabilities[0][idx] for idx in top_3_indices]
        response = {"commodities": top_3_commodities, "probabilities": top_3_probabilities}
        return jsonify(response)


if __name__ == '__main__':
    app.run(debug=True)
