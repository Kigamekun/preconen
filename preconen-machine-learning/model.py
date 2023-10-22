import numpy as np
import seaborn as sns
import pandas as pd
import matplotlib.pyplot as plt
sns.set_style('darkgrid')
from sklearn.model_selection import train_test_split ,GridSearchCV
from sklearn.neighbors import KNeighborsClassifier
from sklearn.svm import SVC
import warnings
warnings.filterwarnings("ignore", category=UserWarning)

crop = pd.read_csv("./Crop_recommendation.csv")
# crop.head(5)
crop.describe()
crop.apply(lambda x: len(x.isnull()))
assert crop.isnull().sum().sum() == 0
crop.drop_duplicates(inplace= True)
assert crop.duplicated().sum() == 0
crop.apply(lambda x: len(x.unique()))
print(crop['label'].unique())

crop.info()

# plt.figure(figsize=(18,10))
# sns.boxplot(x="temperature", y="label", data=crop,
#             whis=[0, 100], width=.6 , orient="h")
# plt.show()

x = crop.drop(['label'], axis = 1)
y = crop['label']

X_train, X_test, y_train, y_test = train_test_split(x, y, test_size = 0.20,shuffle = True, random_state = 0)

kn_classifier = KNeighborsClassifier()
kn_classifier.fit(X_train,y_train)

print('Training set score: {:.4f}'.format(kn_classifier.score(X_train, y_train)))
print('Test set score: {:.4f}'.format(kn_classifier.score(X_test, y_test)))

newdata=kn_classifier.predict([[60,55,44,23.004459,82.320763,7.840207,	263.964248]])

print(newdata)