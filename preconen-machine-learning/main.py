from flask import Flask, render_template, request, jsonify
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split, GridSearchCV
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import classification_report

app = Flask(__name__)

crop = pd.read_csv("./data_komoditas.csv")
crop.drop_duplicates(inplace=True)

x = crop.drop(['label'], axis=1)
y = crop['label']

X_train, X_test, y_train, y_test = train_test_split(x, y, test_size=0.20, shuffle=True, random_state=0)

param_grid = {
    'n_estimators': [100, 200, 300],
    'max_depth': [None, 5, 10],
    'min_samples_split': [2, 5, 10],
    'min_samples_leaf': [1, 2, 4]
}

rf = RandomForestClassifier(random_state=0)
grid_search = GridSearchCV(rf, param_grid, cv=5)
grid_search.fit(X_train, y_train)

print('Best parameters:', grid_search.best_params_)
print('Training set score: {:.4f}'.format(grid_search.best_score_))
print('Test set score: {:.4f}'.format(grid_search.score(X_test, y_test)))
print('Classification report:')
print(classification_report(y_test, grid_search.predict(X_test)))

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        data = np.array([
            float(request.form['temperature']),
            float(request.form['humidity']),
            float(request.form['ph']),
            float(request.form['rainfall'])
        ]).reshape(1, -1)
        prediction = grid_search.predict(data)
        probabilities = grid_search.predict_proba(data)
        top_3_indices = probabilities.argsort()[0][::-1][:3]
        top_3_commodities = [grid_search.classes_[idx] for idx in top_3_indices]
        top_3_probabilities = [probabilities[0][idx] for idx in top_3_indices]
        response = {"commodities": top_3_commodities, "probabilities": top_3_probabilities}
        return jsonify(response)

if __name__ == '__main__':
    app.run(debug=True)