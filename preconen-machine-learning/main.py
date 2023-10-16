from flask import Flask, render_template, request, jsonify
import pandas as pd
from sklearn.linear_model import LinearRegression
from sklearn.model_selection import train_test_split

app = Flask(__name__)

data = {
    'temperature': [279.66, 279.5, 279.56, 278.56, 277.36, 277.08, 278.63, 277.4, 277.13, 277.43],
    'ph': [6.5, 6.7, 6.4, 6.6, 6.8, 6.2, 6.9, 6.3, 6.5, 6.7],
    'days': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'commodity': ['Kedelai', 'Jagung', 'Kedelai', 'Jagung', 'Gandum', 'Gandum', 'Kedelai', 'Kedelai', 'Jagung', 'Gandum']
}

df = pd.DataFrame(data)

X = df[['temperature', 'ph', 'days']]
y = df['commodity']

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

model = LinearRegression()
model.fit(X_train, y_train)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        temperature = float(request.form['temperature'])
        ph = float(request.form['ph'])
        days = int(request.form['days'])
        
        new_data = {
            'temperature': [temperature],
            'ph': [ph],
            'days': [days]
        }
        
        prediction = model.predict([new_data])
        recommended_commodity = prediction[0]
        
        return render_template('index.html', recommended_commodity=recommended_commodity)

    return render_template('index.html', recommended_commodity=None)

if __name__ == '__main__':
    app.run(debug=True)
