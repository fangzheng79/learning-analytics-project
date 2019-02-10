# learning-analytics-project
This is an analytics and visualization project for learning analytics course in UDE

> We are using [Students' Academic Performance Dataset](https://www.kaggle.com/aljarah/xAPI-Edu-Data). Also, we add some fake students' information such as FirstName, LastName, Phone, and etc with [faker](https://github.com/marak/Faker.js/).
## Objectives
- Explore the students performance dataset by perform some initial data visualization.
- Apply the machine learning algorithms on the dataset to determine most important features and attempt to predict the students performance based on these features.

## Project Architecture
![image](https://github.com/francisjigo2/pictures/blob/master/architecture.png)


## Technologies: 
### Libraries:
- [Highchart](https://www.highcharts.com/)
- [jQuery](https://jquery.com/)
- [scikit-learn](https://scikit-learn.org/stable/)
- [XGBoost](https://github.com/dmlc/xgboost)
### Algorithms:
- Logistic Regression
- SVM
- KNN
- Random Forest
- XGBoost

## Visualizations:
-The demographic attributes are visualized by pie chart and bar chart:
![image](https://github.com/francisjigo2/pictures/blob/master/pie%20chart.png)
![image](https://github.com/francisjigo2/pictures/blob/master/bar%20chart.png)
-The academic background attributes are visualized by stacked bar chart:
![image](https://github.com/francisjigo2/pictures/blob/master/stacked%20bar%20chart.png)
-The behavioral attributes are visualized by box plot:
![image](https://github.com/francisjigo2/pictures/blob/master/box%20plot.png)

## How to run the project:
Here is a simple demo on [Youtube](https://youtu.be/iTDjJYPjA1o)
<br>
- clone the repository
- configure the local database
- run the project on the localhost


## Further Work:
combine the machine learning model to the frontend and creat a GUI to use the predict function

## Group Members:
> Fangzheng Ji              
> Jihao Zhang                
> Jaleh Ghorban  
> Shahrzad Amini            
> Damera Ritesh
