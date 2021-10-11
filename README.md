#Heatmap Service

Your task is to build a REST API service that would be the backend for a simple heatmap app.

##Requirements

You can use any PHP Framework you feel comfortable with as long as your solution meets the following criteria:

1. You service provides an endpoint to store the following data:

    - Link – the url of the page that has been visited by the user
    - Link type – Can be one of either: product, category, static-page, checkout,
homepage
11. Timestamp of the action
    - Customer identifier
11. Your service provides a way to answer the following questions:
    - How many hits did a link receive in a provided time interval?
    - How many hits did each page type receive in a provided time interval?
11. Based on a given customer identifier your service can provide the journey of that customer. (a list of all the links he accessed in a chronological order)
11. Based on the journey provided at point 3 above your service can provide a list of other customers that had the same journey

##Version control & run environment

Ideally you will upload your project to a public version control system of your choice (github, gitlab, bitbucket etc.) but sending an archive with your solution is also ok. Please include a readme file with instructions. We will run your code on a docker container using php7.4- alpine or in a container based on a Dockerfile/docker-compoose you provide in the project.

##How will we evaluate your solution?
1. Code quality
1. Optimal usage of framework components (if a framework has been used)
1. Automated testing
1. Usage of SOLID principles and design patterns
1. Overall performance


## Project setup
- Build & Run (docker-compose up --build -d)
- Composer install in www directory
- Copy .env.example to .env
- Run 'php artisan migrate' in www directory
- Run 'php artisan db:seed --class=LinkTypesTableSeeder' in www directory